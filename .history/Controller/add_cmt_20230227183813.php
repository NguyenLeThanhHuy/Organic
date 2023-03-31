<?php 
    if(isset($_GET['name'])) {
        $user = new user();
        
        if(isset($_SESSION['email'])) {
            $makh = $_SESSION['email'];
            $client = $user->checkEmail($makh);
        }else {

        }
       
        $noidung = $_POST['comment'];
        $mahh = $_GET['name'];
        $slug = $_GET['slug'];
        $user->insertcomment($mahh,$client['fullname'],$noidung);
        header("location: index.php?action=sanpham&slug=$slug");
    }
?>