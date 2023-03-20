<?php include 'includes/header.php';  ?>
<script>
    $(document).ready(function ()
    {
        document.title = "Change Password | DocuTracer";
    });
</script>
    <div id="wrap">
        <div id="left-div">
            <div id="profile-pic">
                <?php
                    if(isset($profilePic)){
                        echo '<img src="../uploads/profile/'.$profilePic.'" oncontextmenu="return false">';
                    }else{
                        if($profileGender=="Male"){
                        echo '<img src="../images/male-user.png" oncontextmenu="return false">';
                        }else
                        if($profileGender=="Female"){
                        echo '<img src="../images/female-user.png" oncontextmenu="return false">';
                        }else
                        if(isset($profileGender)=="Other"){
                        echo '<img src="../images/other-user.png" oncontextmenu="return false">';
                        }
                    }
                ?>
            </div>
            <br><br><br>
            <div class="profile-details">
                
                <div class="other-profile-details">
                <label class="profile-title">Name:</label>
                <label><b> <?php echo $profileName.' '.$profileName1; ?> </b></label>
                <br><br>
                
                <label class="profile-title">Joined:</label>
                <label> <?php echo date_format(date_create($profileActive),"D,dS M Y"); ?> </label>
                </div>
                
                <div class="personal-details">
                <label class="profile-title">Name:</label>
                <br>
                <label><b> <?php echo $profileName.' '.$profileName1; ?> </b></label>
                <br><br>
                
                <label class="profile-title">Joined:</label>
                <br>
                <label> <?php echo date_format(date_create($profileActive),"D,dS M Y"); ?> </label>
                <br><br>
                
                <label class="profile-title">Gender:</label>
                <br>
                <label> <?php echo $profileGender; ?> </label>
                <br><br>
                
                <label class="profile-title">Date of Birth:</label>
                <br>
                <label> <?php echo date_format(date_create($profileDOB),"D,dS M Y"); ?> </label>
                <br><br>
                
                <label class="profile-title">National ID:</label>
                <br>
                <label> <?php echo $profileNID; ?> </label>
                <br><br>
                
                <label class="profile-title">Phone:</label>
                <br>
                <label> <?php echo $profilePhone; ?> </label>
                <br><br>
                
                <label class="profile-title">E-Mail:</label>
                <br>
                <label> <?php echo $profileMail; ?> </label>
                <br><br>
                
                </div>
                <br><br>
            </div>
        </div>
        
        <div id="right-div">
        <div id="sign">
        <div id="sign-up">
            <a name="register">
                <h1>Change Password</h1>
                <h2>Change Password</h2>
                <h3>Change Password</h3>
            </a>

            <form method="post">
                <?php 
                    include ('../validate/password.php'); 

                    if(isset($_SESSION['success'])=="true"){
                        echo '<div class="success">Password changed successfully</div>';
                        unset($_SESSION['success']); 
                    }
                ?>
                <table>
                    <tr>
                        <td colspan="2">
                            <b>Password:</b> <a>*</a> <br>
                            <input type="password" name="current" value="<?php echo $current; ?>" placeholder="Enter Current Password">
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <b>Password:</b> <a>*</a> <br>
                            <input type="password" name="new"  pattern=".{7,15}"  title="7 to 15 characters" value="<?php echo $new; ?>" placeholder="Enter New Password">
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <b>Password:</b> <a>*</a> <br>
                            <input type="password" name="confirm" value="<?php echo $confirm; ?>" placeholder="Confirm New Password">
                        </td>
                    </tr>
                </table>

                <div style="width:80px;margin:0 auto;margin-top:4%;">
                    <button name="update" class="submit" type="submit">Update</button>
                </div>
            </form>

        </div>
    </div>
            
        </div>
        
    </div>
    
<?php include 'includes/footer.php';  ?>
