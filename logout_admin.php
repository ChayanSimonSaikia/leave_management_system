<?php   
   session_start();
   if (isset($_SESSION['email'])) {
       session_destroy();
       header('location: admin_login_main.php');
   }else{
    header('location: admin_login_main.php');
   }


?>