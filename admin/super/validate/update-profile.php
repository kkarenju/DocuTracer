<?php
    $passw="";
    if(isset($_POST['update'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		return filter_var($str, FILTER_SANITIZE_STRING);
    	}
    
        //$fname = clean($_POST['fname']);
        $phone = clean($_POST['phone']);
        $mail = clean($_POST['mail']);
        $passw = clean($_POST['pass']);
        
        if(!$phone){
            echo "<div class=\"error\"><strong>Enter your Phone No.!</strong></div>";
        }else
        if(!$mail){
            echo "<div class=\"error\"><strong>Enter your e-mail!</strong></div>";
        }else
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            echo '<div class="error">Invalid e-mail format</div>';
        }else
        if(!$passw){
            echo "<div class=\"error\"><strong>Enter Password!</strong></div>";
        }else
        {
            /*
            //check for duplicate National ID
            $query1 = "SELECT nid FROM member WHERE nid='$id' ";
            $result = mysqli_query($conn,$query1);
            $rowcount=  mysqli_num_rows($result);
            
            //check for duplicate phone number
            $query2 = "SELECT phone FROM member WHERE phone='$phone' ";
            $result2 = mysqli_query($conn,$query2);
            $rowcount2=  mysqli_num_rows($result2);
            
            //check for duplicate e-mail
            $query3 = "SELECT mail FROM member WHERE mail='$mail' ";
            $result3 = mysqli_query($conn,$query3);
            $rowcount3=  mysqli_num_rows($result3);
            
            if($rowcount > 0){
                echo '<div class="warning"><strong>The National ID number is taken!</strong></div>';
            }else
            if($rowcount2 > 0){
                echo '<div class="warning"><strong>The Phone number is taken!</strong></div>';
            }else 
            if($rowcount3 > 0){
                echo '<div class="warning"><strong>The e-mail address is taken!</strong></div>';
            }else    
            {  */         
                //encrypt password with md5
                $password = md5($pass); 
                

                //insert user details to database
                if(!$insert = mysqli_query($conn,"UPDATE member SET fname='$fname',sname='$sname',gender='$gender',
                                      dob='$dob',nid='$id',phone='$phone',mail='$mail' WHERE MID='$profileID' "))
                {
                    echo "<div class=\"warning\">".mysqli_error($conn)."</div>";
                }else
                    {
                       $passw="";

                        $_SESSION['UpdateSuccess']='true';
                        header("Location:update-profile");
                        echo '<script type="text/javascript"> document.location = "update-profile"; </script>';
                        exit();
                           
                    }
            //}
        } 
    }
?>
