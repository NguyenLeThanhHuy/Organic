<?php 
    $act = "loai";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch ($act) {
        case 'loai':
            include "View/addloaisanpham.php";
            break;
        case 'loaiimport':
            if(isset($_POST['submit_file'])){
                $file = $_FILES['file']['tmp_name']
            }
            break;
        
        
    }
?>