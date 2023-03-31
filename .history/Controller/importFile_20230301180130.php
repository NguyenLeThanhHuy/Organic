<?php 
    $act = "loai";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'loai':
            include "View/addloaisanpham.php";
            break;
        
        default:
            # code...
            break;
    }
?>