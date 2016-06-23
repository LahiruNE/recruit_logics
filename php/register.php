<!--This is the Registration page-->
<?php
    include 'core/init.php';
    require 'core/database/connect.php';
    
    
    if(isset($_GET['success'])){       
        
        ?>

        <html>
            <head>
                <title>Registration Page</title>
                <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
            </head>
            <body>        
                <div id="register_confirm_form">
                    <img src="../images/welcome2.png" id="header_img_reg_success">
                    <center class="reg_confirm"><h1 id="reg_h3">You have registered successfully.</h1>
                        <a href="home.php" id="errors"><h3>Click here to proceed to the Home page</h3></a></center>                    
                </div>
                                
            </body>

        </html>
<?php
    }
    else{
        $errors=array();

        if(empty($_POST)===false){
            $required_fields=array('first_name','last_name','reg_id','reg_password','retype_password','email');

            foreach($_POST as $key=>$value){
                if(empty($value) && in_array($key,$required_fields)===true){
                    $errors[]='Fields marked with an asterisk are required! ';
                    break 1;
                }
            }

            if(empty($errors)){
                if(user_exists($_POST['reg_id'])===true){
                    $errors[]='Sorry, the User ID \''.$_POST['reg_id'].'\' is already taken!';
                }
                if(preg_match("/\\s/",$_POST['reg_id'])==true){
                    $errors[]='Your User ID can\'t have spaces!';
                }
                if(strlen($_POST['reg_password'])<5){
                    $errors[]='Your Passwords must have at least 5 characters!';
                }
                if($_POST['reg_password']!==$_POST['retype_password']){
                    $errors[]='Your Passwords do not match!';
                }
                if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)===false){
                    $errors[]='A valid email is required!';
                }
                if(email_exists($_POST['email'])===true){
                    $errors[]='Sorry, the \''.$_POST['email'].'\' is already in use!';
                }
            }
            if(empty($errors)){
                $register_data=array(
                    'First_Name'    =>$_POST['first_name'],
                    'Last_Name'     =>$_POST['last_name'],
                    'User_ID'       =>$_POST['reg_id'],
                    'Password'      =>$_POST['reg_password'],
                    'Email'         =>$_POST['email'],
                    'Telephone'     =>$_POST['telephone'],
                    'Gender'        =>$_POST['gender'],
                    'Educational_Level'     =>$_POST['education']
                );
                
                $user_id=$_POST['reg_id'];
                $password=$_POST['reg_password'];

                register($register_data);
                $_SESSION['id']=login($user_id,$password);
                header('Location:register.php?success');
                exit();
            }
        }
        ?>

        <! Original registration form>
        <html>
            <head>
                <title>Registration Page</title>
                <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
                
                <script type="text/javascript">
                    function checkEmpty(){
                        var input_val1=document.getElementsByName("first_name");
                        var input_val2=document.getElementsByName("last_name");
                        var input_val3=document.getElementsByName("reg_id");
                        var input_val4=document.getElementsByName("reg_password");
                        var input_val5=document.getElementsByName("retype_password");
                        var input_val6=document.getElementsByName("email");
                        
                        if(input_val1[0].value==""){input_val1[0].style.backgroundColor="red"};
                        if(input_val2[0].value==""){input_val2[0].style.backgroundColor="red"};
                        if(input_val3[0].value==""){input_val3[0].style.backgroundColor="red"};
                        if(input_val4[0].value==""){input_val4[0].style.backgroundColor="red"};
                        if(input_val5[0].value==""){input_val5[0].style.backgroundColor="red"};
                        if(input_val6[0].value==""){input_val6[0].style.backgroundColor="red"};
                    }
                </script>
                
            </head>
            
            <body>        
                <div id="register_form">
                    <form method="post" action="register.php" id=reg_form>
                        <table width="470px" id="font_color">
                            <tr>
                                <th colspan="2" id="form_titles"><h1>Sign Up</h1></th>                        
                            </tr>
                            <tr>
                                <td colspan="2" ><span id="errors"><?php foreach($errors as $value){ echo $value . ' ';}; ?></span></td>                  
                            </tr>
                            <tr>
                                <td>Full Name : <br /> First Name<span id="errors">*</span> <br /> <input type="text" name="first_name" maxlength="25" size="25"></td>
                                <td><br /> Last Name<span id="errors">*</span> <br /> <input type="text" name="last_name" maxlength="25" size="25"></td>
                            </tr>
                            <tr>
                                <td colspan="2">User ID:<span id="errors">*</span> (max length 15 charactors) <br /> <input type="text" name="reg_id" maxlength="15" size="59"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Password:<span id="errors">*</span> (max length 15 charactors) <br /> <input type="password" name="reg_password" maxlength="15" size="59"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Retype Password:<span id="errors">*</span> <br /> <input type="password" name="retype_password" maxlength="15" size="59"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Email:<span id="errors">*</span> <br /> <input type="text" name="email" size="59"></td>
                            </tr>
                            <tr>
                                <td colspan="2">Telephone: <br /> <input type="text" name="telephone" maxlength="10" size="59"></td>
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
                                <td  colspan="2" align="center"><input type="submit" name="register" value="Register" id="submit" onclick="checkEmpty()"></td>
                            </tr>

                        </table>
                    </form>
                </div>
                <div id="reg_image"><img src="../images/4.png" width="500px"></div>

                <header id="header_bar">
                    <img src="../images/logo.png" id="header_img_reg">
                </header>
            </body>

        </html>

<?php 
    }
?>