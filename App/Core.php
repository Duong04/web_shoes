<?php
require_once './configs/database.php';
require_once './App/Models/User.php';
require_once './App/Models/Category.php';
require_once './App/Models/Product.php';
require_once './App/Models/Image.php';
require_once './App/utilities/message.php';
require_once './App/Controller/clients/AuthController.php';
require_once './App/Controller/admins/DashboardController.php';
require_once './App/Controller/admins/ProductController.php';
require_once './App/Controller/admins/CategoryController.php';
require_once './App/Controller/admins/ImageController.php';
require_once 'public/library/sendmail/sendmail.php';

class Core {
    public function __construct() {
        $page = isset($_GET['page']) ? $_GET['page'] : '/';
        $role = isset($_GET['role']) ? $_GET['role'] : '/';

        switch($role) {
            case 'admin':
                if (isset($_SESSION['user_id']) && $_SESSION['role'] == 'Admin' || $_SESSION['role'] == 'Staff') {
                    switch($page) {
                        case 'dashboard':
                            $dashboard = new DashboardController();
                            $dashboard->index();
                            break;
                        case 'list-categories':
                            $category = new CategoryController();
                            $category->index();
                            break;
                        case 'add-category':
                            $category = new CategoryController();
                            $category->store();
                            break;
                        case 'edit-category':
                            $category = new CategoryController();
                            $category->edit();
                            break;
                        case 'update-category':
                            $category = new CategoryController();
                            $category->update();
                            break;
                        case 'delete-category':
                            $category = new CategoryController();
                            $category->delete();
                            break;
                        case 'list-products':
                            $products = new ProductController();
                            $products->index();
                            break;
                        case 'add-product':
                            $products = new ProductController();
                            $products->store();
                            break;
                        case 'edit-product':
                            $products = new ProductController();
                            $products->edit();
                            break;
                        case 'update-product':
                            $products = new ProductController();
                            $products->update();
                            break;
                        case 'delete-product':
                            $products = new ProductController();
                            $products->delete();
                            break;
                        case 'library-images':
                            $image = new ImageController();
                            $image->index();
                            break;
                        case 'list-images':
                            $image = new ImageController();
                            $image->imageByProductId();
                            break;
                        case 'add-image':
                            $image = new ImageController();
                            $image->store();
                            break;
                        case 'delete-image':
                            $image = new ImageController();
                            $image->delete();
                            break;
                    }
                }else {
                    header('Location: ./?page=login');
                }
                break;
            default:
                switch ($page) {
                    case '/':
                        require_once './App/Views/clients/home.php';
                        break;
                    case 'shop':
                        require_once './App/Views/clients/shop.php';
                        break;
                    case 'blog':
                        require_once './App/Views/clients/blog.php';
                        break;
                    case 'contact':
                        require_once './App/Views/clients/contact.php';
                        break;
                    case 'login':
                        $auth = new AuthController();
                        $auth->login();
                        break;
                    case 'register':
                        $auth = new AuthController();
                        $auth->register();
                        break;
                    case 'forgot-password':
                        $auth = new AuthController();
                        $auth->forgetPassword();
                        break;
                    case 'confirm-user':
                        $auth = new AuthController();
                        $auth->activeUser();
                        break;
                    case 'reset-password':
                        $auth = new AuthController();
                        $auth->resetPassword();
                        break;
                    case 'logout':
                        $auth = new AuthController();
                        $auth->logout();
                        break;
                    case 'checkmail':
                        require_once './App/Views/clients/checkmail.php';
                        break;
                    default:
                        require_once './App/Views/clients/404.php';
                        break;
                }
        }
    }
}
