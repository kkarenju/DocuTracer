    <div class="contact">    
        <a name="contact">
            <h1>Contact Us</h1>
        </a>
        <div id="contact">
            <form method="POST">
                <?php 
                    include ('validate/contact-us.php'); 

                    if(isset($_SESSION['name'])=="true"){
                        echo "<div class=\"error\"><strong>Enter your name!</strong></div><br>";
                        unset($_SESSION['name']); 
                    }else
					if(isset($_SESSION['mail'])=="true"){
                        echo "<div class=\"error\"><strong>Enter your e-mail address!</strong></div><br>";
                        unset($_SESSION['mail']); 
                    }else
					if(isset($_SESSION['email'])=="true"){
                        echo '<div class="error">Invalid e-mail format</div>';
                        unset($_SESSION['email']); 
                    }else
					if(isset($_SESSION['subject'])=="true"){
						echo "<div class=\"error\"><strong>Enter subject of your message!</strong></div><br>";
                        unset($_SESSION['subject']); 
                    }else
					if(isset($_SESSION['message'])=="true"){
                        echo "<div class=\"error\"><strong>Enter your message!</strong></div><br>";
                        unset($_SESSION['message']); 
                    }else
					if(isset($_SESSION['ContactSuccess'])=="true"){
                        echo '<div class="success">Message sent successfully</div><br>';
                        unset($_SESSION['ContactSuccess']); 
                    }
                ?>
                <label class="profile-title">Name:</label>
                <br>
                <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Your name">
                <br><br>
                
                <label class="profile-title">E-Mail:</label>
                <br>
                <input type="text" name="mail" value="<?php echo $mail ?>" placeholder="email (eg: jdoe@mail.com)">
                <br><br>
                
                <label class="profile-title">Subject:</label>
                <br>
                <input type="text" name="subject" value="<?php echo $subject; ?>" placeholder="subject (50 characters)">
                <br><br>
                
                <label class="profile-title">Message:</label>
                <br>
                <textarea name="message" rows="10" placeholder="Type your message here..."><?php echo $message; ?></textarea>
                <br><br>
                <button name="sendMessage" class="submit" type="submit">Send</button>
            </form>
        </div>
        
        <div id="contact-details"> 
            <i class="fa fa-phone"></i>
            <a href="tel:+254 712 345 678" target="_blank">+254 712 345 678 /</a>
            
            <a href="tel:+254 780 890 597" target="_blank"> +254 780 890 597</a>
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
            <i class="fa fa-globe"></i><a>www.sakasolutions.com</a>
            <br><br>
            <!--<i class="fa fa-envelope"></i><label><b>P.O Box</b> Nairobi</label>-->
          
        </div>
    </div>