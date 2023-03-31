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

        function deletePro($id)
        {
            $db=new connect();
            $select="delete from product_details where mahh = '$id'";
            $db->exec($select);
        }

        function updatesp($id,$name,$price,$img,$type,$category_id,$dacbiet,$soluotxem,$ngaylap,$mota,$soluongton,$mausac,$size)
        {      
            $db=new connect();      
            $query="update product_details set name='$name',price=$price,  img='$img', type=$type, category_id=$category_id, dacbiet=$dacbiet, soluotxem=$soluotxem, ngaylap='$ngaylap', mota='$mota', soluongton=$soluongton, mausac='$mausac', size=$size where mahh=$id ";
            $db->exec($query);    
        }


    }
