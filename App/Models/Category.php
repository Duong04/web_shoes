<?php 
    class Category extends Database {
        public function selectCategories() {
            $sql = "SELECT C.*, U.*, C.created_at AS category_created_at, C.updated_at AS category_updated_at FROM categories C INNER JOIN users U On U.user_id = C.user_id";
            return $this->selectAll($sql);
        }
        public function addCategory($category_name, $user_id) {
            $sql = "INSERT INTO categories(category_name, user_id, created_at, updated_at) 
            VALUES (?, ?, NOW(), NOW())";
            return $this->cud($sql, [$category_name, $user_id]);
        }

        public function selectName($name) {
            $sql = "SELECT * FROM categories WHERE category_name = ?";
            return $this->selectOne($sql, [$name]);
        }

        public function selectCategoryId($category_id) {
            $sql = "SELECT * FROM categories WHERE category_id = ?";
            return $this->selectOne($sql, [$category_id]);
        }

        public function updateCategory($category_name, $user_id, $category_id) {
            $sql = "UPDATE categories SET category_name = ?, user_id = ?, updated_at = NOW() WHERE category_id = ?";
            return $this->cud($sql, [$category_name, $user_id, $category_id]);
        }

        public function checkName($category_name, $category_id) {
            $sql = "SELECT * FROM categories WHERE category_name = ? AND category_id != ?";
            return $this->selectOne($sql, [$category_name, $category_id]);
        }

        public function deleteCategory($category_id) {
            $sql = "DELETE FROM categories WHERE category_id = ?";
            return $this->cud($sql, [$category_id]);
        }
    }
?>