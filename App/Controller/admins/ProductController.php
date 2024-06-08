<?php 
    class ProductController {
        private $categoryModel;
        private $productModel;
        private $imageModel;
        private $message;
        public function __construct() {
            $this->categoryModel = new Category();
            $this->productModel = new Product();
            $this->imageModel = new Image();
            $this->message = new Message();
        }
        public function index() {
            $products = $this->productModel->selectAllProducts();
            $content = 'products/list';
            require_once './App/Views/admins/layoutAdmin.php';

            if(isset($_SESSION['checkUpdate'])) {
                $this->message->successMessage('Updated Product Successfully!');
                unset($_SESSION['checkUpdate']);
            }
        }

        public function store() {
            $categories = $this->categoryModel->selectCategories();
            $content = 'products/add';
            require_once './App/Views/admins/layoutAdmin.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                $product_name = $_POST['product_name'];
                $image = $_FILES['product_image'];
                $images = $_FILES['images'];
                $initial_price = $_POST['initial_price'];
                $discount = $_POST['discount'];
                $quantity = $_POST['quantity'];
                $category_id = $_POST['category_id'];
                $is_active = $_POST['is_active'];
                $description = $_POST['description'];
                $user_id = $_SESSION['user_id'];
                $targetDir = './public/img/products/';
                $product_image = $targetDir . basename($image['name']);
                $new_price = $initial_price * (1 - ($discount / 100));
                $checkName = $this->productModel->selectName($product_name);
                if ($checkName == null) {
                    move_uploaded_file($image['tmp_name'], $product_image);
                    $addProduct = $this->productModel->addProduct($product_name, $product_image, $new_price, $initial_price, $discount, $description, $is_active, $category_id, $user_id, $quantity);
                    if ($addProduct) {
                        $this->handleUploadImage($images, $targetDir, $addProduct);
                        $this->message->successMessage('Product Created Successfully!');
                    }
                }else {
                    $this->message->warningMessage('This product name already exists');
                }
            }
        }

        public function edit() {
            $product = '';
            $images = '';
            $categories = $this->categoryModel->selectCategories();
            if (isset($_GET['product_id'])) {
                $id = $_GET['product_id'];
                $product = $this->productModel->selectProductById($id);
                $images = $this->imageModel->selectImagesByProductId($id);
            }else {
                header('Location: ./?role=admin&page=list-products');
            }

            $content = 'products/update';
            require_once './App/Views/admins/layoutAdmin.php';

            if (isset($_SESSION['checkUpdate'])){
                $this->message->warningMessage('This product name already exists');
                unset($_SESSION['checkUpdate']);
            }
        }

        public function update() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && $_GET['product_id']) {
                $product_id = $_GET['product_id'];
                $product_name = $_POST['product_name'];
                $image = $_FILES['product_image'];
                $images = $_FILES['images'];
                $initial_price = $_POST['initial_price'];
                $discount = $_POST['discount'];
                $quantity = $_POST['quantity'];
                $category_id = $_POST['category_id'];
                $is_active = $_POST['is_active'];
                $description = $_POST['description'];
                $user_id = $_SESSION['user_id'];
                $targetDir = './public/img/products/';
                $new_price = $initial_price * (1 - ($discount / 100));
                $product_image = $targetDir . basename($image['name']);
                $checkName = $this->productModel->checkNameIgnoreId($product_name, $product_id);
                if ($checkName == null) {
                    if ($image['name'] !== '') {
                        move_uploaded_file($image['tmp_name'], $product_image);
                        $updateProduct = $this->productModel->updateProduct($product_name, $product_image, $new_price, $initial_price, $discount, $description, $is_active, $category_id, $user_id, $quantity, $product_id);
                        if ($updateProduct && $images['name'][0] !== '') {
                            $this->handleUploadImage($images, $targetDir, $product_id);
                        }
                        $_SESSION['checkUpdate'] = true;
                        header('Location: ./?role=admin&page=list-products');
                    }else {
                        $updateProduct = $this->productModel->updateProduct($product_name, null, $new_price, $initial_price, $discount, $description, $is_active, $category_id, $user_id, $quantity, $product_id);
                        if ($updateProduct && $images['name'][0] !== '') {
                            $this->handleUploadImage($images, $targetDir, $product_id);
                        }
                        $_SESSION['checkUpdate'] = true;
                        header('Location: ./?role=admin&page=list-products');
                    }
                }else {
                    $_SESSION['checkUpdate'] = true;
                    header("location: ./?role=admin&page=edit-product&product_id=$product_id");
                }
            }else {
                header('Location: ./?role=admin&page=list-products');
            }
        }

        public function delete() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['product_id']) {
                $this->productModel->deleteProduct($_GET['product_id']);
            }
        }

        public function handleUploadImage($images = [], $targetDir, $product_id) {
            foreach ($images['name'] as $key => $value) {
                $path_image = $targetDir.basename($value);
                move_uploaded_file($images['tmp_name'][$key], $path_image);
                $this->imageModel->addImage($path_image, $product_id);
            }
        }
    }
?>