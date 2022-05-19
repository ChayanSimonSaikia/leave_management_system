<?php session_start();
 include( 'conn.php' );

if(isset($_SESSION['email'])){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New HOD</title>
    
    <link rel="stylesheet" href="css/admin_change_pass.css?version=51">
    <link rel="stylesheet" href="css/admin_add_HOD.css?version=51">
</head>

<body>
    <?php include('nav_bar_admin.php');?>

    <div class="pass_body form_body">
        <h1>Add New HOD</h1>
        <form method="post">
            <input type="hidden" name="type" value="Hod"><br><br>

            <label>Name</label><br>
            <input type="text" name="name" placeholder="Enter Your Full Name" required><br><br>

            <label>Department</label><br>
            <select name="dept">
                <option value="Statistics">Statistics</option>
                <option value="Horticulture">Horticulture</option>
                <option value="Biotech">Biotech</option>
            </select><br><br>

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
         
         $update = "UPDATE `staff` SET `name`='$name',`email`='$email',`pass`='$pass',`phone`='$phone',`dob`='$dob',`dept`='$dept',`address`='$add',`designation`='$des',`casual_rem`= 14,`maternity_rem`= 180,`child_rem`= 90,`maxleave_rem`= 300,`position`='$type' WHERE `dept` = '$dept' AND `position` = '$type'";

         $run = mysqli_query($con, $update);
         if($run){
            echo "<script>alert('Submitted');window.location.href ='admin_add_HOD.php';</script>";
         }else{
            echo "<script>alert('Something went wrong');window.location.href ='admin_add_HOD.php';</script>";
         }
     }
 


?>

<?php }else{

header('location: admin_login_main.php');
}


?>