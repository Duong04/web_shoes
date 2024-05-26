<?php
require_once './configs/database.php';
require_once './App/Models/UserModels.php';
require_once './App/Controller/clients/AuthController.php';
require_once 'public/library/sendmail/sendmail.php';
class Core {
    public function __construct() {
        // Kiểm tra xem biến $_GET['url'] có tồn tại không trước khi sử dụng nó
        $url = isset($_GET['url']) ? $_GET['url'] : '/';

        switch ($url) {
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
            case 'checkmail':
                require_once './App/Views/clients/checkmail.php';
                break;
            default:
                require_once './App/Views/clients/404.php';
                break;
        }
    }
}
