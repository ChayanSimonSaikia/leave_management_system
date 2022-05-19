<?php session_start();
  

  if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Request Leave</title>
    <link rel="stylesheet" href="css/request_leave_selection.css?version=51" />
    <link
      href="https://fonts.googleapis.com/css?family=B612"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Varela"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/hover.css">
  </head>
  <body>
    <?php include('nav_bar_staff.php');?>
    <div class="grid_body">
      <div class="wrapper">
        <div class="casual" onclick="location.href='casual_leave_staff.php'">
          <p>Casual Leave</p>
        </div>
        <div class="maternity" onclick="location.href='maternity_leave_staff.php'">
          <p>Maternity Leave</p>
        </div>
        <div class="child" onclick="location.href='childcare_leave_staff.php'">
          <p>Childcare Leave</p>
        </div>
      </div>
    </div>
  </body>
</html>

<?php }else{

header('location: staff_login_main.php');
}


?>