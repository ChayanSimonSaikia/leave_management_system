<?php session_start();
 include( 'conn.php' );

if(isset($_SESSION['email'])){
    $ses_email = $_SESSION['email'];
    $sel = "SELECT * FROM `staff` WHERE `email` = '$ses_email'";
    $run7 = mysqli_query( $con, $sel );
    $res = mysqli_fetch_assoc( $run7 );

    $fetch_dept = $res['dept'];

    $query = "SELECT * FROM `approved_leaves` WHERE `position` = 'Teacher' AND `dept` = '$fetch_dept'";
    $run = mysqli_query( $con, $query );
    $row = mysqli_num_rows( $run );

?>
<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Approved Requests</title>
<link rel = 'stylesheet' href = 'css/admin_dash.css'>
<link rel = 'stylesheet' href = 'css/hover.css'>
<link rel="stylesheet" href="css/change_color.css?version=51">
<link rel = 'stylesheet' href = 'css/hover.css'>
</head>

<body>
<?php include( 'nav_bar_HOD.php' );
   include( 'search_HOD_pending_approved.php' ); 
?>

<div class = 'table_body'>
<table class = "table" style= "margin-left: 100px;margin-right: 100px;">
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
   }else {
    echo  "<tr><td></td><td><h1 style='color: white;'></h1></td><td><h1 style='color: white;'>No</h1></td><td><h1 style='color: white;'>Available</h1></td><td><h1 style='color: white;'>Leave</h1></td><td><h1 style='color: white;'>Requests</h1></td></tr>";
   }
    ?>

    </table>
    </div>

    </body>

    </html>

    <?php }else{

header('location: HOD_login_main.php');
}


?>