<?php
// Lấy ra các methods của chi tiết sản phẩm
require 'Model/productdetails.php';
// Thêm sản phẩm vào giỏ hàng
require 'View/cart/add_cart.php';

// Dùng slug để lấy ra sản phẩm chi tiết
if (isset($_GET["slug"])) {
    $slug = $_GET["slug"];
    $productdetails = new productdetails();
    // Method lấy ra sản phẩm chi tiết từ slug
    $result = $productdetails->getListProductDetails($slug);
    while ($set = $result->fetch()) :
        $title = $set['name'];

?>
        <title><?= $title ?></title>
        <link rel="stylesheet" href="assets/css/chitietsanpham.css">
        <link rel="stylesheet" href="assets/css/main.css">
        <div class="breadcrumb_bg">
            <div class="breadcrumb-box-img">
                <img src="assets/img/bg_breadcrumb.png" alt="">
            </div>
            <div class="title-full">
                <div class="container">
                    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">

                    <p class="title-page"><?php echo $set['name'] ?></p>
                </div>
            </div>
        </div>



        <div class="grid wide">
            <div class="chitietsanpham">
                <div class="chitiet-header">
                    <div class="row">
                        <div class="col l-6 c-12">
                            <?php

                            // $x = $dataProduct['product_type'];
                            echo '<div class="chitiet-big-img">
                                <img src="' . $set['img'] . '" alt="" style="object-fit: cover">
                            </div>';
                            ?>
                            <div class="chitiet-small-img">
                                <?php
                                echo ' <div class="chitiet-small-box-img" style="height: 75px">
                                    <img src="' . $set['img'] . '" alt="" >
                                 </div>';
                                 // Method lấy ra hình ảnh mô tả
                                $result2 = $productdetails->getListImgDesProductDetails($set['mahh']);
                                while ($set2 = $result2->fetch()) :
                                    echo '<div class="chitiet-small-box-img " style="height: 75px">
                                            <img src="' . $set2['img_desct'] . '" alt="" >
                                        </div>';
                                endwhile;
                                ?>
                            </div>
                        </div>
                        <div class="col l-6 c-12">
                            <div class="chitiet-description">
                                <div class="type-product">
                                    <a href="" class="tag-a"><span style="text-transform: uppercase;"><?php echo $set['type'] ?></span></a>
                                </div>
                                <div class="group-status">
                                    <span class="frist-status">
                                        Thương hiệu: <span class="status-name">Vinmart</span>
                                    </span>
                                    <span class="frist-status status-2">
                                        <span class="line_tt hidden-sm" style="margin-right: 10px;">|</span>
                                        Tình trạng: <span class="status-name">Còn hàng</span>
                                    </span>
                                </div>
                                <div class="chitiet-des-name">
                                    <span><?php echo $set['name'] ?></span>
                                </div>
                                <div class="chitiet-des-price">
                                    <span><?php echo $set['price'] ?><sup>đ</sup></span>
                                </div>
                                <div class="product-description">
                                    <span>Thông tin sản phẩm đang được cập nhật</span>
                                </div>
                                <form method="post" class="quantity-product">
                                    <div class="box-quantity-product">
                                        
                                    </div>
                                    <div class="box-quantity-product">
                                        <div class="so-luong">
                                            <h1>Số lượng (KG): </h1>
                                        </div>
                                        <input type="button" value="-" class="tru">
                                        <input type="number" name="num" id="" class="value-quantity" value="1">
                                        <input type="button" value="+" class="cong">
                                    </div>
                                    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
                                    <?php
                                    if(isset($_SESSION['email'])) {
                                        $Url_cart = 'cart/cart_home.php?add_to_cart='.$set['mahh'];
                                    }else {
                                        $Url_cart = 'authen/login';
                                    }
                                    // $Url_cart check xem user đã login chưa
                                    echo '<button onclick=alertChitiet() data-title="'.$Url_cart.'" type="submit"  name="btn-add-cart" value="'.$set['mahh'].'" class="chitiet-add-cart ">
                                    <h3>Thêm vào giỏ hàng</h3>
                                </button>';
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-product" style="margin-bottom: 30px;">
                    <img src="assets/img/bg_pro.jpg" xriginal="" alt="">
                    <h1>OARS</h1>
                    <h3>Thực phẩm an toàn 100%</h3>
                </div>
                <div class="chitiet-body">
                    <div class="chitiet-body-header">
                        <div class="chitiet-body-title">
                            <span class="chitiet-title-mota chitiet-body-active" data-title="#chitiet-mota">
                                Mô tả
                            </span>
                            <span class="chitiet-title-rate" data-title="#chitiet-rate">ĐÁNH GIÁ <p class="quantity-rate">(0)</p></span>
                        </div>
                        <div class="chitiet-mota chitiet-active" id="chitiet-mota">
                            <div class="chitiet-mota-text"><?php echo $set['description'] ?></div>
                        </div>
                        <div class="chitiet-rate" id="chitiet-rate">
                            <span>Tổng Bình Luận: </span>
                           <?php 
                            $user = new user();
                            $data = $user->HienThicomment
                                    
                           ?>
                        </div>
                    </div>
                </div>


                <div class="chitiet-foot">
                    <div class="chitiet-foot-title">
                        <span>SẢN PHẨM TƯƠNG TỰ</span>
                    </div>
                    <div class="grid wide product-selling-main">
                        <div class="row">
                            <?php
                            $result3 = $productdetails->getListProductRelate($set['mahh'], $set['category_id']);
                            while ($set3 = $result3->fetch()) :
                                echo '
                                <div class="col l-3 c-6">
                                    <div class="content-tab-item">
                                        <div class="product-thumnail">
                                            <a href="index.php?action=sanpham&slug=' . $set3['slug'] . '">
                                                <img src="' . $set3['img'] . '" alt="">
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <div class="product-name">
                                                <h3>' . $set3['name'] . '</h3>
                                            </div>
                                            <div class="product-price">
                                                <h3>' . $set3['price'] . '</h3>
                                            </div>
                                        </div>
                                    
                            ';
                            ?>
                        </div>
                    </div>
                <?php
                            endwhile;
                ?>
                </div>
            </div>
        </div>

<?php
    endwhile;
};
?>

<script src="assets/js/chitiet.js" type="text/javascript"></script>
<script>
    // function này dùng để kiểm tra xem user đa login hay chưa
    // nếu như attr tìm thấy link_cart thì sẽ là đăng nhập rồi (Trả về khác -1)
        function alertChitiet() {
            const link_cart = 'cart/cart_home.php'
            const a = document.querySelector('.chitiet-add-cart')
            const attr = a.getAttribute('data-title')
            if (attr.indexOf(link_cart) !== -1) {
                return;
            } else {
                // alert('Bạn hãy đăng nhập để thêm sản phẩm vào giỏ hàng của mình!!!')
            }
        }
    </script>