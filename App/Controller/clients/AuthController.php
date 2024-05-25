<?php 
    class AuthController {
        private $UserModel;
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
                                if ($role == 'Customer' || $role == 'Admin') {
                                    $_SESSION['userName'] = $user_name;
                                    $_SESSION['role'] = $role;
                                    $_SESSION['user_id'] = $user_id;
                                    $_SESSION['status'] = $status;
                                    header('Location: ../Admin');
                                }else {
                                    $_SESSION['userName'] = $user_name;
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
                                            <p>To activate your account, please click <a href='http://localhost/php/php_oop/web_shoes/index.php?url=confirm-user&token=$token' style='color:blue;'>active now</a></p>
                                        </div>"; 
                            $sendMail = send_mail($email, $title, $content, '');
                            if ($sendMail) {
                                header('location: ./index.php?url=checkmail');
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
                        header ('Location: ./index.php?url=login');
                    }
                }
                require_once './App/Views/clients/404.php';
            }else {
                require_once './App/Views/clients/404.php';
            }
        }
    }
?>