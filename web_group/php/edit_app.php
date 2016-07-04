<?php
    include '/core/init.php'; 

         
        if(isset($_GET['appID'])){
            echo'<script language ="javascript">';
            echo'alert("Your application will be removed!")';
            echo'</script>'; 
            remove_apps($_GET['appID']);
        } 
        
        if(isset($_GET['jobname'])){?>        
            <script language='javascript'>
                alert("<?php echo $_GET['jobname']?>"+"\n\n"+"Company : "+"<?php echo $_GET['company']?>"+"\n\n"+"<?php echo $_GET['desc']?>"+"\n\n"+"Salary : Rs."+"<?php echo $_GET['salary']?>");
            </script>            
<?php }?>  

<html>
    <head>
        <title>Applications</title>
        <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
    </head>
    
    <body class="log">        
        <div id="app_form">
            <div id="form_inner">
                <img src=../images/sell.png>
                
             <?php if(empty($user_data)===false){?>   
                <h2 id="font_color">&nbsp;&nbsp;&nbsp;Manage Applications</h2>
            
                <table id="jobs_table">
                    <tr>
                        <th>App_ID</th>
                        <th>User_ID</th>
                        <th>Job_ID</th>
                        <th>Job_Name</th>
                        <th>Company</th>
                    </tr>               
                
            <?php
                    $job_rows=get_apps($user_data['User_Category'],$user_data["ID"]); 
                    $x=1;
                    while($rows=mysqli_fetch_assoc($job_rows)){
                        $job_name=$rows['Job_Name'];
                        $company=$rows['Company'];
                        $salary=$rows['Salary'];
                        $description=$rows['Description'];
                ?>               
                    <tr id="<?php echo $x;?>">
                        <td><?php echo $rows['App_ID']; ?></td>
                        <td><?php echo $rows['ID']; ?></td>
                        <td><?php echo $rows['Job_ID']; ?></td>
                        <td><?php echo $rows['Job_Name']; ?></td>
                        <td><?php echo $rows['Company']; ?></td>
                        <td><input type="button" value=Details onclick="location.href='edit_app.php?jobname=<?php echo $job_name;?> && desc=<?php echo $description;?> && salary=<?php echo $salary;?> && company=<?php echo $company;?>'" ></td>
                        <td><input type="button" value="Remove" onclick="location.href='edit_app.php?appID=<?php echo $rows['App_ID'];?>'"></td>                    
                    </tr>      
                    
                    <script language="javascript">
                        var index=<?php echo $x?>;
                        if(index%2!=0){        
                        var r=document.getElementById("<?php echo $x;?>");
                        r.style.backgroundColor="#c7ceea";
                        }
                    </script>
                    <?php $x++; }?>
                </table>
                
                <?php }?>
                </div>
            </div>
        
        <?php
            include "includes/header.php";
        ?>
        
    </body>
    
</html>