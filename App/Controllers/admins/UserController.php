<?php 
    class UserController {
        private $user;
        public function __construct() {
            $this->user = new Users();
        }

        public function index() {
            $users = $this->user->selectUsers();
            $roles = $this->user->selectRoles();
            $content = 'users/list';

            require_once './App/Views/admins/layoutAdmin.php';
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
    }
?>