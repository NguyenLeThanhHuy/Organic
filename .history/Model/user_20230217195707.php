<?php 
    class user{
        public function __construct(){
            // Phương thức cần lấy ra sản phẩm mới nhất

        }

        // Method kiểm tra xem email truyền vào có hợp lệ hay không
        public function checkEmail($email) {
            $db = new connect();
            $select = "SELECT * FROM user WHERE email = '$email'";
            $result = $db->getInstance($select);
            return $result;
        }

        // Method kiểm tra xem Tài khoản và mật khẩu của người dùng có đúng hay không
        public function checkLogin($email , $password) {
            $db = new connect();
            $select = "SELECT * FROM user WHERE email='$email' and password='$password'";
            $result = $db->getInstance($select);
            return $result;
        }
        function insertcomment($mahh,$makh,$noidung)
        {
            $db=new connect();
            $date=new DateTime("now");
            $datecreate=$date->format("Y-m-d");
            $query="insert into binhluan1(mabl,mahh,makh,ngaybl,noidung)
            values(Null,$mahh,$makh,'$datecreate','$noidung')";
            
            execute($query);
        }
        function Tongcomment($mahh)
        {
            $db=new connect();
            $select="select count(b.mabl) from binhluan1 b where b.namehh='$mahh'";
            $result=$db->getInstance($select);
            return $result[0];
        }
        function HienThicomment($mahh)
        {
            $db=new connect();
            $select="select user.fullname, binhluan1.noidung from user , binhluan1 where user.fullname = binhluan1.namekh and namehh='Cà chua hữu cơ' ORDER by mabl DESC";
            $result=$db->getList($select);
            return $result;
        }
    }
?>