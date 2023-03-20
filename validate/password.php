<?php  
    $current=$new=$confirm="";
    if(isset($_POST['update']))
    {
        $current = mysqli_real_escape_string($conn,$_POST['current']);
        $new = mysqli_real_escape_string($conn,$_POST['new']);
        $confirm = mysqli_real_escape_string($conn,$_POST['confirm']);
        
        if($current){
            if($new){
                if($confirm){
                    if($new==$confirm){
                        $cp=md5($current);
                        $np=md5($new);
                        if(!$result = mysqli_query($conn,"SELECT pass FROM member where MID='$profileID'")){
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                        }
                        else{
                            while ($row = mysqli_fetch_array($result)) {
                                if($cp==$row['pass']){
                                    if(!$insert = mysqli_query($conn,"UPDATE member SET pass='$np' WHERE MID='$profileID'")){
                                    echo "<div class=\"warning\">".mysqli_error()."</div>";
                                    }
                                    else{
                                            $current=$new=$confirm="";
                                            
                                            $_SESSION['success']="true";
                        
                                            header('Location:update-pass.php?id='.$profileID);
                                            echo "<script type='text/javascript'> document.location = 'update-pass.php?id=$profileID'; </script>";
                                            exit();
                                            
                                        }
                                }else {echo '<div class="error">Incorrect current passowrd!</div>';}
                            }
                        }
                    
                    
                    }else {echo '<div class="error">Passwords did not match</div>';}
                }else {echo '<div class="error"> Confirm new password</div>';}
            }else {echo '<div class="error"> Enter new password</div>';}
        }else {echo '<div class="error"> Enter current password</div>';}
       
    }  
?>