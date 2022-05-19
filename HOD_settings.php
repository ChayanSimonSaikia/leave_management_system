<?php session_start();
include( 'conn.php' );

if ( isset( $_SESSION['email'] ) ) {
    ?>
    <!DOCTYPE html>
    <html lang = 'en'>
    <head>
    <meta charset = 'UTF-8'>
    <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
    <title>Change Email</title>
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
    <div class = 'pass_body pass_body2'>
    <h1>Change Email</h1><br><br>
    <form method = 'post'>
    <input id = 'old' type = 'Email' name = 'old' placeholder = 'Enter Your Old Email' required><br><br>
    <input id = 'new' type = 'Email' name = 'new' placeholder = 'Enter Your New Email' required><br><br>
    <input type = 'Password' name = 'confirm' placeholder = 'Enter Your Password' required><br><br>
    <input class = 'btn' name = 'submit' type = 'submit' onclick = 'validate_same_email()' value = 'Change Now'>
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
        $confirm = $_POST['confirm'];

        if ( $old == $new ) {
            echo "<script>alert('Old email and new email can not be same');window.location.href = 'HOD_settings.php';</script>";
        } else {
            if ( $confirm == $result['pass'] && $old == $result['email'] ) {
                $update = "UPDATE `staff` SET `email`='$new' WHERE `email` = '$ses_email'";
                $run2 = mysqli_query( $con, $update );
                if ( $run2 ) {
                    session_destroy();
                    echo "<script>alert('You have successfully changed your email. Now please Login again');window.location.href ='HOD_login_main.php';</script>";
                }
            } else {
                echo "<script>alert('Please recheck your old email and password');window.location.href ='HOD_settings.php';</script>";
            }
        }
    }
    ?>

    <?php } else {

        header( 'location: HOD_login_main.php' );
    }

    ?>