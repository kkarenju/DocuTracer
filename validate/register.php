<?php
    $fname=$sname=$gender=$dob=$id=$phone=$mail=$confirmMail=$pass=$confirmPass="";
    if(isset($_POST['register'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		return filter_var($str, FILTER_SANITIZE_STRING);
    	}
    
        $fname = clean($_POST['fname']);
        $sname = clean($_POST['sname']);
        $gender = $_POST['gender'];
        $dob = clean($_POST['dob']);
        $id = clean($_POST['id']);
        $phone = clean($_POST['phone']);
        $mail = clean($_POST['mail']);
        $confirmMail = clean($_POST['confirmMail']);
        $pass = clean($_POST['pass']);
        $confirmPass = clean($_POST['confirmPass']);
        $date = date("Y-m-d");
        
        if(!$fname){
            echo "<div class=\"error\"><strong>Enter your first name!</strong></div>";
        }else 
        if(!$sname){
           echo "<div class=\"error\"><strong>Enter your Surname!</strong></div>";
        }else 
        if(!$gender){
           echo "<div class=\"error\"><strong>Select gender!</strong></div>";
        }else 
        if(!$dob){
           echo "<div class=\"error\"><strong>Enter date of birth!</strong></div>";
        }else 
        /*if(!$id){
            echo "<div class=\"error\"><strong>Enter your National ID No.!</strong></div>";
        }else*/
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
        if(!$confirmMail){
           echo "<div class=\"error\"><strong>Confirm your e-mail!</strong></div>";
        }else
        if(!filter_var($confirmMail, FILTER_VALIDATE_EMAIL))
        {
            echo '<div class="error">Invalid e-mail format</div>';
        }else
        if($mail != $confirmMail){
            echo "<div class=\"error\"><strong>E-mails did not match!</strong></div>";
        }else
        if(!$pass){
            echo "<div class=\"error\"><strong>Enter Password!</strong></div>";
        }else
        if(!$confirmPass){
            echo "<div class=\"error\"><strong>Confirm your passoword!</strong></div>";
        }else
        if($confirmPass != $pass){
            echo "<div class=\"error\"><strong>Passwords did not match!</strong></div>";
        }else{
            
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
            {           
                //encrypt password with md5
                $password = md5($pass); 
                
                //generate activation code with md5
                $rid= md5(uniqid(rand(),true));
                $key=md5($rid);

                //insert user details to database
                if(!$insert = mysqli_query($conn,"INSERT INTO member (fname,sname,gender,dob,nid,phone,mail,pass,activation,date_registered)
                                            VALUES ('$fname','$sname','$gender','$dob','$id','$phone','$mail','$password','$key','$date')"))
                {
                    echo "<div class=\"warning\">".mysqli_error()."</div>";
                }else
                    {
                        $email=base64_encode($mail);

                            $to=".$mail.";
                            $subject='DocuTracer: Account Activation';
                            $message="Hello ".$fname." ,<br> 
                                    You registered at <a href='http://www.citiandbeyondcarhire.com' target='_blank'>DocuTracer</a><br>
                                    If this was you,<a href='http://www.citiandbeyondcarhire.com/activate.php?mail=$mail&key=$key' target='_blank'> click here </a> to activate your account,
                                    if not, just ignore this email.<br><br>
                                    Thank you,<br>
                                    DocuTracer<br><br>
                                    <img src='http://www.citiandbeyondcarhire.com/images/docu.jpg' style='width:100%;max-width:400px;' oncontextmune='return false'>";
                            
                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            $headers .='From:noreply@docutracer.com';
                            

                            if(mail($to,$subject,$message,$headers))
                            {
                                $fname=$sname=$gender=$dob=$id=$phone=$mail=$confirmMail=$pass=$confirmPass="";

                                $_SESSION['success']='true';
                                header("Location:register.php");
                                echo '<script type="text/javascript"> document.location = "register.php"; </script>';
                                exit();
                            }else{
                                echo '<div class="error">an error occured while sending confirmation link to: '.$mail.'. Registration was howeve successful!</div>';

                            }
                    }
            }
        } 
    }
?>
