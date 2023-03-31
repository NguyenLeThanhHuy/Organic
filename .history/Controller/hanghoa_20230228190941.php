<?php
$act = "hanghoa";
if (isset($_GET['act'])) {
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
        if (isset($_GET['id'])) {
            $name = $_['name'];
            $category_id = $_['category_id'];
            $type = $_['type'];
            $price = $_['price'];
            $img = $_['img'];
            $description = $_['description'];
            $slug = $_['slug'];
            $slt = $_['soluongton'];
        }
        break;
}
