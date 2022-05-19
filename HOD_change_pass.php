<?php session_start();
include( 'conn.php' );

if ( isset( $_SESSION['email'] ) ) {
    ?>
    <!DOCTYPE html>
    <html lang = 'en'>
    <head>
    <meta charset = 'UTF-8'>
    <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
    <title>Change Password</title>
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
    <div class = 'pass_body pass_body4'>
    <h1>Change Password</h1><br><br>
    <form method = 'post'>
    <input id = 'old' type = 'Text' name = 'old' placeholder = 'Enter Your Old Password' required><br><br>
    <input id = 'new' type = 'Text' name = 'new' placeholder = 'Enter Your New Password' required><br><br>
    <input class = 'btn' name = 'submit' type = 'submit' value = 'Change Now'>
    </form>
    </div>

    </body>
    </html>

    <?php
    include( 'conn.php' );

    $ses_email = $_SESSION['email'];
    $check = "SELECT * FROM `staff` WHERE `email` = '$ses_email'";
    $run1 = mysqli_query( $con, $check );
    $result = mysqli_fetch_assoc( $run1 );

    if ( isset( $_POST['submit'] ) ) {
        $old = $_POST['old'];
        $new = $_POST['new'];

        if ( $old == $new ) {
            echo "<script>alert('Old and new password can not be same');window.location.href = 'HOD_change_pass.php';</script>";
        } else {


            if ( $old == $result['pass']) {
                $update = "UPDATE `staff` SET `pass`='$new' WHERE `email` = '$ses_email'";
                $run2 = mysqli_query( $con, $update );
                if ( $run2 ) {
                    session_destroy();
                    echo "<script>alert('You have successfully changed your password. Now please Login again');window.location.href ='HOD_login_main.php';</script>";
                }
            } else {
                echo "<script>alert('Please recheck your old password');window.location.href ='HOD_change_pass.php';</script>";
            }
        }
    }
    ?>

    <?php } else {

        header( 'location: HOD_login_main.php' );
    }

    ?>