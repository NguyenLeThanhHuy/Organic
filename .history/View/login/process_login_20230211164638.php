<?php 
    // require 'View/database/dbhelper.php';
    require 'Model/user.php';
?>

<?php
$email = $msg = '';
if(!empty($_POST)) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    // Check email có đúng với thông tin đã đăng kí không
    $user = new user();
    $userExist = $user->checkEmail($email);
    $checkpass = password_verify($pwd , $userExist['password']);
    if(!$checkpass) {
        $msg = '*Đăng nhập không thành công,vui lòng kiểm tra lại thông tin';
    }else {
        $_SESSION['email'] = $email;

        if(isset($_SESSION['']))
        header('Location: index.php');
        die();
    }
}
