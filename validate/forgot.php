<?php
    $mail="";
    if(isset($_POST['submit'])){
        $mail=  mysqli_real_escape_string($conn,$_POST['mail']);
        
        if($mail){
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $sql=mysqli_query($conn,"select mail,fname,MID from member where mail='$mail' ") or die (mysqli_error());
                $q=  mysqli_affected_rows($conn);
                if($q<1){
                    echo '<div class="error">email address did not match</div>';
                }else 
                if($q > 1){
                    echo'<div class="error">duplicate email addresses found</div>';
                }else 
                    if($q == 1){
                        $res=mysqli_fetch_array($sql);
                        
                        $id=$res['uid'];
                        
                        $rid= md5(uniqid(rand(),true));
                        
                        
                        $key=md5($rid);
                        $sql=mysqli_query($conn,"UPDATE member SET activation1='$key' where MID='$id' ") or die (mysqli_error());
                        
                        
                        $email=base64_encode($mail);
                        
                        $name=$res['fname'];
                        
                        $to=$res['mail'];
                        $subject='DocuTracer: Password Reset';
                        $message="Hello $name,<br> 
                                Someone requested to reset your password.<br>
                                If this was you,<a href='http://www.aforcf.org/reset.php?mail=$email&key=$key'>click here</a>to reset your password,
			        if not just ignore this email.<br><br>
			        Thank you,<br>
                                DocuTracerDocuTracer<br><br>
                                <img src='http://www.aforcf.org/images/docu.jpg' style='width:100%;max-width:400px;' oncontextmune='return false'>";
                            

			// Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        
                        $headers .='From:noreply@docutracer.com';
                        $m=mail($to,$subject,$message,$headers);
                            
                        if($m)
                        {
                            $mail="";
                            $_SESSION['new']='true';
                            header("Location:forgot.php");
                            echo "<script type='text/javascript'> document.location = 'forgot.php'; </script>";
                            exit();
                            
                        }else   {echo "<div class=\"eror\">an error occured while sending to email!</div>";}
                    }          
        }else {echo'<div class="error">invalid e-mail format</div>';}
        }else {echo'<div class="error">enter your e-mail</div>';}
    }
?>