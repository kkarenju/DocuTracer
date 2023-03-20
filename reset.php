<?php
    include 'includes/header_2.php';

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
<script>
$(document).ready(function ()
{
    document.title = "Reset Password | DocuTracer";
});
</script>
    <form method="POST">
        <fieldset>
            <legend><em><b>Reset Password</b></em></legend>
    
            <?php 
                if(isset($_POST['reset'])){
                    function clean($str) {
                        return filter_var($str, FILTER_SANITIZE_STRING);
                    }       
                    
                    $new = clean($_POST['new']);
                    $confirm = clean($_POST['confirm']);
                    
                    if(!$new){
                        echo '<div class="errormsgbox"> Enter new password</div>';
                    }else
                    if(!$confirm){
                        echo '<div class="errormsgbox"> Confirm new password</div>';
                    }else
                    if($new != $confirm){
                        echo '<div class="errormsgbox">Passwords did not match</div>';
                    }else
                    {
                        $pass=md5($new);
                        // Update the database to set the "activation" field to null
                        $query_reset_account = "UPDATE member SET pass='$pass', activation=NULL WHERE mail ='$email' AND activation1='$key'";
                        $result_reset_account = mysqli_query($conn,$query_reset_account) ;
                        $affected = mysqli_affected_rows($conn);

                        // Print a customized message:
                        if ($affected == 1)//if update query was successfull
                        {
                        echo '<div class="success">Password reset successful. You may now <a href="./">Log in</a></div>';

                        } else
                        {
                            echo '<div class="errormsgbox">Oops! Your account could not be activated. Please recheck the link or contact the system administrator.</div>';
                        }
                    }
                }
            ?>
            <label>new password</label>
            <input type="password" name="new" placeholder="enter new password">
            <br><br>
            <label>confirm password</label>
            <input type="password" name="confirm" placeholder="confirm new password">
            <br><br>
            <div style="text-align:center;">
            <button type="submit" name="reset">Reset</button>
            </div>
        </fieldset>
    </form>

 <?php
    } else {
            echo '<div class="errormsgbox">Error Occured.</div>';
    }
    include 'includes/footer.php';
?>