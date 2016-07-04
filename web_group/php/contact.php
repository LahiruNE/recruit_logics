<!--This is the contact page-->
<?php 
    include '/core/init.php'; 

    if(empty($_POST)===false && $_POST['comments']!=""){
        $comment_data=array(
                        'Name'      =>$_POST['com_name'],
                        'Email'     =>$_POST['com_email'],
                        'Comment'  =>$_POST['comments']
                    );
        
        comment($comment_data);
    }    
    
?>

<html>
    <head>
        <title>Contact Us</title>
        <link type="text/css" rel="stylesheet" href="../stylesheet/style.css">
    </head>
    
    <body>          
        <div id="contact_form1">
            <h2 id="font_color"><center>We appreciate your comments and those comments are much useful for our future improvements.</center></h2>
            <form method="post" action="contact.php" id=con_form>
                <table width="1000px" id="font_color">
                    <tr>
                        <th colspan="2" id="form_titles"><h1>Leave comments here!</h1></th>                        
                    </tr>                    
                    <tr>
                        <td colspan="2">Your Name: <br /> <input type="text" name="com_name" maxlength="50" size="68"></td>
                    </tr>                   
                    <tr>
                        <td colspan="2">Email: <br /> <input type="text" name="com_email" size="68"></td>
                    </tr>
                    <tr>
                        <td colspan="2">Comments: <br /> <textarea name="comments" rows="10" cols="70"></textarea></td>
                    </tr> 
                    <tr>
                        <td colspan="2"><span id="errors"><?php if(empty($_POST)===false){if($_POST['comments']!=""){echo 'Thank you! We appreciate your comments.';}else{echo 'Please write a comment before post!';}}?></span></td>
                    </tr>                   
                    <tr>
                        <td align="center"><a name="comment"><input type="submit" name="comment" value="Send Comment" id="submit"></a></td>
                        <td><a href="#comment"><img src="../images/arrow.png" id="arrow">Read Comments</a></td>
                    </tr>                    
                </table>                   
            </form> 
            
        </div>
        <div><img src="../images/2.png" width="500px" id="contact_image"></div>
        
        <div id="contact_form2" >
            <div id=contact_inner>
                <h2 id="font_color">Comments...</h2> 
                                    
                <table id="comment_table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Comment</th>
                    </tr>
                </table>
                
                <?php
                    $comment_rows=get_comment();
                    $count=count($comment_rows);
                if($count!=0){
                ?>
                
                <script language='javascript'>
                    var array=<?php echo json_encode($comment_rows);?>;
                    var col_array=['#f3e3e3','#c7ceea','#c7ead0','#e3e49d','#e5ba94'];
                    var no_comments=<?php echo $count;?>;
                    var table = document.getElementById("comment_table");
                    var k=0;
                    
                    for(var i=0;i<no_comments;i++){                    
                        var row = table.insertRow(i+1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        cell1.innerHTML = array[i]["Name"];
                        cell2.innerHTML = array[i]["Email"];
                        cell3.innerHTML = array[i]["Comment"];
                        
                        if(k==col_array.length){
                            k=0;
                        }
                        row.style.backgroundColor=col_array[k];
                        k++;
                                                
                    }
                </script>
                <?php }?>
            </div>  
        </div>
        
        <?php
            include "includes/header.php";
        ?>
        
    </body>
    
</html>