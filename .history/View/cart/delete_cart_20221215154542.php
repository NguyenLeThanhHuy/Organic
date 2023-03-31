<?php
    if(isset($_GET['delete_cart'])) {
        // Mở sesstion
        session_start();
        $email = $_SESSION['email'];
        // lấy user
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $data = executeResult($sql,true);
        $user_name = $data['fullname'];
        $product_id = $_GET['delete_cart'];
        // Lấy id của cart
        $sql = "DELETE  FROM cart WHERE product_id = $product_id AND user_name = '$user_name'";
        execute($sql);
        header('Location: index.php?action=cart');
    }
?>