<?php
    require_once('../database/dbhelper.php');
    $category_id = $_GET['category'];
    $sql = "SELECT * FROM product_detailss WHERE category_id = $category_id and order by ";
?>