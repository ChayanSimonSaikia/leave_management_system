<?php   
   session_start();
   if (isset($_SESSION['email'])) {
       session_destroy();
       header('location: HOD_login_main.php');
   }else{
    header('location: HOD_login_main.php');
   }


?>