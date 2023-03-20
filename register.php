<?php include 'includes/header_1.php';  ?>
<script>
$(document).ready(function ()
{
    document.title = "Register | DocuTracer";
});
</script>
    <div id="wrap">

        <div id="sign">
        <div id="sign-up">
            <a name="register">
                <h1>Register</h1>
                <h2>Register</h2>
                <h3>Register</h3>
            </a>

            <form method="post">
                <?php 
                    include ('validate/register.php'); 

                    if(isset($_SESSION['success'])=="true"){
                        echo '<div class="success"> <b>Registration successful!</b> <br>account activation link was sent to your mail.</div>';
                        unset($_SESSION['success']); 
                    }
                    
                    if(isset($_SESSION["deactivate"])=='true'){
                        echo '<div class="success"><b>Your account was successfully deactivated</b><br>What made you deactivate? please
                                <a href="./#contact">Contact Us</a> and let us know, to help improve our services
                                </div>';
                        unset($_SESSION['deactivate']);
                    }
                ?>
                <table>
                    <tr>
                        <td class="name first least">
                            <b>Firstname:</b> <a>*</a> <br>
                            <input type="text" name="fname" value="<?php echo $fname; ?>" placeholder="Enter Firstname">
                        </td>

                        <td class="name least">
                            <b>Surname:</b> <a>*</a> <br>
                            <input type="text" name="sname" value="<?php echo $sname; ?>" placeholder="Enter Surname">
                        </td>
                    </tr>

                    <tr>
                        <td class="name first">
                            <b>Gender:</b> <a>*</a> <br>
                            <label><input type="radio" name="gender" value="Male" <?php if(isset($gender)=="Male"){echo 'checked="checked"';}?> />Male</label>
                            <label><input type="radio" name="gender" value="Female" <?php if(isset($gender)=="Female"){echo 'checked="checked"';}?> />Female</label>
                            <label><input type="radio" name="gender" value="Other" <?php if(isset($gender)=="Other"){echo 'checked="checked"';}?> />Other</label>
                        </td>

                        <td class="name">
                            <b>Date of birth</b> <a>*</a> <br>
                            <label id="font-label">
                                <i class="fa fa-calendar"></i>
                                <input type="date" name="dob" id="datepicker" value="<?php echo $dob; ?>" placeholder="YYYY-MM-DD" />
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <td class="name first least">
                            <b>National ID No:</b> <br>
                            <input type="number" minlength="6" name="id" value="<?php echo $id; ?>" placeholder="Enter National ID No (Optional)">
                        </td>

                        <td class="name least">
                            <b>Phone No:</b> <a>*</a> <br>
                            <input type="number" maxlenght="13" minlenghth="10" name="phone" placeholder="Enter Phone No."
                                   data-toggle="tooltip" data-placement="top" title="We ensure privacy to your personal information"
                                   value="<?php echo $phone; ?>" >
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <b>E-mail:</b> <a>*</a> <br>
                                <input type="email" name="mail" value="<?php echo $mail; ?>" placeholder="Enter e-mail">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>Confirm E-mail</b> <a>*</a> <br>
                            <input type="email" name="confirmMail" value="<?php echo $confirmMail; ?>" placeholder="Confirm e-mail">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <b>Password:</b> <a>*</a> <br>
                            <input type="password" name="pass"  pattern=".{7,15}"  title="7 to 15 characters" value="<?php echo $pass; ?>" placeholder="Enter Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>Confirm Password</b> <a>*</a> <br>
                            <input type="password" name="confirmPass" onpaste="return false;" value="<?php echo $confirmPass; ?>" placeholder="Confirm Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            by clicking register button, you agree to our <a class="agree"  onclick="window.open('policy.html', 'newwindow', 'width=500, height=600'); return false;">user policy</a>
                        </td>
                    </tr>
                </table>

                <div style="width:80px;margin:0 auto;margin-top:4%;">
                    <button name="register" class="submit" type="submit">Register</button>
                </div>
            </form>

        </div>
    </div>
    </div>
<?php include 'includes/footer.php';  ?>
