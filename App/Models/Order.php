<?php 
    class Order extends Database {
        public function insertOrder($totalAmount, $shippingAddress, $shippingMoney, $userId, $orderNote, $numberPhone) {
            $sql = "INSERT INTO orders (total_amount, shipping_address, shipping_money, user_id, order_note, number_phone, order_date) 
                    VALUES (?, ?, ?, ?, ?, ?, NOW())";
            return $this->insertGetId($sql, [$totalAmount, $shippingAddress, $shippingMoney, $userId, $orderNote, $numberPhone]);
        }

        public function selectOrders() {
            $sql = "SELECT O.*, OD.*, P.*, U.*, O.status as order_status FROM orders O 
                    INNER JOIN order_details OD ON O.order_id = OD.order_id
                    INNER JOIN payments P ON O.order_id = P.order_id
                    INNER JOIN users U ON O.user_id = U.user_id";
            return $this->selectAll($sql);
        }
    }
?>