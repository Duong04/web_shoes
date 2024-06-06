<?php 
    class CategoryController {
        private $categoryModel;
        public function __construct() {
            $this->categoryModel = new Category();
        }

        public function successMessage($text) {
            echo "<script>
                    Swal.fire({
                        title: 'Success!',
                        text: '$text',
                        icon: 'success',
                        timer: 3000,
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

        public function warningMessage($text) {
            echo "<script>
                    Swal.fire({
                        title: 'Warning!',
                        text: '$text',
                        icon: 'warning',
                        timer: 3000,
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

        public function index() {
            $categories = $this->categoryModel->selectCategories();
            $content = 'categories/list';
            require_once './App/Views/admins/layoutAdmin.php';
            if(isset($_SESSION['checkUpdate'])) {
                $this->successMessage('Updated Category Successfully!');
                unset($_SESSION['checkUpdate']);
            }
        }
        public function store() {
            $content = 'categories/add';
            require_once './App/Views/admins/layoutAdmin.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $name = $_POST['category_name'];
                $userId = $_SESSION['user_id'];
                $category = $this->categoryModel->selectName($name);
                if ($name == null) {
                    $result = $this->categoryModel->addCategory($name, $userId);
                    if ($result) {
                        $this->successMessage('Add Category successfuly!');
                    }
                }else {
                    $this->warningMessage('This category name already exists');
                }
            }
        }

        public function edit() {
            $category = '';

            if (isset($_GET['category_id'])) {
                $id = $_GET['category_id'];
                $category = $this->categoryModel->selectCategoryId($id);
            }else {
                header('Location: ./?role=admin&page=list-categories');
            }

            $content = 'categories/update';
            require_once './App/Views/admins/layoutAdmin.php';
            
            if (isset($_SESSION['checkUpdate'])){
                $this->warningMessage('This category name already exists');
                unset($_SESSION['checkUpdate']);
            }
        }

        public function update() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'], $_GET['category_id'])) {
                $name = $_POST['category_name'];
                $category_id = $_GET['category_id'];
                $user_id = $_SESSION['user_id'];
                $checkName = $this->categoryModel->checkName($name, $category_id);
                if($checkName == null) {
                    $result = $this->categoryModel->updateCategory($name, $user_id, $category_id);
                    if($result) {
                        $_SESSION['checkUpdate'] = true;
                        header('Location: ./?role=admin&page=list-categories');
                    }
                }else {
                    $_SESSION['checkUpdate'] = true;
                    header("location: ./?role=admin&page=edit-category&category_id=$category_id");
                }
            }else {
                header('Location: ./?role=admin&page=list-categories');
            }
        }

        public function delete() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['category_id']) {
                $this->categoryModel->deleteCategory($_GET['category_id']);
            }
        }
    }
?>