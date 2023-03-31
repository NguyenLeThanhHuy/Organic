<?php
    $act = "hanghoa";
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }

    switch ($act) {
        case 'hanghoa':
            include 'View/'
            break;
        
        default:
            # code...
            break;
    }

?>