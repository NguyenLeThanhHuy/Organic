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
            $img = 'assets/photos/';
            $id = $_GET['id'];
            $name = $_POST['name'];
            $category_id = $_POST['category_id'];
            $type = $_POST['type'];
            $price = $_POST['price'];
            $img .= $_FILES['image']['name'];
            $description = $_POST['description'];
            $slug = $_POST['slug'];
            $slt = $_POST['slt'];
         
            $hh = new productdetails();
            $check = $hh->updatesp($id,$name,$price,$img,$type,$category_id,$description,$slt,$slug);
            if($check !== false) {
                uploadimage();
                echo '<script> alert("Upload thanh cong")</script>';
            }else {
                echo '<script> alert("Upload khong thanh cong")</script>';
            }
           
            header('location: index.php?action=hanghoa');
        }
        break;
}
