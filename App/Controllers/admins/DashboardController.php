<?php 
    class DashboardController {
        private $order;
        public function __construct() {
            $this->order = new Order();
        }
        public function index() {
            $content = 'dashboard/index';
            $today = date("Y-m-d");
            $startOfDay = $today . ' 00:00:00';
            $endOfDay = $today . ' 23:59:59';
            $yesterday = date("Y-m-d", strtotime("-1 day"));
            $startOfDay = $yesterday. ' 00:00:00';
            $endOfDay = $yesterday. ' 23:59:59';
            $firstDayOfMonth = date("Y-m-01");
            $lastDayOfMonth = date("Y-m-t");
            $firstDayOfLastMonth = date("Y-m-01", strtotime("last month"));
            $lastDayOfLastMonth = date("Y-m-t", strtotime("last month"));
            $orderToday = $this->order->statiscialOrder($startOfDay, $endOfDay);
            $orderYesterday = $this->order->statiscialOrder($yesterday, $startOfDay);
            $monthlyOrder = $this->order->statiscialOrder($firstDayOfMonth, $lastDayOfMonth);
            $lastMonthOrder = $this->order->statiscialOrder($firstDayOfLastMonth, $lastDayOfLastMonth);
            $allOrder = $this->order->statiscialOrder(null, null);
            $totalOrder = $this->order->countOrder(null);
            $pending = $this->order->countOrder('pending');
            $processing = $this->order->countOrder('processing');
            $shipped = $this->order->countOrder('shipped');
            $delivered = $this->order->countOrder('delivered');
            $cancelled = $this->order->countOrder('cancelled');
            require_once './App/Views/admins/layoutAdmin.php';
        }

    }
?>