<?php session_start();
  $conn = mysqli_connect("localhost", "root", "", "leave_management");
  
  

  if(!isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOD Login</title>

    <link rel="stylesheet" href="css/HOD_login.css">
    <link
      href="https://fonts.googleapis.com/css?family=B612"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Varela"
      rel="stylesheet"
    />
</head>
<body>
<?php include('nav_for_login.php')?>
    <div class="loginDiv">
        <p>HOD</p>
        <p>Login</p>
        <form action="HOD_login.php" method="post">
            <input type="email" name="email" class="email" placeholder="Enter Your Email Address" required><br><br>
            <input type="password" name="pass" class="pass" placeholder="Enter Your Password" required><br><br><br>
            <button class="button"">Log In</button>
        </form>
    </div>
    
</body>
</html>
<?php }else{

header('location: HOD_dash.php');
}


?>