<?php 
    class Product extends Database {
        public function selectAllProducts() {
            $sql = "SELECT P.*, U.*, C.*, P.created_at AS product_created_at, P.updated_at AS product_updated_at FROM products P 
                    INNER JOIN categories C On C.category_id = P.category_id
                    INNER JOIN users U ON U.user_id = P.user_id";
            return $this->selectAll($sql);
        }

        public function selectAllProductActive() {
            $sql = "SELECT * FROM products WHERE is_active = 'active'";
            return $this->selectAll($sql);
        }

        public function selectAllProductWithCategories($category_name) {
            $sql = "SELECT * FROM products P INNER JOIN categories C ON C.category_id = P.category_id WHERE P.is_active = 'active' AND C.category_name = ?";
            return $this->selectAllWithId($sql, [$category_name]);
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

        public function updateProduct($product_name, $product_image, $new_price, $initial_price, $discount, $description, $is_active, $category_id, $user_id, $quantity_product, $product_id) {
            if (isset($product_image)) {
                $sql = "UPDATE products SET product_name = ?, product_image = ?, new_price = ?, initial_price = ?, discount = ?, description = ?, is_active = ?, category_id = ?, user_id = ?, quantity_product = ?, updated_at = NOW() WHERE product_id = ?";
                return $this->cud($sql, [$product_name, $product_image, $new_price, $initial_price, $discount, $description, $is_active, $category_id, $user_id, $quantity_product, $product_id]);
            }else {
                $sql = "UPDATE products SET product_name = ?, new_price = ?, initial_price = ?, discount = ?, description = ?, is_active = ?, category_id = ?, user_id = ?, quantity_product = ?, updated_at = NOW() WHERE product_id = ?";
                return $this->cud($sql, [$product_name, $new_price, $initial_price, $discount, $description, $is_active, $category_id, $user_id, $quantity_product, $product_id]);
            }
        }

        public function checkNameIgnoreId($name, $product_id) {
            $sql = "SELECT * FROM products WHERE product_name = ? AND product_id != ?";
            return $this->selectOne($sql, [$name, $product_id]);
        }

        public function latestProducts() {
            $sql = "SELECT * FROM products ORDER BY updated_at DESC LIMIT 8";
            return $this->selectAll($sql);
        }

        public function saleProducts() {
            $sql = "SELECT * FROM products ORDER BY discount DESC LIMIT 8";
            return $this->selectAll($sql);
        }

        public function saleProductsRand() {
            $sql = "SELECT * FROM products WHERE discount > 0 ORDER BY RAND() LIMIT 5";   
            return $this->selectAll($sql);
        }

        public function countProducts($category_name) {
            $sql = "SELECT COUNT(*) as product_count FROM products P INNER JOIN categories C ON C.category_id = P.category_id WHERE P.is_active = 'active' AND C.category_name = ?";
            return $result = $this->count($sql, [$category_name]);

            // Kiểm tra xem kết quả có tồn tại không
            if(isset($result['product_count'])) {
                return $result['product_count']; // Trả về số lượng sản phẩm
            } else {
                return 0; // Trả về 0 nếu không có sản phẩm
            }
        }
    }
?>