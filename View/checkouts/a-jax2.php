<?php
    require_once('../database/dbhelper.php');
    $a_ajax2 = $_GET['a_ajax2'];
    $sql = "SELECT * FROM devvn_xaphuongthitran WHERE maqh='$a_ajax2'";
    $data = executeResult($sql);
    // echo '<select name="" id="">';
        echo '<option value="#">Chọn xã/phường</option>';
        foreach($data as $item => $key) {
            echo '<option value="'.$key['name'].'">'.$key['name'].'</option>';
        }
    // echo   '</select>';
?>