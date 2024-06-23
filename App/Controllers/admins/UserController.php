<?php 
    class UserController {
        private $user;
        private $message;
        public function __construct() {
            $this->user = new Users();
            $this->message = new Message();
        }

        public function index() {
            $users = $this->user->selectUsers();
            $roles = $this->user->selectRoles();
            $content = 'users/list';

            require_once './App/Views/admins/layoutAdmin.php';
        }

        public function store() {
            $roles = $this->user->selectRoles();
            $content = 'users/add';
            require_once './App/Views/admins/layoutAdmin.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $password = password_hash('dsugar123', PASSWORD_DEFAULT);
                $userName = $_POST['user_name'];
                $email = $_POST['email'];
                $status = $_POST['status'];
                $role = $_POST['role'];
                $user = $this->user->inserUsers_2($userName, $email, $password, $role, $status);

                if ($user) {
                    $this->message->successMessage('Created user successfully');
                }
            }
        }

        public function updateStatus() {
            if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
                $input = file_get_contents('php://input');
                $data = json_decode($input, true);
                $userId = $data['id'];
                $status = $data['status'];

                $this->user->updateStatus($userId, $status);
            }
        }

        public function updateRole() {
            if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
                $input = file_get_contents('php://input');
                $data = json_decode($input, true);
                $userId = $data['userId'];
                $roleId = $data['roleId'];

                $this->user->updateRole($userId, $roleId);
            }
        }
    }
?>