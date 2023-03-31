<?php 
    function uploadimage() {
        $target_dir = 'assets/photos/';
        $target_file = $target_dir.basename($_FILES['image']['name']);
        $targetFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $isUpload = 1;
        if(isset($_POST['submit'])) {
            $check = getimagesize($_FILES['image']['tmp_name']);
            if($check==false) {
                $isUpload = 0;
                echo '<script>alert("Hình khong ton tai")</script>';
            }
        }
        if(file_exists($target_file)) {
            $isUpload = 0;
            echo '<script>alert("Hình da ton tai")</script>';
        }
        if($_FILES['image']['size'] > 500000) {
            $isUpload = 0;
            echo '<script>alert(" Kich thuoc toi da cua hinh la 500KB")</script>';
        }
        if($targetFileType != 'jpg' && $targetFileType != 'png' && $targetFileType != 'jepg' && $targetFileType != 'gif' ) {
            $isUpload = 0;
            echo '<script>alert(" Vui long chon hinh dung dinh dang")</script>';
        }
        if($isUpload == 1) {
            if(move)
        }
    }
?>