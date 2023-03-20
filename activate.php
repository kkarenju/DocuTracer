<?php 
    include('includes/header_2.php');
    
    
    
        if (isset($_GET['mail']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',base64_decode($_GET['mail'])))
        {
            $email = base64_decode($_GET['mail']);

        }
        if (isset($_GET['key']) && (strlen($_GET['key']) == 32))//The Activation key will always be 32 since it is MD5 Hash
        {
            $key = $_GET['key'];
        }


        if (isset($email) && isset($key))
        {
    ?>

    <form>
            <?php 
                $date = date("Y-m-d");
                
                $query_reset_account = "UPDATE member SET date_activated='$date',activation=NULL WHERE mail ='$email' AND activation='$key'";
                $result_reset_account = mysqli_query($conn,$query_reset_account) ;
                $affected = mysqli_affected_rows($conn);

                //Print a customized message:
                if ($affected == 1)//if update query was successfull
                {
                    
                    //pick member details from database
                    $query1 = "SELECT MID,fname FROM member WHERE email='$email' ";
                    $result = mysqli_query($conn,$query1);
                    $rowcount=  mysqli_num_rows($result);
                    
                    while($row = mysqli_fetch_array($result)) { 
                        $fname=$row['fname'];
                        $user=$row['MID'];
                        
                        //send session to member page header
                        $_SESSION["idd"]=$user;
                        
                        header("location:includes/header.php");
                        header("location:includes/header_1.php");
                        header("location:member/includes/header.php");
                        
                        echo '<div class="success"><b>Activation Successful</b>
                                <br>If you are not redirected in <span id="counter">10</span> second(s)
                                <br><a href="member/">click here</a></div>'; 
                        exit();
                        
                        
                        //send welcome, to docutracer, email to member
                        $email=base64_encode($mail);
                        $to=$mail;
                        $subject='Welcome To DocuTracer';
                        $message =  "Hi ".$fname." ,<br> 
                                    It is a pleasure to welcome you to DocuTracer. I hope you accomplish most of our objectives. 
                                    <br><br>
                                    Thank you, for choosing to be part of us.<br><br>
                                    
                                    <img src='www.citiandbeyondcarhire.com/images/kenn-director-DocuTracer.jpg' style='width:60px;height:auto;' oncontextmenu='return false'>
                                    <br>Kenn<br>
                                    Director<br>
                                    DocuTracer";
                        // Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        $headers .='From:noreply@docutracer.com';
                        $m=mail($to,$subject,$message,$headers);
                        
                        
                    }        
                          
                } else
                    {
                        echo '<div class="errormsgbox">Oops! Your account could not be activated. Please recheck the link or contact the system administrator.</div>';
                    }
                
            ?>
    </form>
    <script type="text/javascript">
        function countdown() {
            var i = document.getElementById('counter');
            if (parseInt(i.innerHTML)<=0) {
                location.href = 'member/';
            }
            i.innerHTML = parseInt(i.innerHTML)-1;
        }
        setInterval(function(){ countdown(); },1000);
    </script>

<?php
    }else
        {echo '<div class="errormsgbox">Error Occured.</div>';}

    include('includes/footer.php');    
?>