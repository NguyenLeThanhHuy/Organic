<?php
class hoadon
{
    public function __construct()
    {
        // Phương thức cần lấy ra sản phẩm mới nhất

    }

    public function getHDAll()
    {
        $db = new connect();
        $select = "select * from hoadon";
        $result = $db->getList($select);
        return $result;
    }

    function deletehd($id , $idUser = null)
    {
        $db = new connect();
        if($idUser) {
            $query = "delete from hoadon where user_name = '$idUser'";
        }else {
            $query = "delete from hoadon where mahd = $id";
        }
        $db->exec($query);
    }


}
