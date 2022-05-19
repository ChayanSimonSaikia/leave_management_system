<?php session_start();
 include( 'conn.php' );

if(isset($_SESSION['email'])){
    include( 'conn.php' );
    $ses_email = $_SESSION['email'];
    $sel = "SELECT * FROM `staff` WHERE `email` = '$ses_email'";
    $run1 = mysqli_query($con, $sel);
    $res = mysqli_fetch_assoc($run1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Staff</title>
    
    <link rel="stylesheet" href="css/admin_change_pass.css?version=51">
    <link rel="stylesheet" href="css/admin_add_HOD.css?version=51">
    <link rel="stylesheet" href="css/change_color.css">
    <link rel = 'stylesheet' href = 'css/hover.css'>
</head>

<body>
    <?php include('nav_bar_HOD.php');?>

    <div class="pass_body form_body">
        <h1>Add New Staff Member</h1>
        <form method="post">
            <input type="hidden" name="type" value="Teacher"><br><br>
            <input type="hidden" name="dept" value="<?php echo $res['dept'];?>">

            <label>Name</label><br>
            <input type="text" name="name" placeholder="Enter Your Full Name" required><br><br>

            

            <label>Email</label><br>
            <input type="email" name="email" placeholder="Enter Your Email" required><br><br>

            <label>Passowrd</label><br>
            <input type="password" name="pass" placeholder="Enter Your Password" required><br><br>

            <label>Designation</label><br>
            <input type="text" name="designation" placeholder="Enter Your designation" required><br><br>

            <label>Phone No.</label><br>
            <input type="number" name="phone" placeholder="Enter Your Phone Number" required><br><br>

            <label>Date Of Birth</label><br>
            <input type="text" name="dob" placeholder="Format dd/mm/yyyy" required><br><br>

            <label>Address</label><br>
            <textarea type="text" name="address" placeholder="Enter Your Address" required></textarea><br><br><br>

            <input type="submit" name="submit" class="btn" onclick="validate_admin()">

        </form>
    </div>

</body>

</html>

<?php
       include('conn.php');
     if(isset($_POST['submit'])){
         $name = $_POST['name'];
         $type = $_POST['type'];
         $email = $_POST['email'];
         $pass = $_POST['pass'];
         $des = $_POST['designation'];
         $phone = $_POST['phone'];
         $dob = $_POST['dob'];
         $add = $_POST['address'];
         $dept = $_POST['dept'];
         
         $update = "INSERT INTO `staff`(`name`, `email`, `pass`, `phone`, `dob`, `dept`, `address`, `designation`, `position`) VALUES ('$name','$email','$pass','$phone','$dob','$dept','$add','$des','$type')";

         $run = mysqli_query($con, $update);
         if($run){
            echo "<script>alert('Submitted');window.location.href ='HOD_add_staff.php';</script>";
         }else{
            echo "<script>alert('Something went wrong');window.location.href =''HOD_add_staff.php';</script>";
         }
     }
 


?>

<?php }else{

header('location: HOD_login_main.php');
}


?>