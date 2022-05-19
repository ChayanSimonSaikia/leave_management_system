<?php session_start();
 include('conn.php');
$query = "SELECT * FROM `leaves` WHERE `position` = 'Hod'";
$run = mysqli_query($con, $query);
$row = mysqli_num_rows($run);

$_SESSION['email'];

if (isset($_SESSION['email'])) {
    ?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pending Requests</title>
    <link rel='stylesheet' href='css/admin_dash.css'>
    <link rel='stylesheet' href='css/hover.css'>
</head>

<body>
    <?php include('nav_bar_admin.php'); ?>

    <div class='table_body'>
        <table>
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
            header('location: admin_dash.php');
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



            
            header('location: admin_dash.php');
        }
    } ?>

<?php
} else {
        header('location: admin_login_main.php');
    }
