<!--This is the Find jobs page-->
<?php include '/core/init.php'; ?>

<html>
    <head>
        <title>Jobs</title>
        <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
    </head>
    
    <body class="log">   
    
    <?php
        if(empty($_POST)===false){
            add_job($_POST['job_name'],$_POST['category'],$_POST['company'],$_POST['description'],$_POST['salary']);
        }
        
        if(empty($user_data)===false){?>
        
            <div id="jobs_form">
                <div id="form_inner"><img src=../images/jobs.png id="home_form_inner">                
                    
        <?php if($user_data['User_Category']=="admin"){?>
                                
                <h3 id="font_color">&nbsp;&nbsp;&nbsp;To Add New Jobs Use Below Form</h3>    
                    
                <form method="post" action="jobs.php" id="add_form">         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="job_name" placeholder="Enter job Name Here">
                    <select name="category" placeholder="Job Category" >
                        <option value="" disabled selected>Select Job Category</option>
                        <option value="Engineering">Engineering</option>
                        <option value="Education">Education</option>
                        <option value="Health">Health Care</option>
                        <option value="Business">Business and Finance</option>
                        <option value="Hotel">Hotel and Hospitality</option>
                    </select>
                    <input type="text" name="company" placeholder="Enter Company Name Here">
                    <input type="text" name="description" size="40px" placeholder="Enter a Desciption of Job Here">
                    <input type="text" name="salary" size="10px" placeholder="Job Salary">
                    <input type="submit" name="add" value="Add Job">
                </form>
        <?php }?>
                    
                <h2 id="font_color">&nbsp;&nbsp;&nbsp;Choose your desired job category...</h2>
                </div>



                <a href="eng.php"><div id="job_widjet1"><center><h3>Engineering</h3>
                    <img src="../images/eng.png"  width="170px">
                    <h4>Find the right job for you in Engineering sector!</h4>
                    <h5>View Vacancies</h5></center>
                </div></a>

                <a href="business.php"><div id="job_widjet2"><center><h3>Business and Finance</h3>
                    <img src="../images/home.png" width="200px">
                    <h4>Get a job in Business and Finance sector!!</h4>
                    <h5>View Vacancies</h5></center>
                </div></a>

                <a href="health.php"><div id="job_widjet3"><center><h3>Health Care</h3>
                    <img src="../images/health.jpg" width="190px">
                    <h4>Jobs for ones who care about others!</h4>
                    <h5>View Vacancies</h5></center>
                </div></a>

                <a href="edu.php"><div id="job_widjet4"><center><h3>Education</h3>
                    <img src="../images/groupofworkers.png" width="200px">
                    <h4>Jobs in Education sector</h4>
                    <h5>View Vacancies</h5></center>
                </div></a>

                <a href="hotel.php"><div id="job_widjet5">
                    <center><h3>Hotel and Hospitality</h3>
                    <img src="../images/Career-Fair.png" width="250px">
                    <h4>Jobs for ones who interest in hotel sector!</h4>
                    <h5>View Vacancies</h5></center>
                </div></a>
            </div>
        
        <?php }
        else{    
        ?>
        
            <div id="jobs_form">
                <div id="form_inner"><img src=../images/jobs.png id="home_form_inner">
                <center><h1 id="font_color">You cant access this page until you log in to the system. Please log in!</h1>         
                        <img src="../images/error.png">
                </center>
                </div>



                
            </div>
        
        <?php }
            include "includes/header.php";
        ?>
        
    </body>
    
</html>