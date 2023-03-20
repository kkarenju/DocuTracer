<?php 
    ob_start();
    session_start();
    include '../db_Connect.php';
    date_default_timezone_set("Africa/Nairobi");
   
    if(isset($_SESSION['aid']))
    { 
        header("location:../admin/home.php");
    }else
    if(!isset($_SESSION['idd']))
    { 
        header("location:../login.php");
    }else
    {
        $profileID = $_SESSION['idd'];
        
        //select details of loged in member
        $query="SELECT fname,sname,gender,dob,nid,phone,mail,pic,pass,date_activated FROM member WHERE MID='$profileID' ";
        $result=mysqli_query($conn,$query); 
        $num=mysqli_num_rows($result);
        
        while ($row = mysqli_fetch_array($result)) {
            $profileName = $row['fname'];
            $profileName1 = $row['sname'];
            $profileGender = $row['gender'];
            $profileDOB = $row['dob'];            
            $profileNID = $row['nid'];
            $profilePhone = $row['phone'];
            $profileMail = $row['mail'];
            $profilePic = $row['pic'];
            $profilePass = $row['pass'];
            $profileActive = $row['date_activated'];
        }
        
        //select document details of loged in member
        $query11="SELECT * FROM doc WHERE MID='$profileID' ";
        $result11=mysqli_query($conn,$query11); 
        $num11=mysqli_num_rows($result11);
        
        
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
        
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home | DocuTracer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="../images/logo.png" />
        
        <link rel="stylesheet" href="../css/sheet.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <link rel="stylesheet" href="../css/details.css">
        <link rel="stylesheet" href="../css/share.css">
        <script type="text/javascript" src="../js/slide-login-register.js"></script>
        
        
        <!--index divs-->
        <link rel="stylesheet" href="../css/lost-n-found.css">
        
        <!--date picker-->
        <link rel="stylesheet" href="../css/jquery-ui.css">
        <script src="../js/jquery-1.12.4.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.js" type="text/javascript"></script>
        <script>
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
        </script>
        
        <!--profile-->
        <link rel="stylesheet" href="../css/profile-update.css">
        <link rel="stylesheet" href="../css/sign.css">
        <script src="../js/hide-display.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../css/profile.css">
        
        <!--documents-->
        <link rel="stylesheet" href="../css/pagination.css">
        <link rel="stylesheet" href="../css/document.css">
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        
        <!--contact-->
        <link rel="stylesheet" href="../css/contact.css">
        
        <!-- lost n found -->
        <link href="../css/main.css" rel="stylesheet" type="text/css">
        <script src="../js/jquery.min-latest.js"></script>
        <script src="../js/jquery.prettyPhoto.js"></script>
        <script src="../js/jquery.nivo.slider.js"></script>
        <script src="../js/jquery.isotope.min.js"></script>
        <script src="../js/custom.js"></script>
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
                        <img src="../images/dt1.png" alt="DocuTracer: finding your lost documents" oncontextmenu="return false">
                    </a>
                    
                    <!--user profile-->
                    <ul class="profile">
                        <li class="dropdown1">
                            
                            <a class="parent <?php if($Page =='password'){echo 'active';}?>">
                                <?php 
                                    if(isset($profilePic)){
                                        echo '<img src="../uploads/profile/'.$profilePic.'" oncontextmenu="return false">';
                                    }else{
                                        echo '<label class="profile-user"><i class="fa fa-user"></i></label>';
                                    }
                                ?>
                                   
                                    <label><?php echo substr($profileName, 0, 15); ?></label>
                                
                            </a>                            
                            <ul class="drop-nav1">
                                <li>
                                    <a href="update-profile.php?id=<?php echo $profileID; ?>" class="<?php if($pg =='profile'){echo 'active';}?>">
                                        <i class="fa fa-user"></i>
                                        Update Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="update-pass.php?id=<?php echo $profileID; ?>" class="<?php if($pg =='password'){echo 'active';}?>">
                                        <i class="fa fa-lock"></i>
                                        Change Password
                                    </a>
                                    
                                </li>
                                <li style="margin-bottom:10px;">
                                    <a href="../validate/logout.php" onClick="return confirm('You are about to logout. Unsaved data might be lost! \nwant to continue?');">
                                        <i class="fa fa-sign-out"></i>
                                        Logout
                                    </a>
                                </li>     
                            </ul>
                        </li>
                    </ul>
                    <!--end of user profile-->
                    
                    
                    <ul class="main-menu">
                        
                        <a href="index.php"> <li class="<?php if($pg =='profile'){echo 'active';}?>">Home</li></a>
                        <a href="lost.php"> <li class="<?php if($pg =='lost'){echo 'active';}?>">Lost</li> </a>
                        <a href="found.php"> <li class="<?php if($pg =='found'){echo 'active';}?>">Found</li> </a>
                        <a href="report.php"> <li class="<?php if($pg =='report'){echo 'active';}?>">Report</li> </a>
			<a href="contact.php"> <li class="<?php if($pg =='contact'){echo 'active';}?>">Contact us</li> </a>
                    </ul>
                    
                    <div class="menu-right">
                        <select onchange="javascript:handleSelect(this)">
                            <option selected="selected" >Menu</option> 			
                            <option value="index.php">Home</option>
                            <optgroup label="View">
                                <option value="lost.php">Lost Documents</option>
                                <option value="found.php">Found Documents</option>
                            </optgroup>
                            <option value="report.php">Report</option>
                            <option value="contact.php">Contact Us</option>               
                        </select>
                    </div>
                    
                </nav>
            </div>
            

                    