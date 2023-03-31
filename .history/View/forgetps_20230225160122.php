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
            // với địa chỉ email người dùng mới nhập vào( nhớ là địa chỉ email 
            //phải tồn tại trong database)
            // truy vấn lấy ra email, mật khẩu dựa trên email mới nhập vào
            $ur=new User();
            $result=$ur->getEmail($getemail);
            // lấy ra email và mật khẩu trả về từ database
            // $resuil[email: phptestly20@gmail.com,matkhau:e10adc3949ba59abbe56e057f20f883e]
            $email=md5($result['email']); //md5(phptestly20@gmail.com)
            // echo $email;
            $pass=md5($result['matkhau']);//md5(e10adc3949ba59abbe56e057f20f883e)
            // echo $pass;
            //tạo đường link để gửi qua email
            $link="<a href='http://localhost/index.php?action=forgetps&act=resetps&key=".$email."&reset=".$pass."'>Click To Reset password</a>";
            $mail = new PHPMailer();
            $mail->CharSet =  "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPAuth = true;                  
            // GMAIL username to:
            // $mail->Username = "php22023@gmail.com";//
            $mail->Username = "phplytest20@gmail.com";//
            // GMAIL password
            // $mail->Password = "php22023ngoc";
            $mail->Password = "xdryghruuiucmavr";//Phplytest20@php
            $mail->SMTPSecure = "tls";  
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // set the SMTP port for the GMAIL server
            $mail->Port = "587";
            $mail->From='phplytest20@gmail.com';
            $mail->FromName='Ly';
            // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
            $mail->AddAddress($getemail, 'reciever_name');
            $mail->Subject  =  'Reset Password';
            $mail->IsHTML(true);
            $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
            if($mail->Send())
            {
                echo "Check Your Email and Click on the link sent to your email";
            }
            else
            {
                echo "Mail Error - >".$mail->ErrorInfo;
            }
        }
        // cách thứ 2: tạo biến ngẫu nhiên
        // $a=1234
        //$_SESSION['reps']=$a
        //$link=$a;
        break;
    case 'resetps':
        include './View/resetpw.php';
        break;
    case 'submit_new':
         // nhân mật khẩu mới người dùng nhập
         if(isset($_POST['submit_password']))
         {
             $passnew=md5($_POST['password']);
             $emailold=$_POST['email'];
             $ur=new User();
             $ur->updateEmail($emailold,$passnew);
             echo '<script> alert("Thay đổi mật khẩu thành công");</script>';
         }
         include "View/login.php";
         break;
}
?>