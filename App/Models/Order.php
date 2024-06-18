<?php 
    class Order extends Database {
        public function insertOrder($totalAmount, $shippingAddress, $shippingMoney, $userId, $orderNote, $numberPhone) {
            $sql = "INSERT INTO orders (total_amount, shipping_address, shipping_money, user_id, order_note, number_phone, order_date) 
                    VALUES (?, ?, ?, ?, ?, ?, NOW())";
            return $this->insertGetId($sql, [$totalAmount, $shippingAddress, $shippingMoney, $userId, $orderNote, $numberPhone]);
        }
    }
?>