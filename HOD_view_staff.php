<?php session_start();
include( 'conn.php' );

if ( isset( $_SESSION['email'] ) ) {

    $ses_email = $_SESSION['email'];
    $sel = "SELECT * FROM `staff` WHERE `email` = '$ses_email'";
    $run7 = mysqli_query( $con, $sel );
    $res = mysqli_fetch_assoc( $run7 );

    $fetch_dept = $res['dept'];

    $query = "SELECT * FROM `staff` WHERE `position` = 'Teacher' AND `dept` = '$fetch_dept'";
    $run = mysqli_query( $con, $query );
    $row = mysqli_num_rows( $run );

    ?>

    <!DOCTYPE html>
    <html lang = 'en'>

    <head>
    <meta charset = 'UTF-8'>
    <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
    <title>View Staff</title>
    <link rel = 'stylesheet' href = 'css/admin_dash.css'>
    <link rel = 'stylesheet' href = 'css/admin_view_HOD.css?version=51'>
    <link rel = 'stylesheet' href = 'css/change_color.css?version=51'>
    <link rel = 'stylesheet' href = 'css/hover.css'>
    </head>

    <body>
    <?php include( 'nav_bar_HOD.php' );
    include( 'search_HOD_view_details.php' );

    ?>

    <div class = 'table_body table_body2'>
    <table class = 'table'>
    <tr>
    <th class = 'th'>Name</th>
    <th>Department</th>
    <th>Email</th>
    <th>Password</th>
    <th>Designation</th>
    <th>Phone No.</th>
    <th>Date Of Birth</th>
    <th>Address</th>
    </tr>
    <?php
    if ( $row >= 1 ) {
        while ( $result = mysqli_fetch_assoc( $run ) ) {
            $name = $result['name'];
            $dept = $result['dept'];
            $email = $result['email'];
            $pass = $result['pass'];
            $des = $result['designation'];
            $phone = $result['phone'];
            $dob = $result['dob'];
            $add = $result['address'];
            ?>
            <tr>
            <td>
            <p><?php echo $result['name'];
            ?>
            </p>
            </td>
            <td>
            <p><?php echo $result['dept'];
            ?>
            </p>
            </td>
            <td>
            <p><?php echo $result['email'];
            ?>
            </p>
            </td>
            <td>
            <p><?php echo $result['pass'];
            ?>
            </p>
            </td>
            <td>
            <p><?php echo $result['designation'];
            ?>
            </p>
            </td>
            <td>
            <p><?php echo $result['phone'];
            ?>
            </p>
            </td>
            <td>
            <p><?php echo $result['dob'];
            ?>
            </p>
            </td>
            <td>
            <p><?php echo $result['address'];
            ?>
            </p>
            </td>
            </tr>
            <?php
        }
    } else {
        echo  "<tr><td></td><td><h1 style='color: white;'>No</h1></td><td><h1 style='color: white;'>More</h1></td><td><h1 style='color: white;'>Leave</h1></td><td><h1 style='color: white;'>Requests</h1></td></tr>";
    }
    ?>

    </table>
    </div>

    </body>

    </html>

    <?php } else {

        header( 'location: HOD_login_main.php' );
    }

    ?>