<?php
    include '/core/init.php'; 

         
        if(isset($_GET['userID'])){
            echo'<script language ="javascript">';
            echo'alert("Selected user will be removed!")';
            echo'</script>'; 
            remove_user($_GET['userID']);
        } 
        
        ?>  

<html>
    <head>
        <title>Users</title>
        <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
    </head>
    
    <body class="log">        
        <div id="user_form">
            <div id="form_inner">
                <img src=../images/users.png>
     <?php  if(empty($user_data)===false){ 
                if($user_data['User_Category']=='admin'){?>           
                <h2 id="font_color">&nbsp;&nbsp;&nbsp;Registered Users</h2>
            
                <table id="jobs_table">
                    <tr>
                        <th>User_ID</th>
                        <th>First_Name</th>
                        <th>Last_Name</th>
                        <th>Emaily</th>
                        <th>Telephone</th>
                        <th>DOB</th>
                    </tr>               
                
                <?php
                    $user_rows=get_users(); 
                    $x=1;
                    while($rows=mysqli_fetch_assoc($user_rows)){
                ?>               
                    <tr id="<?php echo $x;?>">
                        <td><?php echo $rows['ID']; ?></td>
                        <td><?php echo $rows['First_Name']; ?></td>
                        <td><?php echo $rows['Last_Name']; ?></td>
                        <td><?php echo $rows['Email']; ?></td>
                        <td><?php echo $rows['Telephone']; ?></td>
                        <td><?php echo $rows['DOB']; ?></td>
                        <td><input type="button" value="Remove" onclick="location.href='edit_user.php?userID=<?php echo $rows['ID'];?>'"></td>                    
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
                <?php }else{?>   
                
                <center><h1 id="font_color">You have no priviledge to view registered user details!</h1>         
                        <img src="../images/error.png">
                </center>           
        
        <?php }}else{?>
                
                <center><h1 id="font_color">You have no priviledge to view registered user details!</h1>         
                        <img src="../images/error.png">
                </center>
        <?php }?>
                </div>

            </div>            
        </div>
        
        <?php
            include "includes/header.php";
        ?>
        
    </body>
    
</html>