<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
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
            <div class="row" id="showproduct">
                <?php
                if ($category_id == 0) {
                    // Khởi tạo $product để use các methods trong product.php
                    $product = new productdetails();
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

            <div class="row" id='showproducts'>

            </div>
            <?php
            if ($category_id == 0) {
                echo "<div class='row'>
                    <div class='col l-12 c-12'>
                    <ul class='pagination-list'>
                    " ?>
                <?php
                // Query all item để lấy total_record
                $sql = 'select * from product_details';
                // //connect
                $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
                $data = mysqli_query($conn, $sql);
                // lấy tổng record
                $total_record = mysqli_num_rows($data);

                // chia trang
                $total_record = ceil($total_record / $num_per_page);

                // Show max 3 pages
                if ($total_record <= 3) {
                    // Prev
                    if ($page > 1) {
                        echo "<li class='pagination-list-item-prev'>
                                    <a href='index.php?action=allsanpham&page=" . ($page - 1) . "' class='btn btn-primary'>Prev</a>
                                    </li>";
                    }

                    for ($i = 1; $i <= $total_record; $i++) {
                        // Nếu
                        if ($page == $i) {
                            echo "<li class='pageNumber pagination-list-item' >
                                    <a href='index.php?action=allsanpham&page=$i' data-color='black' class='btn btn-primary color_active'> $i</a>
                                    </li>";
                        } else
                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=$i' class='btn btn-primary'> $i</a>
                                    </li>";
                    }

                    // Next
                    if ($page >= 1 && $page < $total_record) {
                        echo "<li class='pagination-list-item-next'>
                                    <a href='index.php?action=allsanpham&page=" . ($page + 1) . "' class='btn btn-primary'>Next</a>
                                    </li>";
                    }
                } else {
                    // Prev
                    if ($page > 1) {
                        echo "<li class='pagination-list-item-prev'>
                                    <a href='index.php?action=allsanpham&page=" . ($page - 1) . "' class='btn btn-primary'>Prev</a>
                                    </li>";
                    }

                    for ($i = $page;; $i++) {
                        // TH: Trang cuối
                        if ($i == $total_record) {
                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=" . ($i - 2) . "' class='btn btn-primary'> " . ($i - 2) . "</a>
                                    </li>";
                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=" . ($i - 1) . "' class='btn btn-primary'> " . ($i - 1) . "</a>
                                    </li>";

                            echo "<li class='pageNumber pagination-list-item' >
                                    <a href='index.php?action=allsanpham&page=$i' data-color='black' class='btn btn-primary color_active'> $i</a>
                                    </li>";
                            // TH: Khác trang đầu tiên
                        } else if ($i != 1) {
                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=" . ($i - 1) . "' class='btn btn-primary'> " . ($i - 1) . "</a>
                                    </li>";

                            echo "<li class='pageNumber pagination-list-item' >
                                    <a href='index.php?action=allsanpham&page=$i' data-color='black' class='btn btn-primary color_active'> $i</a>
                                    </li>";

                            echo "<li class='pageNumber pagination-list-item'>
                                    <a href='index.php?action=allsanpham&page=" . ($i + 1) . "' class='btn btn-primary'> " . ($i + 1) . "</a>
                                    </li>";
                            // TH: Trang đầu
                        } else {
                            echo "<li class='pageNumber pagination-list-item' >
                                            <a href='index.php?action=allsanpham&page=$i' data-color='black' class='btn btn-primary color_active'> $i</a>
                                            </li>";

                            echo "<li class='pageNumber pagination-list-item'>
                                            <a href='index.php?action=allsanpham&page=" . ($i + 1) . "' class='btn btn-primary'> " . ($i + 1) . "</a>
                                            </li>";

                            echo "<li class='pageNumber pagination-list-item'>
                                            <a href='index.php?action=allsanpham&page=" . ($i + 2) . "' class='btn btn-primary'> " . ($i + 2) . "</a>
                                            </li>";
                        }
                        // Thoát khỏi vòng lặp
                        break;
                    }

                    // Next
                    if ($page >= 1 && $page < $total_record) {
                        echo "<li class='pagination-list-item-next'>
                                    <a href='index.php?action=allsanpham&page=" . ($page + 1) . "' class='btn btn-primary'>Next</a>
                                    </li>";
                    }
                }

                ?>
            <?php
                "</div>";
            }
            ?>

        </div>
    </div>
</div>
<script>
    $(document).ready(() => {
        $.getJSON('View/allsanpham/index.php', function(data) {
            console.log(data);
        });
    })
</script>