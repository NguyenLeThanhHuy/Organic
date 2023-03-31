<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET['index'];
        $hh = new hoadon();
        
        $hh->deletehd($i);
        header("Location: index.php?action=hoadon");
        // include 'View/hanghoa.php';
    }
?>