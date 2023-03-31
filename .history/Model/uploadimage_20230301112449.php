<?php 
    function uploadimage() {
        $target_dir = 'assets/photos/';
        $target_file = $target_dir.basename($_FILES['image']['name']);
        $targetFileType = pathinfo($target_file,PATHINFO)
    }
?>