<?php 
    function uploadimage() {
        $target_dir = 'assets/photos/';
        $target_file = $target_dir.basename($_FILES['image']['name']);
        $targetFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(isset())
    }
?>