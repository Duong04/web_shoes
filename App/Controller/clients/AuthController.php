<?php 
    class AuthController {
        private $UserModel;
        private $url = 'http://localhost/php/php_oop/web_shoes';
        public function __construct() {
            $this->UserModel = new Users();
        }

        public function login() {
            $emailError = '';
            $pswError = '';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $psw = trim($_POST['password']);
                    $user = $this->UserModel->selectEmail($email);
                    if ($user != null) {
                        $role = $user['role_name'];
                        $status = $user['status'];
                        $user_id = $user['user_id'];
                        $user_name = $user['user_name'];
                        $password = $user['password'];
                        if ($status === 'inactive') {
                            $emailError = 'Account has not been activated!';
                        } else if ($status === 'suspended') {
                            $emailError = 'Account has been disabled!';
                        } else {
                            if (password_verify($psw, $password)) {
                                if ($role == 'Staff' || $role == 'Admin') {
                                    $_SESSION['userName'] = $user_name;
                                    $_SESSION['avatar'] = $user['avatar'];
                                    $_SESSION['role'] = $role;
                                    $_SESSION['user_id'] = $user_id;
                                    $_SESSION['status'] = $status;
                                    header('Location: ./?role=admin&page=dashboard');
                                }else {
                                    $_SESSION['userName'] = $user_name;
                                    $_SESSION['avatar'] = $user['avatar'];
                                    $_SESSION['role'] = $role;
                                    $_SESSION['user_id'] = $user_id;
                                    $_SESSION['status'] = $status;
                                    header('Location: ./');
                                }
                            }else {
                                $pswError = 'Incorrect password!';
                            }
                        }
                    }else {
                        $emailError = "Email does not exist!";
                    }
                }
            }
            require_once './App/Views/clients/login.php';
        }
        public function register() {
            $emailError = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $userName = $_POST['userName'];
                    $email = $_POST['email'];
                    $psw = trim($_POST['password']);
                    $hashPsw = password_hash($psw, PASSWORD_DEFAULT);
                    $token = bin2hex(random_bytes(16));

                    $checkEmail = $this->UserModel->selectEmail($email);
                    if ($checkEmail == null) {
                        $query = $this->UserModel->inserUsers($userName, $email, $hashPsw, $token);
                        if ($query) {
                            $title = "Confirm registration and activate account";
                            $content = "<div>
                                            <img style='width: 130px;' src='https://d15shllkswkct0.cloudfront.net/wp-content/blogs.dir/1/files/2013/05/email-logo.jpg' alt=''>
                                            <p>To activate your account, please click <a href='$this->url/?page=confirm-user&token=$token' style='color:blue;'>active now</a></p>
                                        </div>"; 
                            $sendMail = send_mail($email, $title, $content, '');
                            if ($sendMail) {
                                header('location: ./?page=checkmail');
                                exit();
                            }
                        }
                    }else {
                        $emailError = "This email already exists!";
                    }
                }
            }

            require_once './App/Views/clients/register.php';
        }

        public function activeUser() {
            if (isset($_GET['token'])) {
                $token = $_GET['token'];
                $selectToken = $this->UserModel->selectToken($token);
                if ($selectToken != null) {
                    $query = $this->UserModel->updateStatusWithToken($token);
                    if ($query) {
                        header ('Location: ./?page=login');
                    }
                }
                require_once './App/Views/clients/404.php';
            }else {
                require_once './App/Views/clients/404.php';
            }
        }

        public function forgetPassword() { 
            require_once './App/Views/clients/forgotPsw.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $checkMail = $this->UserModel->selectEmail($email);
                    if ($checkMail != null) {
                        $otp = rand(111111,999999);
                        $updateOtp = $this->UserModel->updateOtpWithEmail($otp, $email);
                        if ($updateOtp) {
                            $title = "Change the password";
                            $content = "Click the link to change your password <a href='$this->url/?page=reset-password&otp=$otp'>click</a>";
                            $sendMail = send_mail($email, $title, $content, '');
                            if ($sendMail) {
                                echo "<script>
                                    Swal.fire({
                                        title: 'Email sent successfully!',
                                        text: 'Please check your email to change your password!',
                                        icon: 'success',
                                        timer: 5000
                                    });
                                    </script>";
                            }
                        }
                    }else {
                        echo "<script>
                            Swal.fire({
                                title: 'Warning!',
                                text: 'This email does not exist',
                                icon: 'warning',
                                timer: 5000,
                                showClass: {
                                    popup: `
                                        animate__animated
                                        animate__fadeInDown
                                        animate__faster
                                    `
                                },
                                hideClass: {
                                    popup: `
                                        animate__animated
                                        animate__fadeOutUp
                                        animate__faster
                                    `
                                }
                            });
                            </script>";
                    }
                }
            }

        }

        public function resetPassword() {
            if (isset($_GET['otp'])) {
                $otp = $_GET['otp'];
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['submit'])) {
                        $checkOtp = $this->UserModel->selectOtp($otp);
                        if ($checkOtp != null) {
                            $password = password_hash($_POST['psw'], PASSWORD_DEFAULT);
                            $updatePsw = $this->UserModel->updatePasswordWithEmail($password, $checkOtp['email']);
                            if ($updatePsw) {
                                header('location: ./?page=login');
                                exit();
                            }
                        }else {
                            header('Location: ./?page=404');
                            exit();
                        }
                    }
                }
            }else {
                header('Location: ./?page=404');
                exit();
            }
            require_once './App/Views/clients/resetPsw.php';
        }

        public function logout() {
            session_unset();

            session_destroy();
            
            header('Location: ./?page=login');
            exit();
        }
    }
?>