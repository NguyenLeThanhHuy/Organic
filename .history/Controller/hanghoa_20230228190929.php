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
            if(isset($_GET['id']))
            {
                $name = $result['name'];
        $category_id = $result['category_id'];
        $type = $result['type'];
        $price = $result['price'];
        $img = $result['img'];
        $description = $result['description'];
        $slug = $result['slug'];
        $slt = $result['soluongton'];
            }
            break;
    }

?>