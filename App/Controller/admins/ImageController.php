<?php 
    class ImageController {
        private $productModel;
        private $imageModel;
        private $image;
        public function __construct() {
            $this->productModel = new Product();
            $this->imageModel = new Image();
            $this->message = new Message();
        } 

        public function index() {
            $products = $this->productModel->selectAllProducts();

            $content = 'images/list';
            require_once './App/Views/admins/layoutAdmin.php';
        }

        public function imageByProductId() {
            if (isset($_GET['product_id'])) {
                $images = $this->imageModel->selectImagesByProductId($_GET['product_id']);
                $content = 'images/list-images';
                require_once './App/Views/admins/layoutAdmin.php';
            }
        }   

        public function store() {
            $content = 'images/add';
            require_once './App/Views/admins/layoutAdmin.php';
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && isset($_GET['product_id'])) {
                $image = $_FILES['image'];
                $targetDir = './public/img/products/';
                $image_path = $targetDir.basename($image['name']);
                move_uploaded_file($image['tmp_name'], $image_path);
                $addImage = $this->imageModel->addImage($image_path, $_GET['product_id']);
                if ($addImage) {
                    $this->message->successMessage('Image Created Successfully!');
                }
            }
        }

        public function delete() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['image_id']) {
                $this->imageModel->deleteImage($_GET['image_id']);
            }
        }
    }