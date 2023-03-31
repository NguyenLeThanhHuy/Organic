<?php
    $act = "hanghoa";
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }

    switch ($act) {
        case "hanghoa":
            include 'View/hanghoa.php';
            break;
        case "edit":
            include 'View/edithanghoa.php';
            break;
        case "edit_action":
            if(isset())
            {

            }
            break;
    }

?>