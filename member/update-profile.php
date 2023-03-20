<?php 
    include 'includes/header.php';  
?>
<script>
    $(document).ready(function ()
    {
        document.title = "Update Profile | DocuTracer";
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
                    <form action="" method="POST">
                        <?php 
                            include ('../validate/profile.php'); 
                            
                            if(isset($_SESSION['ppic'])=='True'){
                                echo '<div class="success">Your profile picture was updated successfully! </div>';
                                
                                unset($_SESSION['ppic']);
                            }
                        ?>
                        <label class="profile-title">Upload Profile Pic:</label>
                        <input type="file" name="pro">
                        <input  name="ppic" type="submit">Upload</button>
                        <br><br>
                    </form>

                    <label class="profile-title">Name:</label>
                    <label><b> <?php echo $profileName.' '.$profileName1; ?> </b></label>
                    <br><br>

                    <label class="profile-title">Joined:</label>
                    <label> <?php echo date_format(date_create($profileActive),"D,dS M Y"); ?> </label>
                </div>
                
                <div class="personal-details">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php
                            include ('../validate/profile.php'); 
                            
                            if(isset($_SESSION['ppic'])=='True'){
                                echo '<div class="success">Your profile picture was updated successfully! </div>';
                                
                                unset($_SESSION['ppic']);
                            }
                        ?>
                        <label class="profile-title">Upload Profile Pic:</label>
                        <input type="file" name="pro" >
                        <br><br>
                        <button name="ppic" type="submit">Upload</button>
                        <br><br>
                    </form>
                    
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
                <label class="deactivate">
                    <a href="../validate/deactivate.php" onClick="return confirm('This action permanently deletes your account!..You will have to register afresh\nwant to deactivate account?');">
                        Deactivate Account
                    </a>
                </label>
                
            </div>
        </div>
        
        <div id="right-div">
            <?php
                if(isset($_SESSION["deactivate"])=='false'){
                    echo '<div class="error">Opps! your account could not be deactivated. Please try again later</div>';
                    unset($_SESSION['deactivate']);
                }
                ?>
                <div id="sign">
        <div id="sign-up">
            <a name="register">
                <h1>Update Profile</h1>
                <h2>Update Profile</h2>
                <h3>Update Profile</h3>
            </a>

            <form method="post">
                <?php 
                    include ('../validate/update-profile.php'); 

                    if(isset($_SESSION['UpdateSuccess'])=="true"){
                        echo '<div class="success"> Profile update successful.</div>';
                        unset($_SESSION['UpdateSuccess']); 
                    }
                ?>
                <table>
                    <tr>
                        <td class="name first least">
                            <b>Firstname:</b> <a>*</a> <br>
                            <input type="text" name="fname" value="<?php echo $profileName; ?>" placeholder="Enter Firstname">
                        </td>

                        <td class="name least">
                            <b>Surname:</b> <a>*</a> <br>
                            <input type="text" name="sname" value="<?php echo $profileName1; ?>" placeholder="Enter Surname">
                        </td>
                    </tr>

                    <tr>
                        <td class="name first">
                            <b>Gender:</b> <a>*</a> <br>
                            <label><input type="radio" name="gender" value="Male" <?php if($profileGender=="Male"){echo 'checked="checked"';}?> />Male</label>
                            <label><input type="radio" name="gender" value="Female" <?php if($profileGender=="Female"){echo 'checked="checked"';}?> />Female</label>
                            <label><input type="radio" name="gender" value="Other" <?php if($profileGender=="Other"){echo 'checked="checked"';}?> />Other</label>
                        </td>

                        <td class="name">
                            <b>Date of birth</b> <a>*</a> <br>
                            <label id="font-label">
                                <i class="fa fa-calendar"></i>
                                <input type="date" name="dob" id="datepicker" value="<?php echo $profileDOB; ?>" placeholder="Date of Birth" />
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td class="name first least">
                            <b>National ID No:</b> <a>*</a> <br>
                            <input type="number" minlength="6" name="id" value="<?php echo $profileNID; ?>" placeholder="Enter National ID No">
                        </td>

                        <td class="name least">
                            <b>Phone No:</b> <a>*</a> <br>
                            <input type="number" maxlenght="13" minlenghth="10" name="phone" placeholder="Enter Phone No."
                                   data-toggle="tooltip" data-placement="top" title="We ensure privacy to your personal information"
                                   value="<?php echo $profilePhone; ?>" >
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <b>E-mail:</b> <a>*</a> <br>
                                <input type="email" name="mail" value="<?php echo $profileMail; ?>" placeholder="Enter e-mail">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>Password:</b> <a>*</a> <br>
                            <input type="password" name="pass"  value="<?php echo $passw; ?>" placeholder="Enter Password">
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
