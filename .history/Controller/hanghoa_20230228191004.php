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
            $id = $_POST['name'];
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $type = $_POST['type'];
            $price = $_POST['price'];
            $img = $_POST['img'];
            $description = $_POST['description'];
            $slug = $_POST['slug'];
            $slt = $_POST['soluongton'];
        }
        break;
}