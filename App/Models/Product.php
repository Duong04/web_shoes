<?php 
    class Product extends Database {
        public function selectAllProducts() {
            $sql = "SELECT P.*, U.*, C.*, P.created_at AS product_created_at, P.updated_at AS product_updated_at FROM products P 
                    INNER JOIN categories C On C.category_id = P.category_id
                    INNER JOIN users U ON U.user_id = P.user_id";
            return $this->selectAll($sql);
        }

        public function selectProductById($id) {
            $sql = "SELECT * FROM products P 
                    INNER JOIN categories C On C.category_id = P.category_id
                    WHERE P.product_id = ?";
            return $this->selectOne($sql, [$id]);
        }

        public function selectName($name) {
            $sql = "SELECT * FROM products WHERE product_name = ?";
            return $this->selectOne($sql, [$name]);
        }

        public function addProduct($product_name, $product_image, $new_price, $initial_price, $discount, $description, $is_active, $category_id, $user_id, $quantity_product) {
            $sql = "INSERT INTO products(product_name, product_image, new_price, initial_price, discount, description, is_active, category_id, user_id, quantity_product, created_at, updated_at)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())";
            return $this->insertGetId($sql, [$product_name, $product_image, $new_price, $initial_price, $discount, $description, $is_active, $category_id, $user_id, $quantity_product]);
        }

        public function deleteProduct($id) {
            $sql = "DELETE FROM products WHERE product_id = ?";
            return $this->cud($sql, [$id]);
        }
    }
?>