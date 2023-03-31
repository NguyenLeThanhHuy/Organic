<?php 
    if(isset($_GET['name'])) {
        $makh = $_SESSION['email'];
        $noidung = $_POST['comment'];
        $mahh = $_GET['name'];
        
        $user = new user();
        $user->insertcomment($mahh,$makh,$noidung);
        header("location: index.php?action=sanpham&slug=' . $set['slug'] . '");
    }
?>