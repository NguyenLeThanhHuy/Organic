<?php
class user
{
    public function __construct()
    {
        // Phương thức cần lấy ra sản phẩm mới nhất

    }

    // Method kiểm tra xem email truyền vào có hợp lệ hay không
    public function checkEmail($email)
    {
        $db = new connect();
        $select = "SELECT * FROM user WHERE email = '$email'";
        $result = $db->getInstance($select);
        return $result;
    }

    // Method kiểm tra xem Tài khoản và mật khẩu của người dùng có đúng hay không
    public function checkLogin($email, $password)
    {
        $db = new connect();
        $select = "SELECT * FROM user WHERE email='$email' and password='$password'";
        $result = $db->getInstance($select);
        return $result;
    }
    function insertcomment($mahh, $makh, $noidung)
    {
        $db = new connect();
        $date = new DateTime("now");
        $datecreate = $date->format("Y-m-d");
        
        $query = "insert into binhluan1(mabl,namehh,namekh,ngaybl,noidung)
            values(Null,'$mahh','$makh','$datecreate','$noidung')";
        execute($query);
    }

    function deletecomment($namehh)
    {
        $query = "delete from binhluan1 where namehh = '$namehh'";
        execute($query);
    }
    function updateEmail($emailold, $passnew)
    {
        $db = new connect();
        $query = "update user set password='$passnew' where email='$emailold'";
        // echo $select;
        execute($query);
    }
    function Tongcomment($mahh)
    {
        $db = new connect();
        $select = "select count(b.mabl) from binhluan1 b where b.namehh='$mahh'";
        $result = $db->getInstance($select);
        return $result[0];
    }
    function HienThicomment($mahh)
    {
        $db = new connect();
        $select = "select user.fullname, binhluan1.noidung from user , binhluan1 where user.fullname = binhluan1.namekh and namehh='$mahh' ORDER by mabl DESC";
        $result = $db->getList($select);
        return $result;
    }
    // lấy lại địa chỉ email và mật khẩu của user
    function getEmail($email)
    {
        $db = new connect();
        $select = "select email,password from user where email='$email'";
        $result = $db->getInstance($select);
        return $result;
    }
    // lấy lại email và mật khẩu
    function getPassEmail($email, $pass)
    {
        $select = "select email,password from user 
            where md5(email)='$email' and md5(password)='$pass'";
        // select email, password from khachhang1 where md5(phptestly20@gmail.com)='405999d3a4fb8cddf893e238928c001'
        $db = new connect();
        $result = $db->getInstance($select);
        return $result;
    }

    // phương thức loginadmin
    public function logAdmin($user, $pass)
    {
        $db = new connect();
        $select = "select * from admin where user='$user' and password='$pass'";
        // echo $select;
        $result = $db->getInstance($select);
        return $result;
        // $result=$db->getList($select);
        // $set=$result->fetch(); // $set[admin,123456]
        // return $set;
    }
}
