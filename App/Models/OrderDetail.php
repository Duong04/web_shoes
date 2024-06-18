<?php 
    class OrderDetail extends Database {
        public function insertOrderDetail($product_id, $quantity, $price, $order_id) {
            $sql = "INSERT INTO order_details(product_id, quantity, price, order_id)
                    VALUES (?, ?, ?, ?)";
            return $this->cud($sql, [$product_id, $quantity, $price, $order_id]);
        }
    }
?>