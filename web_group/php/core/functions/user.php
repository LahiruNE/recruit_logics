<?php
    function user_data($id){
        require '/core/database/connect.php'; 
        $user_data=array();
        $id=(int)$id;
        
        $func_num_args=func_num_args();
        $func_get_arg=func_get_args();
        
        if($func_num_args>1){
            unset($func_get_arg[0]);
            $fields=implode(',',$func_get_arg);
            $user_data=mysqli_fetch_assoc(mysqli_query($con,"SELECT $fields FROM user_details  WHERE ID=$id"));
            
            return $user_data;
        }     
        
    }

    function logged_in(){
        
        if(isset($_SESSION['id'])){
            return true;
        }
        else{
            return false;
        }
    }
    
    function user_exists($user_id){
        require '/core/database/connect.php';        
        $user_array1=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ID) FROM user_details WHERE User_ID='$user_id'"));
        
        if($user_array1[0]==1){
            return true;
        }
        else{
            return false;
        }
    }

    function login($user_id,$password){
        require '/core/database/connect.php'; 
        $id_array=mysqli_fetch_array(mysqli_query($con,"SELECT ID FROM user_details WHERE User_ID='$user_id'"));
        $id= $id_array[0];
        
        $user_array2=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ID) FROM user_details WHERE User_ID='$user_id' and Password='$password'"));
        
        if($user_array2[0]==1){
            return $id;
        }
        else{
            return false;
        }
    }

    function email_exists($email){
        require '/core/database/connect.php';        
        $user_array1=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ID) FROM user_details WHERE Email='$email'"));
        
        if($user_array1[0]==1){
            return true;
        }
        else{
            return false;
        }
    }

    function register($register_data){
        require '/core/database/connect.php';
  
        $data='\''.implode('\',\'',$register_data).'\'';
        $fields=implode(',',array_keys($register_data));
        
        mysqli_query($con,"INSERT INTO user_details ($fields) VALUES ($data)");
    }

    function change_settings($id,$fields,$change_data){
        require '/core/database/connect.php';
  
        
        print_r ($fields);
        mysqli_query($con,"UPDATE user_details SET $fields[0]='$change_data[0]',$fields[1]='$change_data[1]',$fields[2]='$change_data[2]',$fields[3]='$change_data[3]',$fields[4]='$change_data[4]',$fields[5]='$change_data[5]',$fields[6]='$change_data[6]',$fields[7]='$change_data[7]',$fields[8]='$change_data[8]' where ID=$id");
    }

    function comment($comment_data){
        require '/core/database/connect.php';
  
        $data='\''.implode('\',\'',$comment_data).'\'';
        $fields=implode(',',array_keys($comment_data));
        
        mysqli_query($con,"INSERT INTO comments ($fields) VALUES ($data)");
    }

    function get_comment(){
        require '/core/database/connect.php';
        
        $comment_query=mysqli_query($con,"SELECT * FROM comments");
        
        while($rows=mysqli_fetch_assoc($comment_query)){
            $row_array[]=$rows;
        }
        
        if(empty($row_array)===false){
            return $row_array;
        }
    }

    function get_jobs($cat){
        require '/core/database/connect.php';
        
        $query=mysqli_query($con,"SELECT * FROM jobs WHERE Job_category='$cat'");   
        
        return $query;       
    }

    function submit_app($id,$count){
        require '/core/database/connect.php';
        
        $exist=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(App_ID) FROM job_applications WHERE User_ID=$id && Job_ID=$count"));
        
        if($exist[0]==0){
            mysqli_query($con,"INSERT INTO job_applications (User_ID,Job_ID) VALUES ($id,$count)");
        }
    }

    function get_apps($cat,$id){
        require '/core/database/connect.php';
        if($cat=="admin"){
            $query=mysqli_query($con,"SELECT * FROM user_details,jobs,job_applications WHERE jobs.Job_ID = job_applications.Job_ID && user_details.ID=job_applications.User_ID");
        }else{
            $query=mysqli_query($con,"SELECT * FROM user_details,jobs,job_applications WHERE ID='$id' && jobs.Job_ID = job_applications.Job_ID && user_details.ID=job_applications.User_ID");}
                      
       return $query;    
    }

    function get_users(){
        require '/core/database/connect.php';
        
        $query=mysqli_query($con,"SELECT * FROM user_details");
                      
       return $query;    
    }

    function remove_apps($id){
        require '/core/database/connect.php';
        mysqli_query($con,"DELETE FROM job_applications WHERE App_ID = '$id'");
    }

    function remove_user($id){
        require '/core/database/connect.php';
        mysqli_query($con,"DELETE FROM user_details WHERE ID = '$id'");
    }

    function remove_job($id){
        require '/core/database/connect.php';
        mysqli_query($con,"DELETE FROM jobs WHERE Job_ID = '$id'");
    }

    function  add_job($job_name,$category,$company,$description,$salary){
        require '/core/database/connect.php';
        
        mysqli_query($con,"INSERT INTO jobs (Job_Name,Job_Category,Company,Description,Salary) VALUES ('$job_name','$category','$company','$description','$salary')");
    }
?>
