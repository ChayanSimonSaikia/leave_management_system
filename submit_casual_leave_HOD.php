<?php
  include('conn.php');

  $name = $_POST['name'];
  $email = $_POST['email'];
  $dept = $_POST['dept'];
  $type = $_POST['type'];
  $date = $_POST['date'];
  $days = $_POST['days'];
  $reason = $_POST['reason'];
  $position = $_POST['position'];

  $query = "INSERT INTO `leaves`(`name`,`email`, `type`, `dept`, `days`, `starting_date`, `reasons`, `position`) VALUES ('$name','$email','$type','$dept','$days','$date','$reason','$position')";
  
  if($run = mysqli_query($con, $query)){
    echo "<script>alert('Your leave request have been submitted.');window.location.href = 'request_leave_selection.php';</script>";
  }else{
    echo "<script>alert('Something went wrong.');window.location.href = 'casual_leave_HOD.php';</script>";
  }

?>