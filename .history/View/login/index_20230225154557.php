<?php
ob_start();
if(session_id() === '') {
    session_start();
}

$title = "Đăng nhập";

include_once 'process_login.php';
?>


<link rel="stylesheet" href="assets/css/account.css">
<title><?= $title ?></title>
<div class="breadcrumb_bg">
    <div class="breadcrumb-box-img">
        <img src="assets/img/bg_breadcrumb.png" alt="">
    </div>
    <div class="title-full">
        <div class="container">
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
            <p class="title-page">Tài khoản</p>
        </div>
    </div>
</div>
<div class="login-main">
    <div class="login-container">
        <div class="login-title">
            <h3>Đăng nhập</h3>
            <div style="color: red;text-align:center;"><?= $msg ?></div>
        </div>
        <div class="login-chu-y">
            <span>Nếu bạn đã có tài khoản, đăng nhập tại đây.</span>
        </div>
        <div class="container-form">
            <form action="" method="post" class="form-account">
                <div class="form-group">
                    <label for="">Email:</label>
                    <input require name="email" type="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu:</label>
                    <input require type="password" name="password" placeholder="Mật khẩu">
                </div>
                <div class="group-btn">
                    <button type="submit" class="btn-account">Đăng nhập</button>
                    <a href="index.php?action=register" class="tag-a">Đăng ký</a>
                </div>
            </form>
            <div><a href="index.php?action=forgetps">Forget Password</a></div>
        </div>
    </div>
</div>



