<?php 
    require_once 'vendor/autoload.php';
    use App\Router;
    
    session_start();
    
    new Router();

?>