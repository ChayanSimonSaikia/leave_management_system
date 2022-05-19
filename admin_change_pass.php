<?php session_start();
 include( 'conn.php' );

if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="css/admin_change_pass.css?version=51">
</head>

<body>
    <?php include('nav_bar_admin.php')?>
    <div class="pass_body">
    <h1>Change Password</h1><br><br>
        <form method="post">
            <input type="text" name="old" placeholder="Enter Your Old Password" required><br><br>
            <input type="text" name="new" placeholder="Enter Your New Password" required><br><br>
            <input class="btn" name="submit" type="submit" value="Change Now">
        </form>
    </div>

</body>

</html>

<?php 
 include('conn.php');
 $check = "SELECT * FROM `admin`";
 $run1 = mysqli_query($con, $check);
 $result = mysqli_fetch_assoc($run1);
 
 if(isset($_POST['submit'])){
     $old = $_POST['old'];
     $new = $_POST['new'];
     
    if($old == $result['admin_pass']){
       $update = "UPDATE `admin` SET `admin_pass`='$new'";
       $run2 = mysqli_query($con, $update);
       if($run2){
           echo "<script>alert('You have successfully changed the password');window.location.href ='admin_change_pass.php';</script>";
       } 
    }else{
        echo "<script>alert('Please recheck your old password');window.location.href ='admin_change_pass.php';</script>";

    }
 }

?>

<?php }else{

header('location: admin_login_main.php');
}


?>