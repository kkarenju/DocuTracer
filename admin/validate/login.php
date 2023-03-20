<?php
    
    $username=$pass="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		return filter_var($str, FILTER_SANITIZE_STRING);
    	}
        /*end of function*/
        
        $username = clean($_POST['username']);
        $pass = clean($_POST['password']);
        
        if(!$username){
            echo '<div class="error"> Enter username</div>';
        }else
        if(!$pass){
            echo '<div class="error"> Enter password</div>';
        }else 
        {
            $password=md5($pass);
            $qry="SELECT AID,type FROM admin WHERE pass='".$password."' AND mail='".$username."' ";
            $result=mysqli_query($conn,$qry); 
            $num=mysqli_num_rows($result);
            
        
            //Check whether the query was successful or not
            if($result) {
    		if($num > 1) {
                    echo '<div class="error">duplicate user found</div>';
                }
                else if($num < 1){
                    echo '<div class="error">invalid username / password</div>';
                }
                else if($num ==1){
                    while ($row = mysqli_fetch_array($result)) {
                        $username=$pass="";
                        $_SESSION['aid'] = $row['AID'];
                        $type = $row['type'];
                    }
                        if($type=="Super"){
                            header('Location:includes/super/header.php');
                            header('Location:includes/header_1.php');
                            header('Location:../member/includes/header.php');
                            header('Location:../includes/header.php');
                            header('Location:../includes/header_1.php');
                            header('Location:super/index.php');
                            echo "<script type='text/javascript'> document.location = 'super/index.php'; </script>";
                            exit();
                        }
                        
                        
                    
                }
            }else {echo '<div class="warning">'.mysqli_error().'</div>';}
        }
    }
?>