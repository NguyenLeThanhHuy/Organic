<?php 
    if(isset($_GET['name'])) {
        $user = new user();
        $makh = $_SESSION['email'];
        if($_SESSION['email'])
        $client = $user->checkEmail($makh);
        $noidung = $_POST['comment'];
        $mahh = $_GET['name'];
        $slug = $_GET['slug'];
        $user->insertcomment($mahh,$client['fullname'],$noidung);
        header("location: index.php?action=sanpham&slug=$slug");
    }
?>