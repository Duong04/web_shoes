<?php 
    class RoleController {
        private $user;
        private $message;

        public function __construct() {
            $this->user = new Users();
            $this->message = new Message();
        }

        public function index() {
            $roles = $this->user->selectRoles();

            $content = 'roles/list';
            require_once './App/Views/admins/layoutAdmin.php';
        }

        public function store() {
            $content = 'roles/add';
            require_once './App/Views/admins/layoutAdmin.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $roleName = $_POST['role_name'];

                $role = $this->user->insertRole($roleName);

                if ($role) {
                    $this->message->successMessage('Created role Successfully');
                }
            }    
        }
    }