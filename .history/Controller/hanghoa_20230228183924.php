<?php
    $act = "hanghoa";
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }

    switch ($act) {
        case 'hanghoa':
            include 'View/hanghoa.php';
            break;
        case 'hanghoa':
            include 'View/hanghoa.php';
            break;
        
        default:
            # code...
            break;
    }

?>