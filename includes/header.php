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
    
        //select all banks
        $query1="SELECT * FROM bank ORDER BY name ASC";
        $result1=mysqli_query($conn,$query1); 
        $num1=mysqli_num_rows($result1);
        
        //select all market
        $quer="SELECT * FROM market ORDER BY name ASC";
        $results=mysqli_query($conn,$quer); 
        $nums=mysqli_num_rows($results);
        
        //select all gas stations
        $quer1="SELECT * FROM station ORDER BY name ASC";
        $results1=mysqli_query($conn,$quer1); 
        $nums1=mysqli_num_rows($results1);
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
        <link rel="stylesheet" href="css/pagination.css">
        <script type="text/javascript" src="js/slide-login-register.js"></script>
        
        <!--image slider-->
        <link href="css/my-slider.css" rel="stylesheet" type="text/css" />
        <script src="js/ism-2.2.min.js" type="text/javascript"></script>
        <!--end of image slider-->
        
        <!--index divs-->
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="css/about.css">
        <link rel="stylesheet" href="css/lost-n-found.css">
        <link rel="stylesheet" href="css/hover.css">
        
        <!--login/signup-->
        <link rel="stylesheet" href="css/sign.css">
        <script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
        
        <!--contact-->
        <link rel="stylesheet" href="css/contact.css">
        
        <!--date picker-->
        <link rel="stylesheet" href="css/jquery-ui.css">
        <script src="js/jquery-1.12.4.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
        <script>
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
        </script>
        
        <!--share buttons-->
        <link href="css/share.css" rel="stylesheet" type="text/css">
        
        <!-- lost n found -->
        <link rel="stylesheet" href="css/details.css">
        <link href="css/main.css" rel="stylesheet" type="text/css">
        <script src="js/jquery.min-latest.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/jquery.nivo.slider.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/custom.js"></script>
        <script>
        $(document)
            .ready(function () {
            var $container = $('#portfolio-container')
            // initialize Isotope
            $container.isotope({
                // options...
                resizable: false, // disable normal resizing
                layoutMode: 'fitRows',
                itemSelector: '.element',
                animationEngine: 'best-available',
                // set columnWidth to a percentage of container width
                masonry: {
                    columnWidth: $container.width() / 5
                }
            });
            // update columnWidth on window resize
            $(window)
                .smartresize(function () {
                $container.isotope({
                    // update columnWidth to a percentage of container width
                    masonry: {
                        columnWidth: $container.width() / 5
                    }
                });
            });
            $container.imagesLoaded(function () {
                $container.isotope({
                    // options...
                });
            });
            $('#portfolio-filter a')
                .click(function () {
                var selector = $(this)
                    .attr('data-filter');
                $container.isotope({
                    filter: selector
                });
                return false;
            });
        });
        </script>
        
        <script charset="utf-8">
            $(document)
                .ready(function () {
                $("a[rel^='prettyPhoto']")
                    .prettyPhoto();
            });
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
  
        <!--socia media share button scripts-->
        
    </head>
    
    <body>
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        
        <div id="wrapper">
            <div class="bar">
		<div class="row">
			<div class="columns small-12">
                            <p class="bar-phone">
                                <i class="fa fa-phone"></i> Call Us : 
                                <strong>
                                    <a href="tel:+254714000000" target="_blank"> +254714000000</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                                    <a href="tel:+25470000000" target="_blank">+25470000000</a>
                                </strong>
                            </p><!-- /.bar-phone -->
				
                            <div class="bar-socials">
				<ul>
                                    <li>
                        		<a href="https://www.facebook.com/Sakasolutions" target="_blank">
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
                        <a href="./#lost"><li >View</li></a>
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
            

                    