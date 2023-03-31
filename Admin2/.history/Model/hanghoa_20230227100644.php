<?php
    class hanghoa{
        public function __construct()
        {
        
        }
        // phương thức lấy ra tất cả hàng hóa
        function getHangHoaAll()
        {
            $db=new connect();
            $select="select * from product_details ";
            $result=$db->getList($select);
            return $result;
        }

        function deletePro()
        {
            $db=new connect();
            $select="select * from product_details ";
            $result=$db->getList($select);
            return $result;
        }


    }
?>