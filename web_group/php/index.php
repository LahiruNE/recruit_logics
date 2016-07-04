<!--This is the log in page-->
<?php
    include 'core/init.php';
    
    $errors=array();

    if(empty($_POST)===false){        
        $user_id=$_POST["id"];
        $password=$_POST["password"];
        
        if(empty($user_id)===true || empty($password)===true){?>
            <script language='javascript'>
                alert("Enter User ID and Password!") ;
            </script>
    <?php
        }
        else if(user_exists($user_id)===false){?>
            <script language='javascript'>
                alert("Invalid User ID!") ;
            </script>
    <?php
        }
        else{
            $login=login($user_id,$password);
            
            if($login==false){?>
                <script language='javascript'>
                alert("Invalid User ID/Password combination!") ;
            </script>
    <?php
            }
            else{
                $_SESSION['id']=$login;                
                header('Location:home.php');
                exit();
            }
        }        
                
        }    
?>

<html>    
    <head>
        <title>LogIn Page</title>
        <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
        
        <script laguage='javacript'>
            function checkEmpty(){
                var input_val1=document.getElementsByName("id");
                var input_val2=document.getElementsByName("password");
                if(input_val1[0].value==""){
                    input_val1[0].style.backgroundColor="red";
                }
                if(input_val2[0].value==""){
                    input_val2[0].style.backgroundColor="red";
                }
            }
        </script>
        
    </head>
    
    <body>        
        <div id=head_logo><img src="../images/logo.png"></div>
        <div id="login_form">
            <form action=index.php method="post" id=log_form>
                <table width="320px" id="font_color" >
                    <tr>
                        <th colspan="2" id="form_titles"><h1>Log In</h1></th>                        
                    </tr>                    
                    <tr>
                        <td>User ID</td>
                        <td><input type="text" name="id" maxlength="15" size="30"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" maxlength="15" size="30"></td>
                    </tr>
                    <tr>
                        <td  colspan="2" align="center"><input type="submit" value="Sign In" id="submit" name="submit" onclick="checkEmpty()"></td>
                    </tr>                                        
                    <tr>
                        <td align="center" colspan="2">Still don't have an account? &nbsp;<input type="button" value="Register Now" onclick= "reg_prompt()"></td>
                    </tr>
                    <tr>                        
                        <td align="center" colspan="2">Forgot Password? &nbsp;<input type="button" value="Recover Password" onclick= "pass_prompt()"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><a href="home.php"><img src="../images/guest.png" id="guest_img"><center>Visit as a guest</center></a></td>                        
                    </tr>
                </table>
            </form>
        </div>
        <div id="log_image"><img src="../images/3.png" width="500px"></div>       
    </body>
    
    <script language="javascript">
        function reg_prompt(){
            window.location="register.php";
        }
    
        function pass_prompt(){
            window.location="../html/f_password.html";
        }
    </script>
</html>
