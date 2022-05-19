<?php   
  
     include('conn.php');
     
     $profile_select= "SELECT * FROM `staff` WHERE `email` = `$ses_email`";
     $profile_run = mysqli_query($con, $profile_select);
     $profile_name = mysqli_fetch_assoc($profile_run);
     







?>