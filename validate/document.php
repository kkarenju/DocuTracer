<?php
    $id=$bank=$type=$level=$certId=$certInstitute=$certLevel=$letterCategory=$letterId=$idCountry=
    $nid=$novelCategory=$novelTitle=$novelAuthor=$novelID=$sCategory=$sSchool=$adm=$txtID=$txtTitle=
    $txtCategory=$tdNo=$tdCountry=$transLevel= $transInstitute=$transId=$vCategory=$vId=$market=$station=
    $wId=$work=$wCountry=$wFile=$pId=$pCountry=$dl=$dlCountry="";
    
    
    /**Validate ATM**/
    if(isset($_POST['atm'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		return filter_var($str, FILTER_SANITIZE_STRING);
    	}*/
    
        $id = $_POST['acc'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $bank=$_POST['bank'];
        $type=$_POST['type'];
        
        $image = @addslashes(file_get_contents($_FILES['file']['tmp_name']));
        $file = rand()."-".$date1."-".$profileID."-".$_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $image_size = @getimagesize($_FILES['file']['tmp_name']);
        $folder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="ATM Card"){
           echo "<br> <div class=\"error\"> <strong>Document type should be: ATM Card!</strong> </div> <br>";
        }else
        if(!$id){
            echo "<br> <div class=\"error\"> <strong>Enter account number!</strong> </div> <br>";
        }else 
        if($bank==""){
           echo "<br> <div class=\"error\"> <strong>Select bank name!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query3 = "SELECT id FROM doc WHERE id='$id' AND BID='.$bank.'  AND type='$type' ";
            $result3 = mysqli_query($conn,$query3);
            $rowcount3=  mysqli_num_rows($result3);
            
            if($rowcount3 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $new_file_name = strtolower($file);
                $final_file=str_replace(' ','-',$new_file_name);

                $target_file = $folder . basename($final_file);

                if(!$image){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($image_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($target_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($file_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($file_loc,$folder.$final_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $directory=$final_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,BID,MID)
                                                VALUES ('$directory','$type','Okay','$date','$time','$id','$bank','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            $id=$bank="";
                            $_SESSION['atmSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    
    
    
    /**Validate Certficate**/
    if(isset($_POST['cert'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
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
            
            if($rowcount4 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
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
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,school,level,MID)
                                                VALUES ('$certdirectory','$type','Okay','$date','$time','$certId','$certInstitute','$certLevel','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['certSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    
    
    
    /**Validate Driving License**/
    if(isset($_POST['dl'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $dl = $_POST['dlc'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $dlCountry=$_POST['dlCountry'];
        
        
        $dlimage = @addslashes(file_get_contents($_FILES['dlFile']['tmp_name']));
        $dlfile = rand()."-".$date1."-".$profileID."-".$_FILES['dlFile']['name'];
        $dlfile_loc = $_FILES['dlFile']['tmp_name'];
        $dlfile_size = $_FILES['dlFile']['size'];
        $dlfile_type = $_FILES['dlFile']['type'];
        $dlimage_size = @getimagesize($_FILES['dlFile']['tmp_name']);
        $dlfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Driving License"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Driving License!</strong> </div> <br>";
        }else
        if(!$dl){
            echo "<br> <div class=\"error\"> <strong>Enter Driving License number!</strong> </div> <br>";
        }else 
        if($dlCountry==""){
           echo "<br> <div class=\"error\"> <strong>Select country!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $queryx = "SELECT id FROM doc WHERE id='$dl' AND country='.$dlCountry.'  AND type='$type' ";
            $resultx = mysqli_query($conn,$queryx);
            $rowcountx=  mysqli_num_rows($resultx);
            
            if($rowcount5 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $dlnew_file_name = strtolower($dlfile);
                $dlfinal_file=str_replace(' ','-',$dlnew_file_name);

                $dltarget_file = $dlfolder . basename($dlfinal_file);

                if(!$dlimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($dlimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($dltarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($dlfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($dlfile_loc,$dlfolder.$dlfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $dldirectory=$dlfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,country,MID)
                                                VALUES ('$dldirectory','$type','Okay','$date','$time','$dl','$dlCountry','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['dlSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    
    
    
    /**Validate Letter**/
    if(isset($_POST['letter'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $letterId = $_POST['letterNo'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $letterCategory=$_POST['letterCategory'];
        
        
        $letterimage = @addslashes(file_get_contents($_FILES['letterFile']['tmp_name']));
        $letterfile = rand()."-".$date1."-".$profileID."-".$_FILES['letterFile']['name'];
        $letterfile_loc = $_FILES['letterFile']['tmp_name'];
        $letterfile_size = $_FILES['letterFile']['size'];
        $letterfile_type = $_FILES['letterFile']['type'];
        $letterimage_size = @getimagesize($_FILES['letterFile']['tmp_name']);
        $letterfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Letter"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Letter!</strong> </div> <br>";
        }else
        if(!$letterId){
            echo "<br> <div class=\"error\"> <strong>Enter reference number!</strong> </div> <br>";
        }else 
        if($letterCategory==""){
           echo "<br> <div class=\"error\"> <strong>Select category!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query5 = "SELECT id FROM doc WHERE id='$id' AND category='.$letterCategory.' AND MID ='.$profileID.'  AND type='$type' ";
            $result5 = mysqli_query($conn,$query5);
            $rowcount5=  mysqli_num_rows($result5);
            
            if($rowcount5 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $letternew_file_name = strtolower($letterfile);
                $letterfinal_file=str_replace(' ','-',$letternew_file_name);

                $lettertarget_file = $letterfolder . basename($letterfinal_file);

                if(!$letterimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($letterimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($lettertarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($letterfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($letterfile_loc,$letterfolder.$letterfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $letterdirectory=$letterfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,category,MID)
                                                VALUES ('$letterdirectory','$type','Okay','$date','$time','$letterId','$letterCategory','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['letterSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    
    
    
    
    /**Validate Natioanl ID**/
    if(isset($_POST['nationalID'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $nid = $_POST['nid'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $idCountry=$_POST['nidCountry'];
        
        
        $idimage = @addslashes(file_get_contents($_FILES['idFile']['tmp_name']));
        $idfile = rand()."-".$date1."-".$profileID."-".$_FILES['idFile']['name'];
        $idfile_loc = $_FILES['idFile']['tmp_name'];
        $idfile_size = $_FILES['idFile']['size'];
        $idfile_type = $_FILES['idFile']['type'];
        $idimage_size = @getimagesize($_FILES['idFile']['tmp_name']);
        $idfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="National ID"){
           echo "<br> <div class=\"error\"> <strong>Document type should be National ID!</strong> </div> <br>";
        }else
        if(!$nid){
            echo "<br> <div class=\"error\"> <strong>Enter National ID number!</strong> </div> <br>";
        }else 
        if($idCountry==""){
           echo "<br> <div class=\"error\"> <strong>Select country!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query6 = "SELECT id FROM doc WHERE id='$id' AND country='.$idCountry.'  AND type='$type' ";
            $result6 = mysqli_query($conn,$query5);
            $rowcount6=  mysqli_num_rows($result5);
            
            if($rowcount5 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $idnew_file_name = strtolower($idfile);
                $idfinal_file=str_replace(' ','-',$idnew_file_name);

                $idtarget_file = $idfolder . basename($idfinal_file);

                if(!$idimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($idimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($idtarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($idfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($idfile_loc,$idfolder.$idfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $iddirectory=$idfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,country,MID)
                                                VALUES ('$iddirectory','$type','Okay','$date','$time','$nid','$idCountry','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['nidSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    
    
    
    
    
    /**Validate Novel**/
    if(isset($_POST['novel'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $novelID = $_POST['novelID'];
        $novelTitle = $_POST['novelTitle'];
        $novelAuthor = $_POST['novelAuthor'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $novelCategory=$_POST['novelCategory'];
        
        
        
        $novelimage = @addslashes(file_get_contents($_FILES['novelFile']['tmp_name']));
        $novelfile = rand()."-".$date1."-".$profileID."-".$_FILES['novelFile']['name'];
        $novelfile_loc = $_FILES['novelFile']['tmp_name'];
        $novelfile_size = $_FILES['novelFile']['size'];
        $novelfile_type = $_FILES['novelFile']['type'];
        $novelimage_size = @getimagesize($_FILES['novelFile']['tmp_name']);
        $novelfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Novel"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Novel!</strong> </div> <br>";
        }else
        if(!$novelID){
            echo "<br> <div class=\"error\"> <strong>Enter serial number!</strong> </div> <br>";
        }else 
        if(!$novelTitle){
            echo "<br> <div class=\"error\"> <strong>Enter title of the novel!</strong> </div> <br>";
        }else
        if(!$novelAuthor){
            echo "<br> <div class=\"error\"> <strong>Enter author of the novel!</strong> </div> <br>";
        }else
        if($novelCategory==""){
           echo "<br> <div class=\"error\"> <strong>Select category!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query7 = "SELECT id FROM doc WHERE id='$id' AND title='.$idCountry.' AND category='.$novelCategory.'  AND type='$type'  ";
            $result7 = mysqli_query($conn,$query7);
            $rowcount7=  mysqli_num_rows($result7);
            
            if($rowcount7 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $novelnew_file_name = strtolower($novelfile);
                $novelfinal_file=str_replace(' ','-',$novelnew_file_name);

                $noveltarget_file = $novelfolder . basename($novelfinal_file);

                if(!$novelimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($novelimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($noveltarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($novelfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($novelfile_loc,$novelfolder.$novelfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $noveldirectory=$novelfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,title,author,category,MID)
                                                VALUES ('$noveldirectory','$type','Okay','$date','$time','$novelID','$novelTitle','$novelAuthor','$novelCategory','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['novelSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    
    
    
    /**Validate Student ID**/
    if(isset($_POST['studentID'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $adm = $_POST['adm'];
        $sSchool = $_POST['sSchool'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $sCategory=$_POST['sCategory'];
        
        
        
        $simage = @addslashes(file_get_contents($_FILES['sFile']['tmp_name']));
        $sfile = rand()."-".$date1."-".$profileID."-".$_FILES['sFile']['name'];
        $sfile_loc = $_FILES['sFile']['tmp_name'];
        $sfile_size = $_FILES['sFile']['size'];
        $sfile_type = $_FILES['sFile']['type'];
        $simage_size = @getimagesize($_FILES['sFile']['tmp_name']);
        $sfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Student ID"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Student ID!</strong> </div> <br>";
        }else
        if(!$adm){
            echo "<br> <div class=\"error\"> <strong>Enter admission number!</strong> </div> <br>";
        }else 
        if(!$sSchool){
            echo "<br> <div class=\"error\"> <strong>Enter school name!</strong> </div> <br>";
        }else
        if($sCategory==""){
           echo "<br> <div class=\"error\"> <strong>Select category!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query8 = "SELECT id FROM doc WHERE id='$adm' AND school='.$sSchool.'  AND type='$type'  ";
            $result8 = mysqli_query($conn,$query8);
            $rowcount8=  mysqli_num_rows($result8);
            
            if($rowcount8 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $snew_file_name = strtolower($sfile);
                $sfinal_file=str_replace(' ','-',$snew_file_name);

                $starget_file = $sfolder . basename($sfinal_file);

                if(!$simage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($simage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($starget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($sfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($sfile_loc,$sfolder.$sfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $sdirectory=$sfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,school,level,MID)
                                                VALUES ('$sdirectory','$type','Okay','$date','$time','$adm','$sSchool','$sCategory','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['sidSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        }
    }else
    
    
    /**Validate Novel**/
    if(isset($_POST['text'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $txtID = $_POST['txtID'];
        $txtTitle = $_POST['txtTitle'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $txtCategory=$_POST['txtLevel'];
        
        
        
        $txtimage = @addslashes(file_get_contents($_FILES['txtFile']['tmp_name']));
        $txtfile = rand()."-".$date1."-".$profileID."-".$_FILES['txtFile']['name'];
        $txtfile_loc = $_FILES['txtFile']['tmp_name'];
        $txtfile_size = $_FILES['txtFile']['size'];
        $txtfile_type = $_FILES['txtFile']['type'];
        $txtimage_size = @getimagesize($_FILES['txtFile']['tmp_name']);
        $txtfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Text Book"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Text Book!</strong> </div> <br>";
        }else
        if(!$txtID){
            echo "<br> <div class=\"error\"> <strong>Enter serial number!</strong> </div> <br>";
        }else 
        if(!$txtTitle){
            echo "<br> <div class=\"error\"> <strong>Enter title!</strong> </div> <br>";
        }else
        if($txtCategory==""){
           echo "<br> <div class=\"error\"> <strong>Select level!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query9 = "SELECT id FROM doc WHERE id='$txtID' AND title='.$txtTitle.' AND level='.$txtCategory.'  AND type='$type'  ";
            $result9 = mysqli_query($conn,$query9);
            $rowcount9=  mysqli_num_rows($result9);
            
            if($rowcount9 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $txtnew_file_name = strtolower($txtfile);
                $txtfinal_file=str_replace(' ','-',$txtnew_file_name);

                $txttarget_file = $txtfolder . basename($txtfinal_file);

                if(!$txtimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($txtimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($txttarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($txtfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($txtfile_loc,$txtfolder.$txtfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $txtdirectory=$txtfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,title,level,MID)
                                                VALUES ('$txtdirectory','$type','Okay','$date','$time','$txtID','$txtTitle','$txtCategory','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['txtSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    
    
    
    /**Validate Title Deed**/
    if(isset($_POST['titleDeed'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $tdNo = $_POST['tdNo'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $tdCountry=$_POST['tdCountry'];
        
        
        $tdimage = @addslashes(file_get_contents($_FILES['tdFile']['tmp_name']));
        $tdfile = rand()."-".$date1."-".$profileID."-".$_FILES['tdFile']['name'];
        $tdfile_loc = $_FILES['tdFile']['tmp_name'];
        $tdfile_size = $_FILES['tdFile']['size'];
        $tdfile_type = $_FILES['tdFile']['type'];
        $tdimage_size = @getimagesize($_FILES['tdFile']['tmp_name']);
        $tdfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Title Deed"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Title Deed!</strong> </div> <br>";
        }else
        if(!$tdNo){
            echo "<br> <div class=\"error\"> <strong>Enter Title Deed number!</strong> </div> <br>";
        }else 
        if($tdCountry==""){
           echo "<br> <div class=\"error\"> <strong>Select country!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query10 = "SELECT id FROM doc WHERE id='$tdNo' AND country='.$tdCountry.' AND type='$type' ";
            $result10 = mysqli_query($conn,$query10);
            $rowcount10=  mysqli_num_rows($result10);
            
            if($rowcount10 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $tdnew_file_name = strtolower($tdfile);
                $tdfinal_file=str_replace(' ','-',$tdnew_file_name);

                $tdtarget_file = $tdfolder . basename($tdfinal_file);

                if(!$tdimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($tdimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($tdtarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($tdfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($tdfile_loc,$tdfolder.$tdfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $tddirectory=$tdfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,country,MID)
                                                VALUES ('$tddirectory','$type','Okay','$date','$time','$tdNo','$tdCountry','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['deedSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    

    /**Validate Transcript**/
    if(isset($_POST['trans'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $transId = $_POST['transNo'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $transInstitute=$_POST['transInstitute'];
        $transLevel=$_POST['transLevel'];
        
        
        $transimage = @addslashes(file_get_contents($_FILES['transFile']['tmp_name']));
        $transfile = rand()."-".$date1."-".$profileID."-".$_FILES['transFile']['name'];
        $transfile_loc = $_FILES['transFile']['tmp_name'];
        $transfile_size = $_FILES['transFile']['size'];
        $transfile_type = $_FILES['transFile']['type'];
        $transimage_size = @getimagesize($_FILES['transFile']['tmp_name']);
        $transfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Transcript"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Transcript!</strong> </div> <br>";
        }else
        if(!$transId){
            echo "<br> <div class=\"error\"> <strong>Enter admission number!</strong> </div> <br>";
        }else 
        if(!$transInstitute){
            echo "<br> <div class=\"error\"> <strong>Enter name of institution/ school!</strong> </div> <br>";
        }else 
        if($transLevel==""){
           echo "<br> <div class=\"error\"> <strong>Select transcript level!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query11 = "SELECT id FROM doc WHERE id='$transId' AND level='.$transLevel.'  AND type='$type' ";
            $result11 = mysqli_query($conn,$query11);
            $rowcount11=  mysqli_num_rows($result11);
            
            if($rowcount11 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $transnew_file_name = strtolower($transfile);
                $transfinal_file=str_replace(' ','-',$transnew_file_name);

                $transtarget_file = $transfolder . basename($transfinal_file);

                if(!$transimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($transimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($transtarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($transfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($transfile_loc,$transfolder.$transfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $transdirectory=$transfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,school,level,MID)
                                                VALUES ('$transdirectory','$type','Okay','$date','$time','$transId','$transInstitute','$transLevel','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['transcriptSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    
    
    
    
    /**Validate Voucher**/
    if(isset($_POST['voucher'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $vId = $_POST['vNo'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $vCategory=$_POST['vCategory'];
        $market=$_POST['market'];
        $station=$_POST['station'];
        
        $vimage = @addslashes(file_get_contents($_FILES['vFile']['tmp_name']));
        $vfile = rand()."-".$date1."-".$profileID."-".$_FILES['vFile']['name'];
        $vfile_loc = $_FILES['vFile']['tmp_name'];
        $vfile_size = $_FILES['vFile']['size'];
        $vfile_type = $_FILES['vFile']['type'];
        $vimage_size = @getimagesize($_FILES['vFile']['tmp_name']);
        $vfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Voucher"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Voucher!</strong> </div> <br>";
        }else
        if(!$vId){
            echo "<br> <div class=\"error\"> <strong>Enter voucher number!</strong> </div> <br>";
        }else 
        if($vCategory==""){
           echo "<br> <div class=\"error\"> <strong>Select Category!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query12 = "SELECT id FROM doc WHERE id='$vId' AND category='.$vCategory.' AND type='$type' 
                        AND SMID = '$market' OR SID='$station' ";
            $result12 = mysqli_query($conn,$query12);
            $rowcount12=  mysqli_num_rows($result12);
            
            if($rowcount12 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $vnew_file_name = strtolower($vfile);
                $vfinal_file=str_replace(' ','-',$vnew_file_name);

                $vtarget_file = $vfolder . basename($vfinal_file);

                if(!$vimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($vimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($vtarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($vfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($vfile_loc,$vfolder.$vfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $vdirectory=$vfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,category,SMID,SID,MID)
                                                VALUES ('$vdirectory','$type','Okay','$date','$time','$vId','$vCategory','$market','$station','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['voucherSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }else
    
    
    
    /**Validate Passport**/
    if(isset($_POST['passport'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $pId = $_POST['pId'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $pCountry=$_POST['pCountry'];
        
        
        $pimage = @addslashes(file_get_contents($_FILES['pFile']['tmp_name']));
        $pfile = rand()."-".$date1."-".$profileID."-".$_FILES['pFile']['name'];
        $pfile_loc = $_FILES['pFile']['tmp_name'];
        $pfile_size = $_FILES['pFile']['size'];
        $pfile_type = $_FILES['pFile']['type'];
        $pimage_size = @getimagesize($_FILES['pFile']['tmp_name']);
        $pfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Passport"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Passport!</strong> </div> <br>";
        }else
        if(!$pId){
            echo "<br> <div class=\"error\"> <strong>Enter passport number!</strong> </div> <br>";
        }else 
        if($pCountry==""){
           echo "<br> <div class=\"error\"> <strong>Select country!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query14 = "SELECT id FROM doc WHERE id='$pId' AND country='.$pCountry.'  AND type='$type' ";
            $result14 = mysqli_query($conn,$query14);
            $rowcount14=  mysqli_num_rows($result14);
            
            if($rowcount14 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $pnew_file_name = strtolower($pfile);
                $pfinal_file=str_replace(' ','-',$pnew_file_name);

                $ptarget_file = $pfolder . basename($pfinal_file);

                if(!$pimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($pimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($ptarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($pfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($pfile_loc,$pfolder.$pfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $pdirectory=$pfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,country,MID)
                                                VALUES ('$pdirectory','$type','Okay','$date','$time','$pId','$pCountry','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['passportSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    } else 
        
        
     /**Validate Work**/
    if(isset($_POST['work'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        /*function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysqli_real_escape_string($conn,$str);
    	}*/
    
        $type=$_POST['type'];
        $wId = $_POST['wId'];
        $date = date("Y-m-d");
        $date1 = date("Ymd");
        $time = date("H:i:s.u");
        $work = $_POST['work'];
        $wCountry = $_POST['wCountry'];
        
       
        
        $wimage = @addslashes(file_get_contents($_FILES['wFile']['tmp_name']));
        $wfile = rand()."-".$date1."-".$profileID."-".$_FILES['wFile']['name'];
        $wfile_loc = $_FILES['wFile']['tmp_name'];
        $wfile_size = $_FILES['wFile']['size'];
        $wfile_type = $_FILES['wFile']['type'];
        $wimage_size = @getimagesize($_FILES['wFile']['tmp_name']);
        $wfolder="../uploads/documents/";
        
        if($type==""){
           echo "<br> <div class=\"error\"> <strong>Select document type!</strong> </div> <br>";
        }else
        if($type!=="Work ID"){
           echo "<br> <div class=\"error\"> <strong>Document type should be Work ID card!</strong> </div> <br>";
        }else
        if(!$wId){
            echo "<br> <div class=\"error\"> <strong>Enter staff number!</strong> </div> <br>";
        }else
        if(!$work){
            echo "<br> <div class=\"error\"> <strong>Enter place of work/ employer!</strong> </div> <br>";
        }else
        if($wCountry==""){
           echo "<br> <div class=\"error\"> <strong>Select Country!</strong> </div> <br>";
        }else
            {
            
            //check for duplicate e-mail
            $query13 = "SELECT id FROM doc WHERE id='$wId' AND work='.$work.' AND type='$type' ";
            $result13 = mysqli_query($conn,$query13);
            $rowcount13=  mysqli_num_rows($result13);
            
            if($rowcount13 > 0){
                echo '<br> <div class="warning"><strong>The document already exists!</strong></div> <br>';
            }else    
            {  
                // make file name in lower case
                $wnew_file_name = strtolower($wfile);
                $wfinal_file=str_replace(' ','-',$wnew_file_name);

                $wtarget_file = $wfolder . basename($wfinal_file);

                if(!$wimage){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($wimage_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($wtarget_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($wfile_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($wfile_loc,$wfolder.$wfinal_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $wdirectory=$wfinal_file;
                
                    //insert document details to database
                    if(!$insert = mysqli_query($conn,"INSERT INTO doc (pic,type,status,date_registered,time_registered,id,work,country,MID)
                                                VALUES ('$wdirectory','$type','Okay','$date','$time','$wId','$work','$wCountry','$profileID')"))
                    {
                        echo "<div class=\"warning\">".mysqli_error()."</div>";
                    }else
                        {
                            
                            $_SESSION['workSuccess']='true';
                            header("Location:index.php");
                            echo '<script type="text/javascript"> document.location = "index.php"; </script>';
                            exit();
                        }
                }    
            }
        } 
    }    
        
?>
