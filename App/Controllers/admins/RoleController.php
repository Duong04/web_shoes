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

            if(isset($_SESSION['checkUpdate'])) {
                $this->message->successMessage('Updated Role Successfully!');
                unset($_SESSION['checkUpdate']);
            }
        }

        public function store() {
            $content = 'roles/add';
            require_once './App/Views/admins/layoutAdmin.php';

            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $roleName = $_POST['role_name'];
                $checkName = $this->user->selectNameRole($roleName);
                if ($checkName == null) {
                    $role = $this->user->insertRole($roleName);
    
                    if ($role) {
                        $this->message->successMessage('Created role Successfully');
                    }
                }else {
                    $this->message->warningMessage('This role name already exists');
                }
            }    
        }

        public function edit() {
            $role = '';
            if (isset($_GET['role_id'])) {
                $role =$this->user->selectRoleById($_GET['role_id']);
            }else {
                header('Location: ./?role=admin&page=list-roles');
            }

            $content = 'roles/update';
            require_once './App/Views/admins/layoutAdmin.php';

            if (isset($_SESSION['checkUpdate'])){
                $this->message->warningMessage('This role name already exists');
                unset($_SESSION['checkUpdate']);
            }
        }

        public function update() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $roleName = $_POST['role_name'];
                $roleId = $_GET['role_id'];
                $checkName = $this->user->checkName($roleName, $roleId);

                if ($checkName == null) {
                    $role = $this->user->updateRole($roleName, $roleId);
                    if ($role) {
                        $_SESSION['checkUpdate'] = true;
                        header('Location: ./?role=admin&page=list-roles');
                    }
                }else {
                    $_SESSION['checkUpdate'] = true;
                    header("location: ./?role=admin&page=edit-role&role_id=$roleId");
                }
            }
        }
    }