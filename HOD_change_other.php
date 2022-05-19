<?php session_start();
include( 'conn.php' );

if ( isset( $_SESSION['email'] ) ) {
    ?>
    <!DOCTYPE html>
    <html lang = 'en'>
    <head>
    <meta charset = 'UTF-8'>
    <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
    <title>Change Other Info</title>
    <link rel = 'stylesheet' href = 'css/hover.css'>
    <link rel = 'stylesheet' href = 'css/HOD_settings.css'>
    <link rel = 'stylesheet' href = 'css/admin_change_pass.css?version=51'>
    <link rel="stylesheet" href="css/change_color.css">
    </head>
    <script src = 'js/validation.js'></script>

    <body>
    <?php include( 'nav_bar_HOD.php' );
    include( 'vertical_bar_HOD.php' );
    ?>
    <div class = 'pass_body pass_body3'>
    <h1>Change Info</h1><br><br>
    <form method = 'post'>
    <input type = 'Text' name = 'name' placeholder = 'Enter Your Full Name' required><br><br>
    <input type = 'Number' name = 'phone' placeholder = 'Enter Your Phone Number' required><br><br>
    <select name = 'dept'>
    <option value = 'Statistics'>Statistics</option>
    <option value = 'Horticulture'>Horticulture</option>
    <option value = 'Biotech'>Biotech</option>
    </select><br><br>
    <input type = 'Text' name = 'dob' placeholder = 'Enter Your Date of Birth' required><br><br>
    <input type = 'Text' name = 'address' placeholder = 'Enter Your Address' required><br><br>
    <input type = 'Text' name = 'designation' placeholder = 'Enter Your Designation' required><br><br>

    <input class = 'btn' name = 'submit' type = 'submit' value = 'Change Now'>
    </form>
    </div>

    </body>
    </html>

    <?php
    include( 'conn.php' );

    $ses_email = $_SESSION['email'];

    if ( isset( $_POST['submit'] ) ) {
        $name = $_POST['name'];
        $type = $_POST['type'];
        $des = $_POST['designation'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $add = $_POST['address'];
        $dept = $_POST['dept'];
        $update = "UPDATE `staff` SET `name`='$name', `phone`='$phone',`dob`='$dob',`dept`='$dept',`address`='$add',`designation`='$des' WHERE `email` = '$ses_email'";
        $run = mysqli_query( $con, $update );
        if ( $run ) {
            echo "<script>alert('Successfully Changed');window.location.href ='HOD_change_other.php';</script>";
        } else {
            echo "<script>alert('Something went wrong');window.location.href ='HOD_change_other.php';</script>";
        }
    }
    ?>

    <?php } else {

        header( 'location: HOD_login_main.php' );
    }

    ?>