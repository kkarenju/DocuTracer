<?php 
    $pg = 'contact';
    include 'includes/header.php';  
?>
<script>
    $(document).ready(function ()
    {
        document.title = "Contact | DocuTracer";
    });
</script>
    <div id="wrap">
        <div id="contact">
            <form method="POST">
                <h1>Contact Us</h1>
                <h2>Contact Us</h2>
                <h3>Contact Us</h3>
                <?php 
                    include ('../validate/contact.php'); 

                    if(isset($_SESSION['ContactSuccess'])=="true"){
                        echo '<div class="success">Message sent successfully</div><br>';
                        unset($_SESSION['ContactSuccess']); 
                    }
                ?>
                <label class="profile-title">Subject:</label>
                <br>
                <input type="text" name="subject" title="Subject" value="<?php //echo $id; ?>" placeholder="subject (50 characters)">
                <br><br>
                
                <label class="profile-title">Message:</label>
                <br>
                <textarea name="message" rows="10" title="Message" maxlength="300" placeholder="Type your message here..."></textarea>
                <br><br>
                <button name="send" class="submit" type="submit">Send</button>
            </form>
        </div>
		
	<div id="contact-details">
            <i class="fa fa-phone"></i>
            <a href="tel:+254700000001" target="_blank">+254 700 000 001 /</a>
            
            <a href="tel:+254700000000" target="_blank"> +254 700 000 000</a>
            <br><br>
            
            <i class="fa fa-envelope-o"></i>
            <label> 
                <a href="mailto:info@sakasolutions.com" target="_top">info@sakasolutions.com</a>
            </label>
            
            <br><br>
            <i class="fa fa-fw"></i>
            <label> 
                <a href="mailto:docutracer@sakasolutions.com" target="_top">docutracer@sakasolutions.com</a>
            </label>
            
            <br><br>
            <i class="fa fa-globe"></i><label>www.sakasolutions.com</label>
            <br><br>
          
        </div>
    </div>
<?php include 'includes/footer.php';  ?>

