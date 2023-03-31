<?php
    $title = "Đặt hàng";
    // Lấy data khi hoàn tất đơn hàng
    if(!empty($_POST)) {
        if(isset($_SESSION['email'])) {
        $fullname_order = $_POST['name'];
        $phone_number = $_POST['phone'];
        $email = $_POST['email'];
        $matinh_tp =  $_POST['matp'];
        $maquan_huyen = $_POST['maqh'];
        if($matinh_tp != "#") {
            $sql = "SELECT name FROM devvn_tinhthanhpho WHERE matp='$matinh_tp'";
            $data = executeResult($sql,true);
            $tinh_tp = $data['name'];
        }   
        if($maquan_huyen != "#") {
            $sql = "SELECT name FROM devvn_quanhuyen WHERE maqh='$maquan_huyen'";
            $data = executeResult($sql,true);
            $quan_huyen = $data['name'];
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $xa_phuong = $_POST['maphuongxa'];
        $address = $xa_phuong.','.$quan_huyen.','.$tinh_tp;
        $created_at = date('Y-m-d h:m:s');
        // Query đơn hàng
        // user_name ở header
        $sql = "SELECT product_id,num FROM cart WHERE user_name = '$user_name'";
        $data = executeResult($sql);
        // Lặp qua từng đơn hàng
        foreach($data as $item) {
            $product_id = $item['product_id'];
            $num = $item['num'];
            if($address != null) {
                $sql = "INSERT INTO  hoadon (user_name,user_name1,phone_number,email,address,created_at,product_id,num,status) VALUES 
                ('$fullname_order','$user_name','$phone_number','$email','$address','$created_at',$product_id,'$num',0)";
                execute($sql);
                
                header("Location: index.php?action=success");
            } else {
                echo 'VUI LÒNG ĐIỀN ĐẦY ĐỦ THÔNG TIN';
            }
        }
        }
        else {
            $fullname_order = $_POST['name'];
            $phone_number = $_POST['phone'];
            $email = $_POST['email'];
            $matinh_tp =  $_POST['matp'];
            $maquan_huyen = $_POST['maqh'];
            if($matinh_tp != "#") {
                $sql = "SELECT name FROM devvn_tinhthanhpho WHERE matp='$matinh_tp'";
                $data = executeResult($sql,true);
                $tinh_tp = $data['name'];
            }   
            if($maquan_huyen != "#") {
                $sql = "SELECT name FROM devvn_quanhuyen WHERE maqh='$maquan_huyen'";
                $data = executeResult($sql,true);
                $quan_huyen = $data['name'];
            }
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $xa_phuong = $_POST['maphuongxa'];
            $address = $xa_phuong.','.$quan_huyen.','.$tinh_tp;
            $created_at = date('Y-m-d h:m:s');
            // Query đơn hàng
            // user_name ở header
            $sql = "SELECT product_id,num FROM cart WHERE user_name = 'Client'";
            $data = executeResult($sql);
            // Lặp qua từng đơn hàng
            foreach($data as $item) {
                $product_id = $item['product_id'];
                $num = $item['num'];
                if($address != null) {
                    $sql = "INSERT INTO  hoadon (user_name,user_name1,phone_number,email,address,created_at,product_id,num,status) VALUES 
                    ('$fullname_order','$fullname_order','$phone_number','$email','$address','$created_at',$product_id,'$num',0)";
                    execute($sql);
                    $sql = "Update cart set user_name = '$fullname_order' where user_name = 'Client'";
                    execute($sql);

                    $_SESSION['user_tam'] = $fullname_order;
                    header("Location: index.php?action=success");
                } else {
                    echo 'VUI LÒNG ĐIỀN ĐẦY ĐỦ THÔNG TIN';
                }
            }
        }
    }
?>
<title><?= $title ?></title>
<link rel="stylesheet" href="assets/css/checkouts.css">
<link rel="stylesheet" href="assets/css/checkouts_product.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<style>
    .phuong-thuc-pay-items input {
    margin-top: 5px;
    }
    .phuong-thuc-pay-items span {
    font-size: 18px;
    margin-left: 10px;
}
</style>
<div class="breadcrumb_bg">
    <div class="breadcrumb-box-img">
        <img src="assets/img/bg_breadcrumb.png" alt="">
    </div>
    <div class="title-full">
        <div class="container">
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
            <p class="title-page">Đặt hàng - Oars Organic</p>
        </div>
    </div>
</div>
<div class="checkouts">
    <div class="grid wide">
        <div class="row">
            <div class="col l-7 c-12">
                <div class="infor-order">
                    <?php
                    
                    ?>
                </div>
            </div>
            <?php              
                 include_once('View/layouts/checkout_product.php');        
            ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#matp').change(function() {
            var a = $(this).val()
            $.get("View/checkouts/a-jax1.php",{ajax1:a},function(data) {
                $("#maqh").html(data);
                $('#maqh').change(function() {
                var b = $(this).val()
                $.get("View/checkouts/a-jax2.php",{a_ajax2:b},function(data) {
                    $("#phuongxa").html(data);
                })
        })
            })
        })
    })
</script>
