<?php
    require_once('../database/dbhelper.php');
    $a_ajax1 = $_GET['ajax1'];
    $sql = "SELECT * FROM devvn_quanhuyen WHERE matp='$a_ajax1'";
    $data = executeResult($sql);
        echo '<option value="#">Chọn quận/huyện</option>';
        foreach($data as $item => $key) {
            echo '<option value="'.$key['maqh'].'">'.$key['name'].'</option>';
        }
?>