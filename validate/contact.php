<?php
    $subject=$message="";
    if(isset($_POST['send'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		return filter_var($str, FILTER_SANITIZE_STRING);
    	}
    
        $subject = clean($_POST['subject']);
        $message = clean($_POST['message']);
        $date = date("Y-m-d");
        $time = date("H:i:s.u");
        
        if(!$subject){
            echo "<div class=\"error\"><strong>Enter subject of your message!</strong></div><br>";
        }else 
        if(!$message){
           echo "<div class=\"error\"><strong>Enter your message!</strong></div><br>";
        }else     
            {           
                //send message to database, for live chat to database
                if(!$insert = mysqli_query($conn,"INSERT INTO chat (subject,message,state,date,time,MID)
                                            VALUES ('$subject','$message','1','$date','$time','$profileID')"))
                {
                    echo "<div class=\"warning\">".mysqli_error()."</div>";
                }else
                    {
                            $to="docutracer@sakasolutions.com";
                            $subject=".$subject.";
                            $message=".$message.<br><br>
                                    <img src='http://www.aforcf.org/uploads/profile/".$profilePic."' style='width:100%;max-width:200px;' oncontextmune='return false'>";
                            
                            // Always set content-type when sending HTML email
                            $headers = "MIME-Version: 1.0" . "\r\n";
                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                            $headers .="From: ".$profileMail."";
                            $m=mail($to,$subject,$message,$headers);

                            if($m)
                            {
                                $message=$subject="";

                                $_SESSION['ContactSuccess']='true';
                                header("Location:contact.php");
                                echo '<script type="text/javascript"> document.location = "contact.php"; </script>';
                                exit();
                            }else{
                                echo '<div class="error">an error occured while sending your message!</div>';

                            }
                    }
            }
        
    }
        
    
?>
