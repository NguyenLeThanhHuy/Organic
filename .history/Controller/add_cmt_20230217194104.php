<?php 
    if(isset($_GET['name'])) {
        $makh = $_SESSION['email'];
        $noidung = $_POST['comment'];
        $mahh = $_GET['name'];
        $user = new user();
        $user->insertcomment($sanpham,$email,$noidung);
    }
    require "./View/sanpham/index.php";
?>