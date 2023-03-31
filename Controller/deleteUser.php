<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET['index'];
        $hh = new user();
        $ha = new productdetails();
        $hd = new hoadon();
        
        $user = $hh->getUser($i);
        $hh->deleteUser($i);
        $hh->deletecomment($user['fullname'],true);
        $hd->deletehd($i,$user['fullname']);
        header("Location: index.php?action=khachhang");
        // include 'View/hanghoa.php';
    }
?>