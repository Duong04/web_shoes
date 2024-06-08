<?php 
    class Image extends Database {
        public function addImage($image, $product_id) {
            $sql = "INSERT INTO library_images(image_path, product_id)
                    VALUE (?, ?)";
            return $this->cud($sql, [$image, $product_id]);
        }

        public function selectImagesByProductId($product_id) {
            $sql = "SELECT * FROM library_images L INNER JOIN products P ON P.product_id = L.product_id WHERE L.product_id = ?";
            return $this->selectAllWithId($sql, [$product_id]);
        }

        public function deleteImage($id) {
            $sql = "DELETE FROM library_images WHERE image_id = ?";
            return $this->cud($sql, [$id]);
        }

        public function selectById($id) {
            $sql = "SELECT * FROM library_images WHERE image_id = ?";
            return $this->selectOne($sql, [$id]);
        }

        public function updateImage($image, $id) {
            $sql = "UPDATE library_images SET image_path = ? WHERE image_id = ?";
            return $this->cud($sql, [$image, $id]);
        }
    }

?>