<?php session_start();
 include('conn.php');


$_SESSION['email'];

if (isset($_SESSION['email'])) {

    $ses_email = $_SESSION['email'];
    $sel = "SELECT * FROM `staff` WHERE `email` = '$ses_email'";
    $run7 = mysqli_query( $con, $sel );
    $res = mysqli_fetch_assoc( $run7 );

    $fetch_dept = $res['dept'];

    $query = "SELECT * FROM `leaves` WHERE `position` = 'Teacher' AND `dept` = '$fetch_dept'";
    $run = mysqli_query( $con, $query );
    $row = mysqli_num_rows( $run );

    ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pending Requests</title>
    <link rel='stylesheet' href='css/admin_dash.css'>
    <link rel='stylesheet' href='css/hover.css'>
    <link rel="stylesheet" href="css/change_color.css?version=51">
</head>

<body>
    <?php include('nav_bar_HOD.php');?>

    <div class='table_body table_body2'>
        <table class = "table">
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Type</th>
                <th>Leave Days</th>
                <th>Starting Date</th>
                <th>Reason</th>
                <th>Reject</th>
                <th>Accept</th>
            </tr>
            <?php
   if ($row>=1) {
       while ($result = mysqli_fetch_assoc($run)) {
           $name = $result['name'];
           $email = $result['email'];
           $type = $result['type'];
           $position = $result['position'];
           $dept = $result['dept'];
           $days = $result['days'];
           $starting_date = $result['starting_date'];
           $reason = $result['reasons']; ?>
            <tr>
                <td>
                    <p><?php echo $result['name']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $result['dept']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $result['type']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $result['days']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $result['starting_date']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $result['reasons']; ?>
                    </p>
                </td>
                <td>
                    <form method='post'><input type='submit' value='Reject' name='reject' class='reject'></form>
                </td>
                <td>
                    <form method='post'><input type='submit' value='Accept' name='accept' class='accept'></form>
                </td>
            </tr>
            <?php
       }
   } else {
       echo  "<tr><td></td><td><h1 style='color: white;'></h1></td><td><h1 style='color: white;'>No</h1></td><td><h1 style='color: white;'>Available</h1></td><td><h1 style='color: white;'>Leave</h1></td><td><h1 style='color: white;'>Requests</h1></td></tr>";
   } ?>

        </table>
    </div>

</body>

</html>
<?php

    if (isset($_POST['reject'])) {
        $delete = "DELETE FROM `leaves` WHERE `name` = '$name' AND `dept` = '$dept' AND `days` = '$days' AND `starting_date` = '$starting_date' AND `reasons` = '$reason'";
        $run2 = mysqli_query($con, $delete);
        if ($run2) {
            header('location: HOD_pending_request.php');
        }
    }
    if (isset($_POST['accept'])) {
        $search = "SELECT * FROM `staff` WHERE `email`= '$email'";
        $insert = "INSERT INTO `approved_leaves`(`name`,`email`, `type`, `position`, `dept`, `days`, `starting_date`, `reasons`) VALUES ('$name','$email','$type','$position','$dept',$days,'$starting_date','$reason')";
        $delete = "DELETE FROM `leaves` WHERE `name` = '$name' AND `dept` = '$dept' AND `days` = '$days' AND `starting_date` = '$starting_date' AND `reasons` = '$reason'";
        $run2 = mysqli_query($con, $insert);
        $run3 = mysqli_query($con, $delete);
        $run4 = mysqli_query($con, $search);
        $search_res = mysqli_fetch_assoc($run4);
        if ($run2 && $run3) {

            //check koribole 
            $_SESSION['type']= $type;
            $_SESSION['days']= $days;
            $_SESSION['name']= $name;
            $_SESSION['dept']= $dept;
            $_SESSION['starting_date']= $starting_date;
            
            $remain_casual = $search_res['casual_rem']- $days;
            $remain_max = $search_res['maxleave_rem']- $days;

            $update = "UPDATE `staff` SET `casual_rem`='$remain_casual',`maxleave_rem`='$remain_max' WHERE `email`= '$email'";
            $run5 = mysqli_query($con, $update);



            
            header('location: HOD_pending_request.php');
        }
    } ?>

<!-- search button -->





<?php
        if(isset($_POST['submit_search'])){
            include('conn.php');
            $search_guy = $_POST['search'];
            $find = "SELECT * FROM `leaves` WHERE `email` = '$search_guy' OR `name` = '$search_guy'";
            $run6 = mysqli_query($con, $find);
            $find_res = mysqli_fetch_assoc($run6);
            $row2 = mysqli_num_rows($find_res);?>

<div class='table_body table_body2'>
        <table class = "table">
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Type</th>
                <th>Leave Days</th>
                <th>Starting Date</th>
                <th>Reason</th>
                <th>Reject</th>
                <th>Accept</th>
            </tr>
            <?php
   if ($row2>=1) {
       while ($find_res) {
           $name = $find_res['name'];
           $email = $find_res['email'];
           $type = $find_res['type'];
           $position = $find_res['position'];
           $dept = $find_res['dept'];
           $days = $find_res['days'];
           $starting_date = $find_res['starting_date'];
           $reason = $find_res['reasons']; ?>
            <tr>
                <td>
                    <p><?php echo $find_res['name']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $find_res['dept']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $find_res['type']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $find_res['days']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $find_res['starting_date']; ?>
                    </p>
                </td>
                <td>
                    <p><?php echo $find_res['reasons']; ?>
                    </p>
                </td>
                <td>
                    <form method='post'><input type='submit' value='Reject' name='reject' class='reject'></form>
                </td>
                <td>
                    <form method='post'><input type='submit' value='Accept' name='accept' class='accept'></form>
                </td>
            </tr>
            <?php
       }
   } else {
       echo  "<tr><td></td><td><h1 style='color: white;'></h1></td><td><h1 style='color: white;'></h1></td><td><h1 style='color: white;'>No</h1></td><td><h1 style='color: white;'></h1></td><td><h1 style='color: white;'>Result</h1></td></tr>";
   } ?>

        </table>
    </div>

    <?php
        }
      


?>




<?php
} else {
        header('location: HOD_login_main.php');
    }
