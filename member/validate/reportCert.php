<?php
    /**Validate Certficate**/
    if(isset($_POST['cert'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		return filter_var($str, FILTER_SANITIZE_STRING);
    	}*/
    
        $type=$_POST['type'];
        $f1 = $_POST['fname1'];
        $s1 = $_POST['sname1'];
        $certId = $_POST['certNo'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $certInstitute=$_POST['certInstitute'];
        $certLevel=$_POST['certLevel'];
        
        
        $certimage = @addslashes(file_get_contents($_FILES['certFile']['tmp_name']));
        $certfile = rand()."-".$date1."-".$profileID."-".$_FILES['certFile']['name'];
        $certfile_loc = $_FILES['certFile']['tmp_name'];
        $certfile_size = $_FILES['certFile']['size'];
        $certfile_type = $_FILES['certFile']['type'];
        $certimage_size = @getimagesize($_FILES['certFile']['tmp_name']);
        $certfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Certificate"){
           echo "<br> <div class=\"error\"> <strong>Document type should be certificate!</strong> </div> <br>";
        }else
        if(!$f1){
            echo "<br> <div class=\"error\"> <strong>Enter firstname!</strong> </div> <br>";
        }else
        if(!$s1){
            echo "<br> <div class=\"error\"> <strong>Enter surname!</strong> </div> <br>";
        }else
        if(!$certId){
            echo "<br> <div class=\"error\"> <strong>Enter certificate number!</strong> </div> <br>";
        }else 
        if(!$certInstitute){
            echo "<br> <div class=\"error\"> <strong>Enter name of institution/ school!</strong> </div> <br>";
        }else 
        if($certLevel==""){
           echo "<br> <div class=\"error\"> <strong>Select certificate level!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query4 = "SELECT id FROM doc WHERE id='$id' AND level='.$certLevel.'  AND type='$type' ";
            $result4 = mysqli_query($conn,$query4);
            $rowcount4=  mysqli_num_rows($result4);
            
            //check for matching lost documents
            $query3 = "SELECT COUNT(m.MID) AS num,m.fname,m.mail
                        FROM doc d 
                        LEFT JOIN member m
                            ON d.MID = m.MID
                        WHERE d.id='$id'
                        AND d.level='$certLevel'
                        AND d.type='$type' ";
            $result3 = mysqli_query($conn,$query3);
            $rowcount3=  mysqli_num_rows($result3);
            
            while ($row = mysqli_fetch_array($result3)) {
                $name=$row['fname'];
                $mail=$row['mail'];
            }
            
               
             
                // make file name in lower case
                $certnew_file_name = strtolower($certfile);
                $certfinal_file=str_replace(' ','-',$certnew_file_name);

                $certtarget_file = $certfolder . basename($certfinal_file);

                if(!$certimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($certimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($certtarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($certfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($certfile_loc,$certfolder.$certfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $certdirectory=$certfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO found (pic,type,fname,sname,state,date_reported,time_reported,id,school,level,MID)
                                                VALUES ('$certdirectory','$type','$f1','$s1','1','$date','$time','$certId','$certInstitute','$certLevel','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['certSuccess']='true';
                            header("Location:report.php");
                            echo '<script type="text/javascript"> document.location = "report.php"; </script>';
                            exit();
                        }
                }    
            
        } 
    }
?>
