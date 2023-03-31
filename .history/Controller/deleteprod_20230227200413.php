<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET['index'];
        $hh = new pro();
        $hh->deletePro($i);
        header("Location: index.php?action=hanghoa");
        // include 'View/hanghoa.php';
    }
?>