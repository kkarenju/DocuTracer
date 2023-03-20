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
                     if(isset($adminPic)){
                        echo '<img src="../../uploads/admin/'.$adminPic.'" oncontextmenu="return false">';
                    }else{
                        if($adminGender=="Male"){
                        echo '<img src="../../images/male-user.png" oncontextmenu="return false">';
                        }else
                        if($adminGender=="Female"){
                        echo '<img src="../../images/female-user.png" oncontextmenu="return false">';
                        }else
                        if(isset($adminGender)=="Other"){
                        echo '<img src="../../images/other-user.png" oncontextmenu="return false">';
                        }
                    }
                ?>
            </div>
            <br><br><br>
            <div class="profile-details">
                
            <div class="other-profile-details">
                    <form action="" method="POST">
                        <?php 
                            include ('validate/profile.php'); 
                            
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
                    <label><b> <?php echo $adminName.' '.$adminName1; ?> </b></label>
                    <br><br>
                </div>
                
                <div class="personal-details">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <?php
                            include ('validate/profile.php'); 
                            
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
                    <label><b> <?php echo $adminName.' '.$adminName1; ?> </b></label>
                    <br><br>


                    <label class="profile-title">Gender:</label>
                    <br>
                    <label> <?php echo $adminGender; ?> </label>
                    <br><br>

                    <label class="profile-title">Phone:</label>
                    <br>
                    <label> <?php echo $adminPhone; ?> </label>
                    <br><br>

                    <label class="profile-title">E-Mail:</label>
                    <br>
                    <label> <?php echo $adminMail; ?> </label>
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
    
<?php include '../includes/footer.php';  ?>
