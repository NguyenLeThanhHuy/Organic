<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

if (isset($_GET['i'])) {
    $i = $_GET['i'];
}

// Tổng record muốn show
$num_per_page = 10;
// bắt đầu từ vị trí 
$start_from = ($page - 1) * $num_per_page;
?>
<title><?= $title ?></title>
<link rel="stylesheet" href="assets/css/category-main.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<div class="breadcrumb_bg">
    <div class="breadcrumb-box-img">
        <img src="./assets/img/bg_breadcrumb.png" alt="">
    </div>
    <div class="title-full">
        <div class="container">
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
            <p class="title-page"><?= $title ?></p>
        </div>
    </div>
</div>
<div class="category-main">
    <div class="grid wide">
        <div class="category-header">
            <h1><?= $title ?></h1>
            <div class="arrange">
                <div class="sort-cate">
                    <div class="sort-cate-left">
                        <h3>Sắp xếp theo:</h3>
                        <ul class="sort-cate-list">
                            <li class="btn-quick-sort sort-cate-item tag-li">
                                <span class="SearchA_Z"><i class="fa-solid fa-check"></i></span>
                                A → Z
                            </li>
                            <li class="btn-quick-sort sort-cate-item tag-li">
                                <span class="SearchZ_A"><i class="fa-solid fa-check"></i></span>
                                Z → A
                            </li>
                            <li class="btn-quick-sort sort-cate-item tag-li">
                                <span class="SearchMin_Max"><i class="fa-solid fa-check"></i></span>
                                Giá tăng dần
                            </li>
                            <li class="btn-quick-sort sort-cate-item tag-li">
                                <span class="SearchMax_Min"><i class="fa-solid fa-check"></i></span>
                                Giá giảm dần
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-tab content-tab-block">
            <div class="row showItem">
                <?php
                if ($category_id == 0) {
                    // Khởi tạo $product để use các methods trong product.php
                    $product = new product();
                    // Lấy ra tất cả product
                    $result = $product->getListProductPagination($num_per_page, $start_from);
                    // var_dump($result);
                    // Vì $result được trả về dưới dạng mảng nên cần dùng fetch để lặp qua
                    while ($set = $result->fetch()) {

                        echo '
                                       <div class="col l-3 c-6 ">
                                           <div class="content-tab-item">
                                               <div class="product-thumnail">
                                                   <a href="index.php?action=sanpham&slug=' . $set['slug'] . '">
                                                       <img src="' . $set['img'] . '" alt="">
                                                   </a>
                                               </div>
                                               <div class="product-info">
                                                   <div class="product-name">
                                                       <h3>' . $set['name'] . '</h3>
                                                   </div>
                                                   <div class="product-price">
                                                       <h3>' . $set['price'] . '</h3>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       ';
                    }
                } else {
                    $sql = "SELECT * FROM product_details WHERE category_id = '$category_id'";
                    $data = executeResult($sql);

                    foreach ($data as $item) {
                        echo '
                           <div class="col l-3 ">
                               <div class="content-tab-item">
                                   <div class="product-thumnail">
                                       <a href="index.php?action=sanpham&slug=' . $item['slug'] . '">
                                           <img src="' . $item['img'] . '" alt="">
                                       </a>
                                   </div>
                                   <div class="product-info">
                                       <div class="product-name">
                                           <h3>' . $item['name'] . '</h3>
                                       </div>
                                       <div class="product-price">
                                           <h3>' . $item['price'] . '</h3>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           ';
                    }
                }
                ?>
            </div>
            <div class='row showPagination'>
            
                
            <?php
            // }
            ?>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        // Function getUrl 
        var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                    }
                }
                return false;
            };

        $('.SearchA_Z').click(() => {
            
            
            var tech = getUrlParameter('i');
            $.get("View/layouts/Searcha_z.php",{category:tech},function(data) {
                $('.showItem').html(data);
            })
        })

        $('.SearchZ_A').click(() => {
            var tech = getUrlParameter('i');
            $.get("View/layouts/Searchz_a.php",{category:tech},function(data) {
                $('.showItem').html(data);
            })
        })

        $('.SearchMin_Max').click(() => {
            var tech = getUrlParameter('i');
            $.get("View/layouts/Searchmin_max.php",{category:tech},function(data) {
                $('.showItem').html(data);
            })
        })
        $('.SearchMax_Min').click(() => {
            var tech = getUrlParameter('i');
            $.get("View/layouts/Searchmax_min.php",{category:tech},function(data) {
                $('.showItem').html(data);
            })
        })
    })
</script>