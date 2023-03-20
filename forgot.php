<?php include 'includes/header_1.php';  ?>
<script>
    $(document).ready(function ()
    {
        document.title = "Forgot Password | DocuTracer";
    });
</script>
    <div id="wrap">
     <div id="sign-in">
        <a name="login">
            <h1>Forgot Password</h1>
            <h2>Forgot Password</h2>
            <h3>Forgot Password</h3>
        </a>
            <form class="log-form" name="loginform"  method="post">
                
                    <?php 
                        include'validate/forgot.php';
                        
                        if(isset($_SESSION['new'])=="true"){
                        echo '<div class="success">A password reset link was sent to your e-mail</div>';
                        unset($_SESSION['new']); 
                    }
                    ?>
                                        
                    <b>E-mail</b><br>
                    <label id="font-label">
                        <input type="email" name="mail" value="<?php echo $mail; ?>" placeholder="Enter your email">
                    </label>
                    
                    <br><br>
                    <button name="submit" class="submit" type="submit">Reset</button> <a href="login.php">Login</a>
                
            </form> 
    </div>
    </div>
<?php include 'includes/footer.php';  ?>
