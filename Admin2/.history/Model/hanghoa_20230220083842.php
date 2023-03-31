<?php
    class hanghoa{
        public function __construct()
        {
        
        }
        // phương thức lấy ra tất cả hàng hóa
        function getHangHoaAll()
        {
            $db=new connect();
            $select="select * from hanghoa ";
            $result=$db->getList($select);
            return $result;
        }
    }
?>