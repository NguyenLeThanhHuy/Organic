<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET['index'];
        $hh = new productdetails();
        $ur = new user();
        $hd = new hoadon();
        $result = $hh->getHangHoabyID($i);
        $ur->deletecomment($result['name']);
        $hh->deletePro($i);
        $hd->deletehd($i);
        header("Location: index.php?action=hanghoa");
        // include 'View/hanghoa.php';
    }
?>