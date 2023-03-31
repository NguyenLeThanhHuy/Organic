<?php
    // Nếu có $_POST
    if(!empty($_POST)) {
        // Nếu seestion có tồn tại
        if(isset($_SESSION['email'])) {
            // Lấy data của user
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM user WHERE email = '$email'";
            $data = executeResult($sql,true);
            // $user_id = $data['mahh'];
            $user_name = $data['fullname'];
            // $num là số lượng
            $num = $_POST['num'];
            $soluong = $_POST['soluong'];
            // $product-id là id của sản phẩm
            // Lấy ra thông tin của sản phẩm được mua
            $product_id = $_POST['btn-add-cart'];
            $sql = "SELECT * FROM product_details WHERE mahh = $product_id";
            $data = executeResult($sql,true);
            // Price product
            $price = $data['price'];
            $product_id = $data['mahh'];
            // Kiểm tra xem trước đó giỏ hàng của người này có gì hay chưa
            $sql = "SELECT product_id,num FROM cart WHERE product_id = $product_id AND user_name='$user_name'";
            $data = executeResult($sql,true);
            // Update
            // Trường hợp nếu như sản phẩm đã tồn tại (Lưu lại só lượng của lần trước)
            if($data != null) {
                $num_carted = $data['num'];
            }
            // Add cart
            // Nêu sản phẩm không tồn tại thì thêm vào giỏ hàng
            if($data == null) {
                $sql = "INSERT INTO cart (user_name,product_id,price,num,soluong) VALUES ('$user_name',$product_id,'$price',$soluong)";
                execute($sql);
            }else {
                // Update thêm số lượng sản phẩm
                $num_update = $num_carted + $num;
                $sql = "UPDATE cart SET num = '$num_update' WHERE product_id = $product_id AND user_name='$user_name'";
                execute($sql);
            }
            // Sau khi user bấm thêm vào giỏ hàng thì sẽ chuyển đến trang cart để thanh toán
            header("location: index.php?action=cart");
        } else {
            // Trường hơp user chưa login
            $num = $_POST['num'];
            // $product-id là id của sản phẩm
            // Lấy ra thông tin của sản phẩm được mua
            $product_id = $_POST['btn-add-cart'];
            $sql = "SELECT * FROM product_details WHERE mahh = $product_id";
            $data = executeResult($sql,true);
            // Price product
            $price = $data['price'];
           
            // Update
            // Trường hợp nếu như sản phẩm đã tồn tại (Lưu lại só lượng của lần trước)
            // Add cart
            // Nêu sản phẩm không tồn tại thì thêm vào giỏ hàng
            
                $sql = "INSERT INTO cart (user_name,product_id,price,num,soluong) VALUES ('Client',$product_id,'$price','$num',$soluong)";
                execute($sql);
            
            header("location: index.php?action=checkouts");
        }
        
    }
?>