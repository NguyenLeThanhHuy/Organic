<?php
    
    if(!empty($_GET['index'])) {
        $i = $_GET('index');
        $hh = new hanghoa();
        $hh->deletePro($i);
        header('location: index.php?action') ;
    }
?>