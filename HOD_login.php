<?php
  session_start();
  
  $conn = mysqli_connect("localhost", "root", "", "leave_management");

  if (!$conn) {
      die("Connection failed");
  }
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  

  $sql = "SELECT * FROM `staff` WHERE `email` ='$email' AND `pass` ='$pass' AND `position` ='Hod'";
  $result = mysqli_query($conn, $sql);

  if ($row = mysqli_fetch_assoc($result)) {
      $_SESSION['email']= $email;
      $_SESSION['pass']= $pass;
      header('Location: HOD_dash.php');
  } else {
      echo "<script>alert('Your email or password is incorrect!');window.location.href = 'http://localhost/leave_management_system/HOD_login_main.php';</script>";
  }
