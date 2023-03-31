<?php

    $sql = "SELECT * FROM product_details Order by price desc";
    $data = executeResult($sql);
        foreach($data as $item) {
            echo '
            <div class="col l-3 c-6 ">
                <div class="content-tab-item">
                    <div class="product-thumnail">
                        <a href="index.php?action=sanpham&slug=' . $s['slug'] . '">
                            <img src="' . $s['img'] . '" alt="">
                        </a>
                    </div>
                    <div class="product-info">
                        <div class="product-name">
                            <h3>' . $s['name'] . '</h3>
                        </div>
                        <div class="product-price">
                            <h3>' . $s['price'] . '</h3>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }
