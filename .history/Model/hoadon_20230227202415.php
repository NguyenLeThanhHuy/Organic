<?php 
    class hoadon{
        public function __construct(){
            // Phương thức cần lấy ra sản phẩm mới nhất

        }

        public function getHDAll() {
            $db = new connect();
            $select = "select * from hoadon";
            $result = $db->getList($select);
            return $result;
        } 

       

    }
?>