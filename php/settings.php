<!--This is the User account settings page-->
<?php 
    include '/core/init.php';
    require 'core/database/connect.php';

    $errors=array();
    $change_data=array();

       if(empty($_POST)===false){
           $fields=array('First_Name','Last_Name','User_ID','Password','Email','Telephone','Gender','Educational_Level');
            
            if(user_exists($_POST['reg_id'])===true && empty($_POST['reg_id'])==false){
                $errors[]='Sorry, the User ID \''.$_POST['reg_id'].'\' is already taken!';
            }
            if(preg_match("/\\s/",$_POST['reg_id'])==true && empty($_POST['reg_id'])==false){
                $errors[]='Your User ID can\'t have spaces!';
            }
            if(strlen($_POST['reg_password'])<5 && empty($_POST['reg_password'])==false){
                $errors[]='Your Passwords must have at least 5 characters!';
            }
            if($_POST['reg_password']!==$_POST['retype_password'] && empty($_POST['reg_password'])==false){
                $errors[]='Your Passwords do not match!';
            }
            if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)===false && empty($_POST['email'])==false){
                $errors[]='A valid email is required!';
            }
            if(email_exists($_POST['email'])===true && empty($_POST['email'])==false){
                $errors[]='Sorry, the \''.$_POST['email'].'\' is already in use!';
            }
            
            if(empty($errors)){                
               if(empty($_POST['first_name'])===false){
                   $change_data[0]=$_POST['first_name'];
                }
                else{
                $change_data[0]=$user_data["First_Name"]; 
                }
                
                if(empty($_POST['last_name'])===false){
                    $change_data[1]=$_POST['last_name'];
                }
                else{
                   $change_data[1]=$user_data["Last_Name"]; 
                }
                
                if(empty($_POST['reg_id'])===false){
                    $change_data[2]=$_POST['reg_id'];
                }
                else{
                   $change_data[2]=$user_data["User_ID"]; 
                }
                
                if(empty($_POST['reg_password'])===false){
                    $change_data[3]=$_POST['reg_password'];
                }
                else{
                   $change_data[3]=$user_data["Password"]; 
                }
                
                if(empty($_POST['email'])===false){
                    $change_data[4]=$_POST['email'];
                }
                else{
                   $change_data[4]=$user_data["Email"]; 
                }
                
                if(empty($_POST['telephone'])===false){
                    $change_data[5]=$_POST['telephone'];
                }
                else{
                   $change_data[5]=$user_data["Telephone"]; 
                }
                
                if(empty($_POST['gender'])===false){
                    $change_data[6]=$_POST['gender'];
                }
                else{
                   $change_data[6]=$user_data["Gender"]; 
                }
                
                if(empty($_POST['education'])===false){
                    $change_data[7]=$_POST['education'];
                }
                else{
                   $change_data[7]=$user_data["Educational_Level"]; 
                }
                
                $id=$_SESSION['id'];
                                
                change_settings($id,$fields,$change_data);
                                
                header('Location:settings.php');
                exit();
            }
        }   
?>

<html>
    <head>
        <title>My Account</title>
        <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
    </head>
    
    <body class="log">        
        <div id="setting_form">
            <div id="form_inner">
                <img src=../images/settings.png>
                
    <?php
    if(empty($user_data)===false){ 
                ?>
                <table id="setting_table">
                    <tr>
                        <td colspan=""><h2>Welcome <?php echo $user_data["First_Name"]?>...</h2></td>
                    </tr>
                    <tr>
                        <td><strong>Fist Name :</strong> <?php echo $user_data["First_Name"];?></td>
                        <td><strong>Last Name :</strong> <?php echo $user_data["Last_Name"];?></td>
                    </tr>
                    <tr>
                        <td><strong>User ID :</strong> <?php echo $user_data["User_ID"];?></td>
                        <td><strong>Password :</strong> <?php echo $user_data["Password"];?></td>
                    </tr>
                    <tr>
                        <td><strong>Email :</strong> <?php echo $user_data["Email"];?></td>
                        <td><strong>Telephone :</strong> <?php echo $user_data["Telephone"];?></td>
                    </tr>
                    <tr>
                        <td><strong>Gender :</strong> <?php echo $user_data["Gender"];?></td>
                        <td><strong>Educational Level :</strong> <?php echo $user_data["Educational_Level"];?></td>
                    </tr>
                </table>
                
    <?php }
        else{    
        ?>
                <table id="setting_table">
                    <tr>
                        <td colspan=""><h1>Please log in to the system!</h1></td>
                    </tr>
                    <tr><td><img src="../images/error.png" id="error_img"></td></tr>
                </table>
    <?php }?>
            
            </div>            
            <div id="change_setting_form">
    <?php
        if(empty($user_data)===false){ 
        ?>
                    <form method="post" action="settings.php" id=change_form>
                        <table width="800px" id="font_color">
                            <tr>
                                <th colspan="2" id="form_titles"><h3>Change account setings</h3></th>                        
                            </tr>
                            <tr>
                                <td colspan="2" ><span id="errors"><?php foreach($errors as $value){ echo $value . ' ';}; ?></span></td>                  
                            </tr>
                            <tr>
                                <td>Full Name : <br /> First Name <br /> <input type="text" name="first_name" maxlength="25" size="51" placeholder="<?php echo $user_data["First_Name"]?>"></td>
                                <td><br /> Last Name <br /> <input type="text" name="last_name" maxlength="25" size="51" placeholder="<?php echo $user_data["Last_Name"]?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">User ID: (max length 15 charactors) <br /> <input type="text" name="reg_id" maxlength="15" size="108" placeholder="<?php echo $user_data["User_ID"]?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Password: (max length 15 charactors) <br /> <input type="password" name="reg_password" maxlength="15" size="108" placeholder="<?php echo $user_data["Password"]?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Retype Password: <br /> <input type="password" name="retype_password" maxlength="15" size="108" placeholder="<?php echo $user_data["Password"]?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Email: <br /> <input type="text" name="email" size="108" placeholder="<?php echo $user_data["Email"]?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Telephone: <br /> <input type="text" name="telephone" maxlength="10" size="108" placeholder="<?php echo $user_data["Telephone"]?>"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Gender: <br /> <input type="radio" name="gender" value="Male">Male <input type="radio" name="gender" value="Male">Female 
                            </tr>
                            <tr>
                                <td colspan="2">Educational Level: <br />
                                    <select name="education">
                                        <option value="Ordinary_Level">Ordinary Level</option>
                                        <option value="Advance_level">Advance Level</option>
                                        <option value="Undergraduate">Under Greaduate</option>
                                        <option value="Graduate">Graduate</option>
                                        <option value="Post_graduate">Post Graduate</option>
                                    </select>
                                </td>
                            </tr>                    
                            <tr>
                                <td  colspan="2" align="center"><input type="submit" name="register" value="Submit Changes" id="submit" onclick="checkEmpty()"></td>
                            </tr>

                        </table>
                    </form>
            <?php }
        
        ?>
                </div>
        </div>
                
        <?php
            include "includes/header.php";
        ?>
        
    </body>
    
</html>