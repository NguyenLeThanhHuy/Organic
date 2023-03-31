<?php
ob_start();
if (session_id() === '') {
    session_start();
}


// session_start();
// session_destroy();
require_once 'View/database/dbhelper.php';
require_once 'View/utils/convert_tv.php';
require_once 'View/utils/ulitity.php';
require_once 'View/layouts/Search_category.php';

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/grid.css">
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/header.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script>
    document.onscroll = function(e) {
        if (window.pageYOffset > 500) {
            document.querySelector('#backtop').style.bottom = '10px'
        } else {
            document.querySelector('#backtop').style.bottom = '-55px'
        }
    }
</script>