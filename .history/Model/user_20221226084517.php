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
    }
?>