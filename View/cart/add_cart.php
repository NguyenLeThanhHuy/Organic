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
            // $product-id là id của sản phẩm
            // Lấy ra thông tin của sản phẩm được mua
            $product_id = $_POST['btn-add-cart'];
            $sql = "SELECT * FROM product_details WHERE mahh = $product_id";
            $data = executeResult($sql,true);
            // Price product
            $price = $data['price'];
            $slt = $data['soluongton'];
            $product_id = $data['mahh'];
            $checkInStock = $slt - $num;
            // Kiểm tra xem trước đó giỏ hàng của người này có gì hay chưa
            $sql = "SELECT product_id,num FROM cart WHERE product_id = $product_id AND user_name='$user_name'";
          
            $data2 = executeResult($sql,true);
            // Update
            // Trường hợp nếu như sản phẩm đã tồn tại (Lưu lại só lượng của lần trước)
            if($data2 != null) {
                $num_carted = $data2['num'];
            }
            // Add cart
            // Nêu sản phẩm không tồn tại thì thêm vào giỏ hàng
            if($data2 == null) {
                if($checkInStock < 0) {
                  echo '<script>alert("Sản phẩm hiện tại hết hàng, vui lòng thông cảm chọn sản phẩm khác")</script>';
                //   header("location: index.php?action=allsanpham&i=0");
                echo '<script type="text/javascript">
                window.location.href = "http://localhost:7000/ProjectPHP2/Organic/index.php?action=allsanpham&i=0";
                </script>';
                }else {
                    // Update soluongton
                    $sqlSlt = "UPDATE product_details SET soluongton = $checkInStock WHERE mahh = $product_id";
                    execute($sqlSlt);
                    // var_dump($sqlSlt);
                    // exit();
                    //add vào giỏ hàng
                    $sql = "INSERT INTO cart (user_name,product_id,price,num) VALUES ('$user_name',$product_id,'$price','$num')";
                    execute($sql);
                }
            }else {
                if($checkInStock < 0) {
                    echo '<script>alert("Sản phẩm hiện tại hết hàng, vui lòng thông cảm chọn sản phẩm khác")</script>';
                    // echo '<meta http-equiv=refresh content="0;url=./index.php?action=allsanpham&i=0';
                    echo '<script type="text/javascript">
                    window.location.href = "http://localhost:7000/ProjectPHP2/Organic/index.php?action=allsanpham&i=0";
                    </script>';
                    // header("location: index.php?action=allsanpham&i=0");
                  }else{
                    // Update soluongton
                    $sqlSlt = "UPDATE product_details SET soluongton = $checkInStock WHERE mahh = $product_id";
                    execute($sqlSlt);
            
            
                    // Update thêm số lượng sản phẩm
                $num_update = $num_carted + $num;
                $sql = "UPDATE cart SET num = '$num_update' WHERE product_id = $product_id AND user_name='$user_name'";
                execute($sql);
                  }
                
            }
            // Sau khi user bấm thêm vào giỏ hàng thì sẽ chuyển đến trang cart để thanh toán
            // header("location: index.php?action=cart");
        } else {
            // Trường hơp user chưa login
            $num = $_POST['num'];
            // $product-id là id của sản phẩm
            // Lấy ra thông tin của sản phẩm được mua
            $product_id = $_POST['btn-add-cart'];
            $sql = "SELECT * FROM product_details WHERE mahh = $product_id";
            $data3 = executeResult($sql,true);
            // Price product
            
            $price = $data3['price'];
            $slt = $data3['soluongton'];
            $checkInStock2 = $slt - $num;
            // var_dump($checkInStock2);
            // exit();
            // Update
            // Trường hợp nếu như sản phẩm đã tồn tại (Lưu lại só lượng của lần trước)
            // Add cart
            // Nêu sản phẩm không tồn tại thì thêm vào giỏ hàng
            if($checkInStock2 < 0) {
                echo '<script>alert("Sản phẩm hiện tại hết hàng, vui lòng thông cảm chọn sản phẩm khác")</script>';
                // echo '<meta http-equiv=refresh content="0;url=./index.php?action=allsanpham&i=0';
                echo '<script type="text/javascript">
                window.location.href = "http://localhost:7000/ProjectPHP2/Organic/index.php?action=allsanpham&i=0";
                </script>';
                // exit();
              }
              else {
                // Update soluongton
                $sqlSlt2 = "UPDATE product_details SET soluongton = $checkInStock2 WHERE mahh = $product_id";
                execute($sqlSlt2);
                  $sql = "INSERT INTO cart (user_name,product_id,price,num) VALUES ('Client',$product_id,'$price','$num')";
                  execute($sql);
            //       var_dump($sql);
            // exit();
              header("location: index.php?action=checkouts");
              }
            
        }
        
    }
