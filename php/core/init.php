<?php
    session_start();
    require '/core/functions/user.php';

    if(logged_in()===true){
        $session_user_id=$_SESSION['id'];
        $user_data=user_data($session_user_id,'ID','First_Name','Last_Name','User_ID','Password','Email','Telephone','Gender','Educational_Level');
    }
    
?>