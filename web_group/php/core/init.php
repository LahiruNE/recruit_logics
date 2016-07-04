<?php
    session_start();
    require '/core/functions/user.php';
    require '/core/database/connect.php';

    if(logged_in()===true){
        $session_user_id=$_SESSION['id'];
        $user_data=user_data($session_user_id,'ID','User_Category','First_Name','Last_Name','User_ID','Password','Email','DOB','Telephone','Gender','Educational_Level');
    }
    
?>