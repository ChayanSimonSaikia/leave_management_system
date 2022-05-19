<link rel="stylesheet" href="css/nav_bar_HOD.css">
<header>
        <nav>
            <ul class="nav__links">
                <li><a href="admin_dash.php">Requests</a></li>
                <li><a href="admin_approved.php">Approved Requests</a></li>
                <li><a href="admin_add_HOD.php">Add New Hod</a></li>
                <li><a href="admin_view_HOD.php">View HOD</a></li>
                <li><a href="admin_change_pass.php">Change Password</a></li>
                <li><a href="logout_admin.php">Log Out</a></li>
            </ul>
        </nav>
        <p onclick="openNav()" class="menu cta">Menu</p>
    </header>
    <div id="mobile__menu" class="overlay">
        <a class="close" onclick="closeNav()">&times;</a>
        <div class="overlay__content">
            <a href="#">Profile</a>
            <a href="#">Pending Requests</a>
            <a href="#">Approved Requests</a>
            <a href="#">Settings</a>
        </div>
    </div>
    <script type="text/javascript" src="js/mobile_toggle.js"></script>
    