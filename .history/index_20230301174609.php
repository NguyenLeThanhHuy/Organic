<?php
ob_start();
if (session_id() === '') {
    session_start();
}
// Connect với database (use PDO)
// include "Model/connect.php";
// // Lấy các method để show product
// include "Model/product.php";
// // Lấy connect
include "Model/uploadimage.php"
include "View/sendemailphpmailer/class/class.smtp.php";
include "View/sendemailphpmailer/class/class.phpmailer.php";
include "View/database/config.php";
spl_autoload_register('MyModelClassLoader');
function MyModelClassLoader($classname)
{
    $path = 'Model/';
    include $path . $classname . '.php';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- link đăng nhập -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/Tour.css">
</head>

<body>
    

    <?php
    if (isset($_SESSION['admin'])) {
        include "View/layouts/headderad.php";
    } else {
        require_once('./View/layouts/header.php');
    }
    ?>

    <?php
    // Default: / or index.php thì sẽ render ra trang chủ
    // Nếu như có kèm theo action thì sẽ chuyển trang theo Controller
    $ctrl = "trangchu";

    // Check action có tồn tại hay không
    if (isset($_GET["action"])) {
        $ctrl = $_GET["action"];
    }
    // Gọi đến Controller rồi render page ra
    include "Controller/" . $ctrl . ".php";
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>

    <?php
  
    
  

    if (isset($_SESSION['admin'])) {
        include "View/layouts/footerad.php";
    } else {
        require_once('./View/layouts/footer.php');
    }
    ?>

</body>

</html>