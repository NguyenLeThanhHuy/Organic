<?php 
    if(isset($_GET['name'])) {
        $email = $_SESSION['email'];
        $noidung = $_POST['comment'];
        $sanpham = $_GET['name'];
        $user = new user();
        
    }
    require "./View/sanpham/index.php";
?>