<?php 
    class Order extends Database {
        public function insertOrder($totalAmount, $shippingAddress, $shippingMoney, $userId, $orderNote, $numberPhone) {
            $sql = "INSERT INTO orders (total_amount, shipping_address, shipping_money, user_id, order_note, number_phone, order_date) 
                    VALUES (?, ?, ?, ?, ?, ?, NOW())";
            return $this->insertGetId($sql, [$totalAmount, $shippingAddress, $shippingMoney, $userId, $orderNote, $numberPhone]);
        }

        public function selectOrders() {
            $sql = "SELECT O.*, P.*, U.*, O.status as order_status FROM orders O 
                    INNER JOIN payments P ON O.order_id = P.order_id
                    INNER JOIN users U ON O.user_id = U.user_id";
            return $this->selectAll($sql);
        }

        public function selectOrderWithUserId($status, $userId) {
            $sql = "SELECT O.*, P.*, U.*, O.status as order_status, P.status as payment_status FROM orders O 
                    INNER JOIN payments P ON O.order_id = P.order_id
                    INNER JOIN users U ON O.user_id = U.user_id
                    WHERE O.user_id = ? AND O.status = ?";
            return $this->selectAllWithId($sql, [$userId, $status]);
        }

        public function selectOrdersById($id) {
            $sql = "SELECT O.*, OD.*, P.*, U.*, O.status as order_status, P.status as payment_status FROM orders O 
                    INNER JOIN order_details OD ON O.order_id = OD.order_id
                    INNER JOIN payments P ON O.order_id = P.order_id
                    INNER JOIN users U ON O.user_id = U.user_id
                    WHERE O.order_id = ?";
            return $this->selectOne($sql, [$id]);
        }

        public function updateStatus($id, $status) {
            $sql = "UPDATE orders SET status = ? WHERE order_id = ?";
            return $this->cud($sql, [$status, $id]);
        }

        public function statiscialOrder($first, $last) {
            $sql = '';
            if ($first == null && $last == null) {
                $sql = "SELECT SUM(total_amount) as totalAmount FROM orders WHERE status = 'delivered'";
            }else {
                $sql = "SELECT SUM(total_amount) as totalAmount FROM orders WHERE order_date BETWEEN '$first' AND '$last' AND status = 'delivered'";
            }
            return $this->selectStatistical($sql);
        }

        public function countOrder($status) {
            $sql = '';
            if ($status == null) {
                $sql = "SELECT COUNT(*) AS totalOrders FROM orders WHERE status != 'cancelled'";
            }else {
                $sql = "SELECT COUNT(*) AS totalOrders FROM orders WHERE status ='$status'";
            }
            return $this->selectStatistical($sql);
        }
    }
?>