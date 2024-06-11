<?php
namespace App;

require_once './configs/database.php';
require_once './App/Models/User.php';
require_once './App/Models/Category.php';
require_once './App/Models/Product.php';
require_once './App/Models/Image.php';
require_once './App/utilities/message.php';
require_once './App/Controller/clients/AuthController.php';
require_once './App/Controller/clients/HomeController.php';
require_once './App/Controller/clients/ShopController.php';
require_once './App/Controller/admins/DashboardController.php';
require_once './App/Controller/admins/ProductController.php';
require_once './App/Controller/admins/CategoryController.php';
require_once './App/Controller/admins/ImageController.php';
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
        ],
        'client' => [
            '/' => ['HomeController', 'index'],
            'shop' => ['ShopController', 'index'],
            'product-detail' => ['ShopController', 'single'],
            'blog' => ['View', './App/Views/clients/blog.php'],
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
