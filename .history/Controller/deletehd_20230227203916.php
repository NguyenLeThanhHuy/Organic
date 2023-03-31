<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET['index'];
        $hh = new hoadon();
        
        $hh->deleteUser($i);
        header("Location: index.php?action=khachhang");
        // include 'View/hanghoa.php';
    }
?>