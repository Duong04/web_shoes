<?php 
    class OrderDetail extends Database {
        public function insertOrderDetail($product_id, $quantity, $price, $order_id) {
            $sql = "INSERT INTO order_details(product_id, quantity, price, order_id)
                    VALUES (?, ?, ?, ?)";
            return $this->cud($sql, [$product_id, $quantity, $price, $order_id]);
        }

        public function selectOrderDetail($orderId) {
            $sql = "SELECT * FROM order_details OD 
                    INNER JOIN products P ON OD.product_id = P.product_id
                    INNER JOIN orders O ON OD.order_id = O.order_id
                    WHERE OD.order_id = ?";
            return $this->selectAllWithId($sql, [$orderId]);
        }
    }
?>