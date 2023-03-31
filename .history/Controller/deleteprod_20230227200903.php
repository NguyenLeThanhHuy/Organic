<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET['index'];
        $hh = new productdetails();
        $result = $hh->getHangHoabyID($i);
        var_dump($result);
        exit();
        $hh->deletePro($i);
        header("Location: index.php?action=hanghoa");
        // include 'View/hanghoa.php';
    }
?>