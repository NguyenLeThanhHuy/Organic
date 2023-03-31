<?php 
     if(session_id())
     {
          if(isset($_SESSION['admin'])) {
            echo '<script>window.location.href = "http://localhost:7000/ProjectPHP2/Organic/";</script>';
            unset($_SESSION['admin']);
          }
     }
     else
     {
          // session has NOT been started
          session_start();
          unset($_SESSION['admin']);
     }
    require "./View/trangchu/index.php";
?>