<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET['index'];
        $hh = new user();
        $ur = new user();
        $hh->deletePro($i);
        header("Location: index.php?action=hanghoa");
        // include 'View/hanghoa.php';
    }
?>