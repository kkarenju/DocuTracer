<?php
    $mail="";
    if(isset($_POST['submit'])){
        $mail=  mysqli_real_escape_string($conn,$_POST['mail']);
        
        if($mail){
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $sql=mysqli_query($conn,"select mail,fname,AID from admin where mail='$mail' ") or die (mysqli_error());
                $q=  mysqli_affected_rows($conn);
                if($q<1){
                    echo '<div class="error">E-mail address did not match</div>';
                }else 
                if($q > 1){
                    echo'<div class="error">Duplicate email addresses found</div>';
                }else 
                    if($q == 1){
                        $res=mysqli_fetch_array($sql);
                        
                        $id=$res['AID'];
                        
                        $rid= md5(uniqid(rand(),true));
                        
                        
                        $key=md5($rid);
                        $sql=mysqli_query($conn,"UPDATE admin SET activation='$key' where AID='$id' ") or die (mysqli_error());
                        
                        
                        $email=base64_encode($mail);
                        
                        $name=$res['fname'];
                        
                        $to=$res['mail'];
                        $subject='Password Reset|DocuTracer|Saka Solutions';
                        $message="Hello $name,<br> 
                                Someone requested to reset your admin password.<br>
                                If this was you,<a href='http://www.sakasolutions.com.com/docutracer/admin/reset.php?mail=$email&key=$key'>click here</a>to reset your password,
			        if not just ignore this email.<br><br>
			        Thank you,<br><br>
                                DocuTracer | Saka Solutions<br><br>
                                <img src='http://www.sakasolutions.com/docutracer/images/docu.jpg' style='width:100%;max-width:400px;' oncontextmune='return false'>";
                            

			// Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        
                        $headers .='From:noreply@docutracer.sakasolutions.com';
                       
                            
                        if(mail($to,$subject,$message,$headers))
                        {
                            $mail="";
                            $_SESSION['new']='true';
                            header("Location:forgot.php");
                            echo "<script type='text/javascript'> document.location = 'forgot.php'; </script>";
                            exit();
                            
                        }else   {echo "<div class=\"eror\">An error occured while sending to email!</div>";}
                    }          
        }else {echo'<div class="error">Invalid e-mail format</div>';}
        }else {echo'<div class="error">Enter your e-mail</div>';}
    }
?>