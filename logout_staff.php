<?php   
   session_start();
   if (isset($_SESSION['email'])) {
       session_destroy();
       header('location: staff_login_main.php');
   }else{
    header('location: staff_login_main.php');
   }


?>