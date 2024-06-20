<?php
namespace App;

require_once './configs/database.php';
require_once './App/Models/Users.php';
require_once './App/Models/Category.php';
require_once './App/Models/Product.php';
require_once './App/Models/Image.php';
require_once './App/Models/Order.php';
require_once './App/Models/OrderDetail.php';
require_once './App/Models/Payment.php';
require_once './App/utilities/message.php';
require_once './App/Controllers/clients/AuthController.php';
require_once './App/Controllers/clients/HomeController.php';
require_once './App/Controllers/clients/ShopController.php';
require_once './App/Controllers/clients/CartController.php';
require_once './App/Controllers/clients/OrderController.php';
require_once './App/Controllers/admins/DashboardController.php';
require_once './App/Controllers/admins/ProductController.php';
require_once './App/Controllers/admins/CategoryController.php';
require_once './App/Controllers/admins/ImageController.php';
require_once './App/Controllers/admins/OrderManagementController.php';
require_once 'public/library/sendmail/sendmail.php';


class Router {
    private $routes = [
        'admin' => [
            'dashboard' => ['DashboardController', 'index'],
            'list-categories' => ['CategoryController', 'index'],
            'add-category' => ['CategoryController', 'store'],
            'edit-category' => ['CategoryController', 'edit'],
            'update-category' => ['CategoryController', 'update'],
            'delete-category' => ['CategoryController', 'delete'],
            'list-products' => ['ProductController', 'index'],
            'add-product' => ['ProductController', 'store'],
            'edit-product' => ['ProductController', 'edit'],
            'update-product' => ['ProductController', 'update'],
            'delete-product' => ['ProductController', 'delete'],
            'library-images' => ['ImageController', 'index'],
            'list-images' => ['ImageController', 'imageByProductId'],
            'add-image' => ['ImageController', 'store'],
            'edit-image' => ['ImageController', 'edit'],
            'update-image' => ['ImageController', 'update'],
            'delete-image' => ['ImageController', 'delete'],
            'orders' => ['OrderManagementController', 'index'],
        ],
        'client' => [
            '/' => ['HomeController', 'index'],
            'search' => ['HomeController', 'search'],
            'shop' => ['ShopController', 'index'],
            'product-detail' => ['ShopController', 'single'],
            'cart' => ['CartController', 'index'],
            'add-cart' => ['CartController', 'addCart'],
            'update-quantity' => ['CartController', 'updateQuantity'],
            'remove-cart' => ['CartController', 'removeCart'],
            'checkout' => ['OrderController', 'checkout'],
            'blog' => ['View', './App/Views/clients/blog.php'],
            'thanks' => ['View', './App/Views/clients/thanks.php'],
            'contact' => ['View', './App/Views/clients/contact.php'],
            'login' => ['AuthController', 'login'],
            'register' => ['AuthController', 'register'],
            'forgot-password' => ['AuthController', 'forgetPassword'],
            'confirm-user' => ['AuthController', 'activeUser'],
            'reset-password' => ['AuthController', 'resetPassword'],
            'logout' => ['AuthController', 'logout'],
            'checkmail' => ['View', './App/Views/clients/checkmail.php'],
        ]
    ];

    public function __construct() {
        $page = isset($_GET['page']) ? $_GET['page'] : '/';
        $role = isset($_GET['role']) ? $_GET['role'] : 'client';

        if ($role === 'admin') {
            if (isset($_SESSION['user_id']) && ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Staff')) {
                $this->handleRoute($role, $page);
            } else {
                header('Location: ./?page=login');
                exit();
            }
        } else {
            $this->handleRoute($role, $page);
        }
    }

    private function handleRoute($role, $page) {
        if (isset($this->routes[$role][$page])) {
            $route = $this->routes[$role][$page];
            $controller = $route[0];
            $action = $route[1];

            if ($controller === 'View') {
                require_once $action;
            } else {
                $controllerInstance = new $controller();
                $controllerInstance->$action();
            }
        } else {
            require_once './App/Views/clients/404.php';
        }
    }
}
