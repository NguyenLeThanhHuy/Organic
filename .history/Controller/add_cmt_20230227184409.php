<?php 
    if(isset($_GET['name'])) {
        $user = new user();
        if(!isset($_SESSION['email'])) {
            echo '<script>alert("Vui lòng đăng nhập để bình luận")</script>';
            header("")
        }
        $makh = $_SESSION['email'];
        $client = $user->checkEmail($makh);
        $noidung = $_POST['comment'];
        $mahh = $_GET['name'];
        $slug = $_GET['slug'];
        $user->insertcomment($mahh,$client['fullname'],$noidung);
        header("location: index.php?action=sanpham&slug=$slug");
    }
?>