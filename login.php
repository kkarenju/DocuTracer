<?php include 'includes/header_1.php';  ?>
<script>
$(document).ready(function ()
{
    document.title = "Login | DocuTracer";
});
</script>
    <div id="wrap login">
     <div id="sign-in">
        <a name="login">
            <h1>Log In</h1>
            <h2>Log In</h2>
            <h3>Log In</h3>
        </a>
            <form class="log-form" name="loginform"  method="post">
                
                    <?php include'validate/login.php';?>
                                        
                    <b>Username</b><br>
                    <label id="font-label">
                        <i class="fa fa-user"></i>
                    <input type="text" name="username" value="<?php echo $username; ?>" placeholder="enter email or phone">
                    </label>
                    
                    <br><br>
                    
                    <b>Password</b><br>
                    <label id="font-label">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" value="<?php echo $pass; ?>" placeholder="enter password">
                    </label>
                    
                    <br><br>
                    <button name="submit" class="submit" type="submit">Login</button> <a href="forgot.php">forgot password?</a>
                    
            </form> 
    </div>
    </div>
<?php include 'includes/footer.php';  ?>
