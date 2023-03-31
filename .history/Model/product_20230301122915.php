<?php 
    class product{
        public function __construct(){
            // Phương thức cần lấy ra sản phẩm mới nhất

        }

        public function getAllProduct() {
            $db = new connect();
            $select = "select * from product_details";
            $result = $db->getList($select);
            return $result;
        } 

        // Method lấy ra các sản phẩm theo category_id từ database
        public function getListProductCategory($category_id) {
            $db = new connect();
            $select = "select * from product_details where category_id = $category_id;";
            $result = $db->getList($select);
            return $result;
        } 

        // Method phân trang tất cả sản phảm từ database
        public function getListProductPagination($num_per_page,$start_from) {
            $db = new connect();
            $select = "select * from product_details limit $start_from, $num_per_page";
            $result = $db->getList($select);
            return $result;
        }

    }
?>