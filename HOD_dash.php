<?php session_start();
  $conn = mysqli_connect("localhost", "root", "", "leave_management");
  
  $email = $_SESSION['email'];
  $sql = "SELECT * FROM `staff` WHERE `email`='$email'";
  $result = mysqli_query($conn, $sql);

  if(isset($email)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link
    href="https://fonts.googleapis.com/css?family=B612"
    rel="stylesheet"
  />
  <link
    href="https://fonts.googleapis.com/css?family=Varela"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="css/hover.css">
  <link rel="stylesheet" href="css/HOD_dash.css?version=51">
  
</head>
<body>
    <?php include('nav_bar_HOD.php')?>
    <div class="dash_body">
  <div class="dash">
       <div class="info">
        <p>Your Info</p>
        </div><br><br><br>
       <table>

       <?php
         if($result == TRUE){
          $data = mysqli_fetch_assoc($result);
        ?>

        <tr>
        <th>Name</th><td>:</td><td><?php echo $data['name']?></td>
        </tr>
        <tr>
        <th>Department</th><td>:</td><td><?php echo $data['dept']?></td>
        </tr>
        <tr>
        <th>Email</th><td>:</td><td><?php echo $data['email']?></td>
        </tr>
        <tr>
        <th>Designation</th><td>:</td><td><?php echo $data['designation']?></td>
        </tr>
        <tr>
        <th>Phone No.</th><td>:</td><td><?php echo $data['phone']?></td>
        </tr>
        <tr>
        <th>Date Of Birth</th><td>:</td><td><?php echo $data['dob']?></td>
        </tr>
        <tr>
        <th>Address</th><td>:</td><td><?php echo $data['address']?></td>
        </tr>
        <tr>
        <th>Casual Leave Remaining</th><td>:</td><td><?php echo $data['casual_rem']?></td>
        </tr>
        <tr>
        <th>Maternity Leave Remaining</th><td>:</td><td><?php echo $data['maternity_rem']?></td>
        </tr>
        <tr>
        <th>Child Care Leave Remaining</th><td>:</td><td><?php echo $data['child_rem']?></td>
        </tr>
        <tr>
        <th>Career Leave Remaining</th><td>:</td><td><?php echo $data['maxleave_rem']?></td>
        </tr>

          <?php
         }
        else{
     echo "Somethign Went wrong";
 }
 ?>   
       </table>

       </div>
</body>
</html>

<?php }else{

  header('location: HOD_login_main.php');
  }
  
  
  ?>