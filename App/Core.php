<?php

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
                require_once './App/Views/clients/login.php';
                break;
            case 'register':
                require_once './App/Views/clients/register.php';
                break;
            default:
                require_once './App/Views/clients/404.php';
                break;
        }
    }
}
