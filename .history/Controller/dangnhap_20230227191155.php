<?php
    $act="dangnhap";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'dangnhap':
            include "./View/adminlogin.php";
            break;
        case 'dangnhap_action':
            //echo "hello";
            if(isset($_POST['txtusername'])&& isset($_POST['txtpassword']))
            {
              
                $user=$_POST['txtusername'];// admin
                $pass=$_POST['txtpassword'];// 123456
                $usr=new user();
                $check=$usr->logAdmin($user,$pass);
                if($check!=false)
                {
                   
                    // tạo ra $_sessionđể lưu thông tin ad mi khi mà đăng nhập
                    $_SESSION['admin']=$check[0];//admin
                    var_dump($_SESSION['admin']);
                    exit()
                    echo '<script>alert("Đăng nhập thành công");</script>';
                    include "./View/hanghoa.php";
                    // echo '<meta http-equiv=refresh content="0;url=./index.php?action=hanghoa';
                }
            }
            break;
    }
   
?>