<?php session_start();
 include('conn.php');
$find_now = $_POST['find'];
$query = "SELECT * FROM `approved_leaves` WHERE `email` ='$find_now' OR `name` = '$find_now' AND `position` = 'Teacher'";
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
    <link rel="stylesheet" href="css/change_color_found.css?version=51">
    <link rel="stylesheet" href="css/search_HOD.css">
</head>

<body>
    <?php include('nav_bar_HOD.php');
    include( 'search_HOD_pending_approved.php' ); ?>

    <div class='table_body'>
        <table class = "table">
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Type</th>
                <th>Leave Days</th>
                <th>Starting Date</th>
                <th>Reason</th>
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
            </tr>
            <?php
       }
   } else {
       echo  "<tr><td></td><td><h1 style='color: white;'></h1></td><td><h1 style='color: white;'>No</h1></td><td><h1 style='color: white;'>Result</h1></td><td><h1 style='color: white;'></h1></td><td><h1 style='color: white;'></h1></td></tr>";
   } ?>

        </table>
    </div>

</body>

</html>

<?php
} else {
        header('location: HOD_login_main.php');
    }