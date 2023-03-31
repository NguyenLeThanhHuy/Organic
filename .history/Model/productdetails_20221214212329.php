<?php 
    class productdetails{
        public function __construct(){
            // Phương thức cần lấy ra sản phẩm mới nhất

        }

        // Method lấy ra sản phẩm chi tiết từ $slug
        public function getListProductDetails($slug) {
            $db = new connect();
            $select =  "SELECT * FROM product_details WHERE slug = '$slug'";
            $result = $db->getList($select);
            return $result;
        }

        // Method lấy ra các ảnh mô tả cho sản phẩm
        public function getListImgDesProductDetails($id) {
            $db = new connect();
            $select =  "SELECT * FROM img_desct WHERE product_id = $id";
            $result = $db->getList($select);
            return $result;
        }

        // Method lấy ra các sản phẩm liên quan (Cùng category, khác id, tối đa 4)
        public function getListProductRelate($id ,$category_id ) {
            $db = new connect();
            $select =  "SELECT * FROM product_details WHERE mahh != $id AND category_id = '$category_id' limit 4";
            $result = $db->getList($select);
            return $result;
        }
    }
?>