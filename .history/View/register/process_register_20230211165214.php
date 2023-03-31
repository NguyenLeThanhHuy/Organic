<?php 
    // Import để lấy methods
    require 'Model/user.php';
?>

<?php 
$fullname = $email = $msg = '';
if(!empty($_POST)) {
    // Lấy data từ post
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    // Mã hóa password
    $pwd = password_hash($pwd,PASSWORD_DEFAULT);
    // Nếu như cả 3 ô đều có data và hợp lệ
    if(empty($fullname) || empty($email) || empty($pwd) || strlen($pwd) <6) {
    } else {
        $user = new user();
        $userExist = $user->checkEmail($email);
        // Tồn tại email
        if($userExist != null) {
            $msg = '*Email đã được đăng ký,vui lòng đăng ký lại';
        } else {
            $sql = "INSERT INTO user (fullname,email,password,role_id) VALUES ('$fullname','$email','$pwd',2)";
            $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
            // mysqli_set_charset($conn,'utf-8');
            // mysqli_set_charset('utf8');
            // Câu truy vấn
            mysqli_query($conn, $sql);
            // Đóng kết nối
            mysqli_close($conn);
            $_SESSION['email'] = $email;
            if(isset($_SESSION['user_tam'])) {
                unset($_SESSION['user_tam']);
            }
            header('Location: index.php');
            die();
        }
    }
}
