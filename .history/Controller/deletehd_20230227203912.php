<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET['index'];
        $hh = new hoadon();
        $ur = new user();
        $hh->deleteUser($i);
        header("Location: index.php?action=khachhang");
        // include 'View/hanghoa.php';
    }
?>