<?php

    $a_ajax1 = $_GET['a_ajax1'];
    $sql = "SELECT * FROM devvn_quanhuyen WHERE matp='0'";
    $data = executeResult($sql);
        echo '<option value="#">Chọn quận/huyện</option>';
        foreach($data as $item => $key) {
            echo '<option value="'.$key['maqh'].'">'.$key['name'].'</option>';
        }
?>