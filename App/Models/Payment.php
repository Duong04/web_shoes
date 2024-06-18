<?php 
    class Payment extends Database {
        public function insertPayment($paymentMethod, $amount, $order_id) {
            $sql  = "INSERT INTO payments (payment_method, amount, order_id, status, payment_date) 
                    VALUES(?, ?, ?, 'unpaid', NOW())"; 
            return $this->cud($sql, [$paymentMethod, $amount, $order_id]);
        }
    }
?>