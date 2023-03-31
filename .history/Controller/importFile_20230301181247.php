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
                $file = $_FILES['file']['tmp_name'];
                file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
                $file_open = fopen($file,"r");
                while(($csv = fgetcsv($file_open,1000,",")) !== false) {
                    $db = new connect();
                    $mahh = $csv[0];
                    $category_id = $csv[1];
                    $name = $csv[0];
                    $type = $csv[0];
                    $name = $csv[0];
                }
            }
            break;
        
        
    }
?>