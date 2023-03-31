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

         function deleteUser($id)
    {
        $db = new connect();
        $query = "delete from hoadon where mahh = $id";
        $db->exec($query);
    }

       

    }
?>