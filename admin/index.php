<?php include 'includes/header_1.php';  ?>
    <div id="login">
     <div id="sign">
     <div id="sign-in">
         <div style="text-align:center">
         <img src="../images/logo.png" alt="DocuTracer">
         </div>
        <br>
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
                    <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter username">
                    </label>
                    
                    <br><br>
                    
                    <b>Password</b><br>
                    <label id="font-label">
                        <i class="fa fa-lock"></i>
                        <input type="password" name="password" value="<?php echo $pass; ?>" placeholder="Enter password">
                    </label>
                    
                    <br><br>
                    <button name="submit" class="submit" type="submit">Login</button> <a href="forgot.php">forgot password?</a>
                    <br>
                    <a href="../" class="home"><i class="fa fa-home"></i>Home</a>
                    
            </form> 
    </div>
    </div>
        </div>
<?php include 'includes/footer.php';  ?>
