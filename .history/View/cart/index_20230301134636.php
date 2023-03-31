<?php
    $title = 'Giỏ hàng';
    // Import để delete product
    include 'delete_cart.php';
?>

<title><?=$title?></title>
<link rel="stylesheet" href="assets/css/cart.css">
<div class="breadcrumb_bg">
    <div class="breadcrumb-box-img">
        <img src="./assets/img/bg_breadcrumb.png" alt="">
    </div>
    <div class="title-full">
        <div class="container">
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
            <p class="title-page">Giỏ hàng của bạn - Oars Organic</p>
        </div>
    </div>
</div>
<div class="cart">
    <div class="grid wide">
        <div class="cart-title">
            <?php
            // cart_List bên header: dùng để hiện số sản phẩm trong giỏ
                if(isset($cart_List)) {
                    $num = count($cart_List);
                    echo "<h2>Giỏ hàng của bạn ($num sản phẩm)</h2>";
                }else {
                    echo "<h2>Giỏ hàng của bạn (0 sản phẩm)</h2>";
                }
            ?>
            
        </div>
        <form action="index.php?action=cart" method="post">
            <div class="cart-main">
                <?php
                // tổng tiền , đặt bên ngoài để làm biến global
                    $total_money_main = 0;
                    if(isset($cart_List)) {
                        // Lặp qua từng đơn hàng 
                        foreach($cart_List as $item) {
                            // Update num = btn submit
                            if(!empty($_POST)) {
                                // lấy id của product
                                $a = $item['product_id'];
                                // Lấy num được gửi từ form
                                $num_update = $_POST[$a];
                                // echo $a;
                                // echo $num_update;
                                $sql = "UPDATE cart SET num = '$num_update' WHERE product_id='$a' AND user_name='$user_name'";
                                execute($sql);
                                header('Location: index.php?action=cart');
                            }
                            $money_detail = 0;
                            // lấy id sản phẩm
                            $product_id = $item['product_id'];
                            $sql = "SELECT * FROM product_details WHERE mahh = $product_id";
                            $data = executeResult($sql,true);
                            // lấy giá
                            $price = intval(preg_replace('/[^\d.]/', '', $item['price']));
                            // tổng cua sản phẩm
                            $money_detail = ($item['num'] * $price) * 1000;
                            // tổng của tất cả sản phẩm
                            $total_money_main = $total_money_main + $money_detail;
                            echo '
                            
                                <div class="cart-item">
                                    <div class="cart-item-left">
                                        <div class="cart-img">
                                            <img src="'.$data['img'].'" alt="">
                                        </div>
                                        <div class="cart-name-price">
                                            <div class="cart-name">
                                                <span>'.$data['name'].'</span>
                                            </div>
                                            <div class="cart-price" style="margin-top:10px;">
                                                <h3>'.$item['price'].'đ</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item-right">
                                        <div class="quantity-product">
                                            <div class="box-quantity-product">
                                                <input type="button" value="-" class="tru">
                                                <input type="number" name="'.$item['product_id'].'" id="" class="value-quantity" value="'.$item['num'].'">
                                                <input type="button" value="+" class="cong">
                                            </div>
                                        </div>
                                        <div class="total-item">
                                            <div class="total-title" style="text-align:end;">
                                                <span>Tổng tiền:</span>
                                            </div>
                                            <div class="total-item-main">
                                                <h3 style="text-align:end;">'.number_format($money_detail).'đ</h3>
                                            </div>
                                            <div class="cart-item-delete">
                                                <a href="index.php?action=cart&delete_cart='.$item['product_id'].'" class="tag-a">
                                                    <i class="fa-solid fa-trash"></i>
                                                    Xóa
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            ';
                        }
                    }
                ?>
                <div class="cart-update">
                    <button type="submit">Cập nhật</button>
                </div>
                
                <div class="cart-footer-box">
                    <div class="cart-footer">
                        <div class="total-main">
                            <span>Thành tiền: </span>
                            <h1><?=number_format($total_money_main)?>đ</h1>
                        </div>
                        <div class="cart-footer-main">
                            <div class="continue-buy">
                                <a href="index.php?action=allsanpham" class="tag-a">
                                    Tiếp tục mua hàng
                                </a>
                            </div>
                            <div class="dat-hang button_gradient">
                                <a href="index.php?action=checkouts" class="tag-a">
                                    Đặt hàng ngay
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="cart-empty-main">
    <div class="grid wide">
        <div class="box-img-cart-empty">
            <img src="./assets/img/cart-empty.png" alt="">
        </div>
        <div class="cart-empty-main-title">
            <span>GIỎ HÀNG TRỐNG</span>
        </div>
        <a href="index.php?action=allsanpham" class="tag-a">
            <div class="continue_view" style="width:200px;margin-top:40px; margin-left:15px;">
                <i class="fas fa-long-arrow-alt-left"></i>
                <span>QUAY LẠI CỬA HÀNG</span>
            </div>
        </a>
    </div>
</div>

<script>
    const $1 = document.querySelector.bind(document)
    const $2 = document.querySelectorAll.bind(document)
    for(let i=0;i<$2('.cong').length;i++) {
        let a1 = $2('.value-quantity')[i].value;
        a1 = parseInt(a1)
        $2('.cong')[i].onclick = function() {
            a1= a1+1
            $2('.value-quantity')[i].value = a1
            $1('.cart-update button').style.backgroundColor  = '#b9b9b9'
        }
        $2('.tru')[i].onclick = function() {
            if(a1<2){
                return 
            }else{
                a1= a1-1
                $2('.value-quantity')[i].value = a1
                $1('.cart-update button').style.backgroundColor  = '#b9b9b9'
            }
        }
    }

    // hide . show cart empty
    const cart_list = $2('.cart-item')
    if(cart_list.length < 1) {
        $1('.cart').style.display = 'none'
        $1('.cart-empty-main').style.display = 'block'
    }
</script>

