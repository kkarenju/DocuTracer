<?php 
    ob_start();
    session_start();
    
    include 'db_Connect.php';
    date_default_timezone_set("Africa/Nairobi");
    
    if(isset($_SESSION['aid']))
    { 
        header("location:../admin/home.php");
    }else
    if(isset($_SESSION['idd']))
    { 
        header("location:member/");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home | DocuTracer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="images/logo.png" />
        
        <link rel="stylesheet" href="css/sheet.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        
        <script type="text/javascript" src="js/hide-display.js"></script>
        
        <!--login/signup-->
        <link rel="stylesheet" href="css/sign.css">
        <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
        
        <!--date picker-->
        <link rel="stylesheet" href="css/jquery-ui.css">
        <script src="js/jquery-1.12.4.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script>
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
        </script>
        
        <script>
            // Create the dropdown base
            $("<select />").appendTo("nav");

            // Create default option "Go to..."
            $("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Go to..."
            }).appendTo("nav select");

            // Populate dropdown with menu items
            $("nav a").each(function() {
		 var el = $(this);
		$("<option />", {
                    "value"   : el.attr("href"),
                    "text"    : el.text()
		}).appendTo("nav select");
            });
			
            $("nav select").change(function() {
		window.location = $(this).find("option:selected").val();
            });  
            
            function handleSelect(elm)
            {
                window.location = elm.value;
            }   
	</script>
        
    </head>
    
    <body>
        <div id="wrapper">
            <div class="bar">
		<div class="row">
			<div class="columns small-12">
                            <p class="bar-phone">
                                <i class="fa fa-phone"></i> Call Us : <strong><a href="tel:+254 714 890 597" target="_blank"> +254 714 890 597</a></strong>
                            </p><!-- /.bar-phone -->
				
                            <div class="bar-socials">
				<ul>
                                    <li>
                        		<a href="http://www.facebook.com/Sakasolutions" target="_blank">
					    <i class="fa fa-facebook"></i>
					</a>
                                    </li>
						
                                    <li>
					<a href="#">
                                            <i class="fa fa-twitter"></i>
					</a>
                                    </li>
						
                                    <li>
					<a href="#">
                                            <i class="fa fa-google-plus"></i>
					</a>
                                    </li>
						
                                    <li>
					<a href="#">
                                            <i class="fa fa-linkedin"></i>
					</a>
                                    </li>
				</ul>
                            </div><!-- /.bar-socials -->
                        </div><!-- /.columns small-12 -->
                    </div><!-- /.row -->
                </div><!-- /.bar -->
        
            <div id="header">
                
                <nav class="menu">
                    <a href="./" class="header-logo">
                        <img src="images/dt1.png" alt="DocuTracer: finding your lost documents" oncontextmenu="return false">
                    </a>
                    <ul class="main-menu">
                        
                        <a href="./"><li class=" <?php //if($currentPage =='home'){echo 'active';}?>">Home</li></a>
                        <a href="./#about"><li >About Us</li></a>
                        <a href="./#lost"><li>View</li></a>
			<a href="./#contact"><li>Contact us</li></a>
                        <a href="login.php"> <li>Login</li> </a>
                        <a href="register.php"><li>Register</li></a>
                    </ul>
                    
                    <div class="menu-right">
                        <select onchange="javascript:handleSelect(this)">
                            <option selected="selected" >Menu</option> 			
                            <option value="./">Home</option>
                            <option value="./#about">About</option> 
                            <optgroup label="View">
                                <option value="./#lost">Lost Documents</option>
                                <option value="./#found">Found Documents</option>
                            </optgroup>
                            <option value="./#contact">Contact Us</option>
                            <option value="login.php">Login</option>
                            <option value="register.php">Register</option>                
                        </select>
                    </div>
                </nav>
            </div>
            

                    