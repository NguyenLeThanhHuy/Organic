<?php

    $sql = "SELECT * FROM product_details WHERE matp='$a_ajax1'";
    $data = executeResult($sql);
        echo '<option value="#">Chọn quận/huyện</option>';
        foreach($data as $item => $key) {
            echo '<option value="'.$key['maqh'].'">'.$key['name'].'</option>';
        }
?>