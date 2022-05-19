<?php session_start();
  $conn = mysqli_connect("localhost", "root", "", "leave_management");

  if(!$conn) {
    die("Connection failed");
  }

  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM `admin` WHERE `admin_email`='$email' AND `admin_pass`='$pass'";
  $result = mysqli_query($conn, $sql);

  if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['email']= $email;
    $_SESSION['pass']= $pass;
    header('Location: admin_dash.php');

  } else {
    echo "<script>alert('Your email or password is incorrect!');window.location.href = 'http://localhost/leave_management_system/admin_login_main.php';</script>";
    
  }

?>