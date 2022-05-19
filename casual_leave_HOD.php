<?php session_start();
  

  if(isset($_SESSION['email'])){
    include('conn.php');
  $ses_email = $_SESSION['email'];
  $check = "SELECT * FROM `staff` WHERE `email` = '$ses_email'";
  $run = mysqli_query($con, $check);
  $result = mysqli_fetch_assoc($run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Casual Leave</title>
  <link rel="stylesheet" href="css/casual_leave.css">
  <link rel="stylesheet" href="css/hover.css">
</head>

<body>
  <?php include('nav_bar_HOD.php');?>
  
  <div class="form_body">
    <form action="submit_casual_leave_HOD.php" method="post" id="form">
      <input type="hidden" value="Casual" name="type" />
      <input type="hidden" value="Hod" name="position">
      <input type="hidden" value="<?php echo $ses_email;?>" name="email">

      
      <div class="divider_row">
        <div class="divider">
          <label>Name</label>
          <input type="text" name="name" placeholder="Enter Your Full Name" required/><br><br>
        </div>

        <div class="divider_col">
          <label>Department</label>
          <select name="dept">
            <option value="Statistics">Statistics</option>
            <option value="Horticulture">Horticulture</option>
            <option value="Biotech">Biotech</option>
          </select><br><br>
        </div>

        <div class="divider">
          <label>Starting Date</label>
          <input type="Text" id="starting_day" name="date" placeholder="Format: dd/mm/yyyy" autocomplete="off" required/><br><br>
        </div>

        <div class="divider">
          <label>No. Of Leave Days</label>
          <input type="number" min="1" max="<?php echo $result['casual_rem'];?>" name="days" placeholder="Enter No. Of Leave Days" required/><br><br>
        </div>

        <div class="divider">
          <label>Reason For Leaving</label>
          <textarea type="text" name="reason" placeholder="Enter The Reason For Leaving" required></textarea><br><br>
        </div>



      </div>

      <input class="submit" onclick="validate_HOD()" type="submit" value="Submit" <?php if($result['casual_rem']<=0){
      echo "disabled";
    }else{
      echo "enabled";
    }?>/>



      <script src="js/validate_casual.js"></script>


    </form>
  </div>
</body>

</html>
<?php }else{

header('location: HOD_login_main.php');
}


?>