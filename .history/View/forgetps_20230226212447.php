<?php
$act="forgetps";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'forgetps':
        include "./View/forgetpassword.php";
        break;
    case 'forgetps_action':
        //gửi về địa chỉ mail
        if(isset($_POST['submit_email'])&& $_POST['email'])
        {
            // echo "hello";
            $getemail=$_POST['email'];//phptestly20@gmail.com
            $_SESSION['email2']=array();
            // với địa chỉ email người dùng mới nhập vào( nhớ là địa chỉ email 
            //phải tồn tại trong database)
            // truy vấn lấy ra email, mật khẩu dựa trên email mới nhập vào
            $ur=new User();
            $result=$ur->getEmail($getemail);
            // lấy ra email và mật khẩu trả về từ database
            // $resuil[email: phptestly20@gmail.com,matkhau:e10adc3949ba59abbe56e057f20f883e]
            // $email=md5($result['email']); //md5(phptestly20@gmail.com)
            // // echo $email;
            // $pass=md5($result['matkhau']);//md5(e10adc3949ba59abbe56e057f20f883e)
            // // echo $pass;
            // //tạo đường link để gửi qua email
            // $link="<a href='http://localhost/index.php?action=forgetps&act=resetps&key=".$email."&reset=".$pass."'>Click To Reset password</a>";
            // kiểm tra mail đó có tồn tại
            if($result!=false)
            {
                // cấp mã code
                $code=random_int(1000,10000);
                // tạo đối tượng
                $item=array(
                    'code'=>$code,
                    'email'=>$getemail,
                );
                $_SESSION['email2'][]=$item;
                // tiến hành gửi mail
                $mail = new PHPMailer();
                $mail->CharSet =  "utf-8";
                $mail->IsSMTP();
                // enable SMTP authentication
                $mail->SMTPAuth = true;                  
                // GMAIL username to:
                // $mail->Username = "php22023@gmail.com";//
                $mail->Username = "nguyenlethanhhuy2003@gmail.com";//
                // GMAIL password
                // $mail->Password = "php22023ngoc";
                $mail->Password = "lthwxpkulycyvpzs";//Phplytest20@php
                $mail->SMTPSecure = "tls";  
                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port = "587";
                $mail->From='nguyenlethanhhuy2003@gmail.com';
                $mail->FromName='Huy';
                // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                $mail->AddAddress($getemail, 'reciever_name');
                $mail->Subject  =  'Reset Password';
                $mail->IsHTML(true);
                $mail->Body    = 'Cấp mã code lại '.$code.'';
                if($mail->Send())
                {
                    echo '<script> alert("Check Your Email and Click on the link sent to your email");</script>';
                    include './View/resetpw.php';
                }
                else
                {
                    echo '<script> alert("email lỗi");</script>';
                    include "./View/forgetpassword.php";
                }
            }
            else
            {
                echo '<script> alert("Email ko tồn tại");</script>';
                include "./View/forgetpassword.php";
            }
            
        }
        // cách thứ 2: tạo biến ngẫu nhiên
        // nhâpj gmail, kiểm tra gmail có tồn tại hay không
        // sesion là tạo đối tượng id và mail
        // $a=1234
        // items{ 'id':a,'mail': giá trị email người dùng nhập vào}
        //$_SESSION['reps']=items
        //$link=$a;
        break;
    case 'submit_new':
        if(isset($_POST['submit_password']))
        {
            // lấy code cấp
            $codeold=$_POST['password'];
            $flag=false;
            // kiểm tra code cấp có tồn tại trong $_SESSION ko
            foreach($_SESSION['email2'] as $key=>$item)
            {
                if($item['code']==$codeold)
                {
                    $flag=true;
                    $codenew=md5($codeold);
                    $emailold=$item['email'];
                    $ur=new User();
                    $ur->updateEmail($emailold,$codenew);
                    echo '<script> alert("Thay đổi mật khẩu thành công");</script>';
                    header('location: index.php?action=login');
                }
            }
            if($flag==false)
            {
                echo '<script> alert("Code Sai Rồi!");</script>';
                include "./View/resetpw.php";
            }
        }
        //  // nhân mật khẩu mới người dùng nhập
        //  if(isset($_POST['submit_password']))
        //  {
        //      $passnew=md5($_POST['password']);
        //      $emailold=$_POST['email'];
        //      $ur=new User();
        //      $ur->updateEmail($emailold,$passnew);
        //      echo '<script> alert("Thay đổi mật khẩu thành công");</script>';
        //  }
        //  include "View/login.php";
         break;
}
?>