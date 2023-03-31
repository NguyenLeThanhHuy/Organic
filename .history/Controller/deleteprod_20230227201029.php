<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET['index'];
        $hh = new productdetails();
        $ur = new user();
        $result = $hh->getHangHoabyID($i);

        $hh->deletePro($i);
        header("Location: index.php?action=hanghoa");
        // include 'View/hanghoa.php';
    }
?>