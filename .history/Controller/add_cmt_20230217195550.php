<?php 
    if(isset($_GET['name'])) {
        $user = new user();
        $makh = $_SESSION['email'];
        $client = $user->checkEmail($makh);
        var
        $noidung = $_POST['comment'];
        $mahh = $_GET['name'];
        $slug = $_GET['slug'];
        $user->insertcomment($mahh,$makh,$noidung);
        header("location: index.php?action=sanpham&slug=$slug");
    }
?>