<link rel="stylesheet" href="css/nav_bar_HOD.css">
<header>
        <nav>
            <ul class="nav__links">
                <li><a href="staff_dash.php">Profile</a></li>
                <li><a href="staff_settings.php">Settings</a></li>
                <li><a href="logout_staff.php">Log Out</a></li>
            </ul>
        </nav>
        <button id="apply" onclick="location.href= 'request_leave_selection_staff.php'" class="apply hvr-radial-out hvr-shadow" href="#">+</button>
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
    