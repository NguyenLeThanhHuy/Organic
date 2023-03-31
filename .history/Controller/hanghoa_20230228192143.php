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
            var_dump($POST);
            exit();
            // $id = $_GET['id'];
            // $name = $_POST['name'];
            // $category_id = $_POST['category_id'];
            // $type = $_POST['type'];
            // $price = $_POST['price'];
            // $img = $_FILES['image']['name'];
            // $description = $_POST['description'];
            // $slug = $_POST['slug'];
            // $slt = $_POST['slt'];
            // $hh = new productdetails();
            // $hh->updatesp($id,$name,$price,$img,$type,$category_id,$description,$slt,$slug);
            // echo '<script> alert("Cap nhat thanh cong")</script>';
        }
        break;
}
