<?php 
    if(isset($_GET['name'])) {
        $makh = $_SESSION['email'];
        $noidung = $_POST['comment'];
        $mahh = $_GET['name'];
        $slug = $_GET['slug'];
        var_dump($makh, $mahh,$noidung,$slug);
        exit();
        $user = new user();
        $user->insertcomment($mahh,$makh,$noidung);
        header("location: index.php?action=sanpham&slug=$slug");
    }
?>