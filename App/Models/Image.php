<?php 
    class Image extends Database {
        public function addImage($image, $product_id) {
            $sql = "INSERT INTO library_images(image_path, product_id)
                    VALUE (?, ?)";
            return $this->cud($sql, [$image, $product_id]);
        }

        public function selectImagesByProductId($product_id) {
            $sql = "SELECT * FROM library_images WHERE product_id = ?";
            return $this->selectAllWithId($sql, [$product_id]);
        }
    }

?>