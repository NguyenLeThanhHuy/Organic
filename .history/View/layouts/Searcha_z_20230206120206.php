<?php
    require_once('../database/dbhelper.php');
    $category_id = $_GET['category'];
    $sql = "SELECT * FROM product_details WHERE category_id = $category_id and order by name";
    $data = executeResult($sql);
    if($category_id == 0) {
        foreach($data as $item) {
            echo  '
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
    }
?>