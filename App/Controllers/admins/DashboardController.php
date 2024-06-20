<?php 
    class DashboardController {
        public function index() {
            $content = 'dashboard/index';
            require_once './App/Views/admins/layoutAdmin.php';
        }

    }
?>