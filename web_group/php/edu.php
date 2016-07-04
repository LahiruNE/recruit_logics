<?php
    include '/core/init.php'; 

         
        if(isset($_GET['jobID'])){
            echo'<script language ="javascript">';
            echo'alert("Your application will be submitted!")';
            echo'</script>'; 
            submit_app($user_data["ID"],$_GET['jobID']);
        } 

        if(isset($_GET['rm_jobID'])){
            echo'<script language ="javascript">';
            echo'alert("selected job details will be removed!")';
            echo'</script>'; 
            remove_job($_GET['rm_jobID']);
        } 
        
        if(isset($_GET['jobname'])){?>        
            <script language='javascript'>
                alert("<?php echo $_GET['jobname']?>"+"\n\n"+"Company : "+"<?php echo $_GET['company']?>"+"\n\n"+"<?php echo $_GET['desc']?>"+"\n\n"+"Salary : Rs."+"<?php echo $_GET['salary']?>");
            </script>            
<?php }?>  

<html>
    <head>
        <title>Education Jobs</title>
        <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
    </head>
    
    <body class="log">        
        <div id="setting_form">
            <div id="form_inner">
                <img src=../images/education.png>
                
                <h2 id="font_color">&nbsp;&nbsp;&nbsp;Education Category</h2>
                
                <table id="jobs_table">
                    <tr>
                        <th>Job_ID</th>
                        <th>Job_Name</th>
                        <th>Company</th>
                    </tr>               
                
                <?php
                    $job_rows=get_jobs("Education"); 
                    $x=1;
                    while($rows=mysqli_fetch_assoc($job_rows)){
                        $job_name=$rows['Job_Name'];
                        $company=$rows['Company'];
                        $salary=$rows['Salary'];
                        $description=$rows['Description'];
                ?>               
                    <tr id="<?php echo $x;?>">
                        <td><?php echo $rows['Job_ID']; ?></td>
                        <td><?php echo $rows['Job_Name']; ?></td>
                        <td><?php echo $rows['Company']; ?></td>
                        <td><input type="button" value=Details onclick="location.href='edu.php?jobname=<?php echo $job_name;?> && desc=<?php echo $description;?> && salary=<?php echo $salary;?> && company=<?php echo $company;?>'" ></td>
                        
                        <?php if($user_data["User_Category"]=="admin"){?>   
                        <td><input type="button" value="Remove" onclick="location.href='edu.php?rm_jobID=<?php echo $rows['Job_ID'];?>'"></td>                    
                    </tr>      
                    <?php }else{?>
                        <td><input type="button" value="Apply" onclick="location.href='edu.php?jobID=<?php echo $rows['Job_ID'];?>'"></td>
                    <?php }?>
                    </tr>      
                    
                    <script language="javascript">
                        var index=<?php echo $x?>;
                        if(index%2!=0){        
                        var r=document.getElementById("<?php echo $x;?>");
                        r.style.backgroundColor="#e3e49d";
                        }
                    </script>
                    <?php $x++; }?>
                </table>
                </div>
        </div>
                
        <?php
            include "includes/header.php";
       
        ?>
        
    </body>
    
</html>