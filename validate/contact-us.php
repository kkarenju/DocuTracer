<?php
	$name=$mail=$subject=$message="";
	
	if(isset($_POST['sendMessage'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}
    
        $name = clean($_POST['name']);
        $mail = clean($_POST['mail']);
        $subject = clean($_POST['subject']);
        $message = clean($_POST['message']);
        $date = date("Y-m-d");
        $time = date("H:i:s.u");
        
		if(!$name){
			$_SESSION['name']='true';
            header("Location:./#contact");
            echo '<script type="text/javascript"> document.location = "./#contact"; </script>';
			exit();
        }else 
        if(!$mail){
            $_SESSION['mail']='true';
            header("Location:./#contact");
            echo '<script type="text/javascript"> document.location = "./#contact"; </script>';
			exit();
        }else 
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            $_SESSION['email']='true';
            header("Location:./#contact");
            echo '<script type="text/javascript"> document.location = "./#contact"; </script>';
			exit();
        }else
		if(!$subject){
            $_SESSION['subject']='true';
            header("Location:./#contact");
            echo '<script type="text/javascript"> document.location = "./#contact"; </script>';
			exit();
        }else 
        if(!$message){
			$_SESSION['message']='true';
            header("Location:./#contact");
            echo '<script type="text/javascript"> document.location = "./#contact"; </script>';
			exit();
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
                    
                    $name=$mail=$message=$subject="";

                    $_SESSION['ContactSuccess']='true';
                    header("Location:./#contact");
                    echo '<script type="text/javascript"> document.location = "./#contact"; </script>';
                    exit();
                }else{
                    echo '<div class="error">an error occured while sending your message!</div>';
                }
            }
        
    }
?>