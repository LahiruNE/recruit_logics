<header id="header_bar">
    <img src="../images/logo.png" id="header_img">
    <img src="../images/guest.png" id="guest_img_head">
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="sell.php">Sell yourself</a></li>
            <li><a href="settings.php">My Account</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact us</a></li>
        </ul>
    </nav>

<?php
    if(empty($user_data)===false){ 
?>
    
    <div id="logged_user"><?php echo 'Current logged user:   '.$user_data['First_Name']?></div>
    <a href="core/logout.php"><div id="logout_button"><span id="logout_letter">Log Out</span></div></a>


<?php }
    else{    
?>

    <div id="logged_user"><?php echo 'You have to log into the system!'?></div>
    <a href="index.php"><div id="logout_button"><span id="logout_letter">Log In</span></div></a>
</header>

<?php } ?>

