<?php 
    class OrderManagementController {
        private $order;
        public function __construct() {
            $this->order = new Order();
        }
        public function index() {
            $orders = $this->order->selectOrders();

            $content = 'orders/list';
            require_once './App/Views/admins/layoutAdmin.php';
        }
    }