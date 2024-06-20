<?php 
    class OrderManagementController {
        private $order;
        private $orderDetail;
        public function __construct() {
            $this->order = new Order();
            $this->orderDetail = new OrderDetail();
        }
        public function index() {
            $orders = $this->order->selectOrders();

            $content = 'orders/list';
            require_once './App/Views/admins/layoutAdmin.php';
        }

        public function OrderDetail() {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $order = $this->order->selectOrdersById($id);
                $orderDetails = $this->orderDetail->selectOrderDetail($id);
                $content = 'orders/list-detail';
                require_once './App/Views/admins/layoutAdmin.php';
            }
        }
    }