<?php include '/core/init.php'; ?>

<html>
    <head>
        <title>Home</title>
        <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
    </head>
    
    <body>        
        <div id="home_form">
            <div id="form_inner"><img src=../images/banner.png></div>
            
            <div id="widjet1"><center><h3>Jobs</h3>
                <img src="../images/job2.jpg" id="w1_image">
                <h4>Find the right job for you from our massive database!</h4>
                <h5><a href="jobs.php">Click hear to find your dream job...</a></h5></center>
            </div>
            
            <div id="widjet2"><center><h3>My Applications</h3>
                    <img src="../images/5.png" id="w2_image">
                    <h4>Edit your applications</h4>
                    <h5><a href="edit_app.php">Click hear to view your account...</a></h5></center>
            </div>
                        
            <div id="widjet3"><center><h3>My Account</h3>
                <img src="../images/employee.png" id="w3_image">
                <h4>Check your profile information and change them or upgrade them.</h4>
                <h5><a href="settings.php">Click hear to view your account...</a></h5></center>
            </div>           
            
            <div id="widjet4"><center><h3>About Us</h3>
                <img src="../images/character-group.png" id="w4_image">
                <h4>We are a group of 2nd year undergraduates of University of Colombo School of Computing.</h4>
                <h5><a href="about.php">Click hear to know who we are...</a></h5></center>
            </div>
            
            <div id="widjet5">
                <center><h3>Contact Us</h3>
                <img src="../images/2.png" id="w5_image">
                <h4>Please let us now your ideas about our website. feel free to comment!</h4>
                <h5><a href="contact.php">Click hear to Comment...</a></h5></center>
            </div>
            
        </div>  
                        
        <?php
            include "includes/header.php";
        ?>
        
    </body>
    
</html>