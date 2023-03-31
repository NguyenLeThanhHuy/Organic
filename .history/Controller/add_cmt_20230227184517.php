<?php 
    if(isset($_GET['name'])) {
        $user = new user();
        if(!isset($_SESSION['email'])) {
            echo '<script>alert("Vui lòng đăng nhập để bình luận")</script>';
            header("location: index.php?action=login");
        }
        
    }
?>