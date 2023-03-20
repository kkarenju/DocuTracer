<?php 
    ob_start();
    session_start();
    include '../../db_Connect.php';
    date_default_timezone_set("Africa/Nairobi");
    
    if(isset($_SESSION['iid']))
    { 
        header("location:../member/index.php");
    }else 
    /*if(!isset($_SESSION['aid']))
    { 
        header("location:index.php");
    }else*/
    {
        $adminID = 1;//$_SESSION['idd'];
        
        //select details of loged in member
        $query="SELECT fname,sname,gender,phone,mail,pic,pass FROM admin WHERE AID='$adminID' ";
        $result=mysqli_query($conn,$query); 
        $num=mysqli_num_rows($result);
        
        while ($row = mysqli_fetch_array($result)) {
            $adminName = $row['fname'];
            $adminName1 = $row['sname'];
            $adminGender = $row['gender'];
            $adminPhone = $row['phone'];
            $adminMail = $row['mail'];
            $adminPic = $row['pic'];
            $adminPass = $row['pass'];
        }
        
        //select document details of all members
        $query11="SELECT * FROM doc ";
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
        <link rel="shortcut icon" href="../../images/logo.png" />
        
        <link rel="stylesheet" href="css/sheet.css">
        <link rel="stylesheet" href="../../css/font-awesome.min.css">
        <link rel="stylesheet" href="../../css/font-awesome.css">
        <link rel="stylesheet" href="../css/sheet.css">
        <link rel="stylesheet" href="../css/bars.css">
        
        <!--index divs-->
        <link rel="stylesheet" href="../../css/lost-n-found.css">
        
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
        <script src="../../js/hide-display.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../../css/profile.css">
        
        <!--documents-->
        <link rel="stylesheet" href="../css/pagination.css">
        <link rel="stylesheet" href="../css/document.css">
        <script src="../js/jquery.min.js" type="text/javascript"></script>
        
        <!--contact-->
        <link rel="stylesheet" href="../css/contact.css">
        
        <!-- lost n found -->
        <link href="../../css/main.css" rel="stylesheet" type="text/css">
        <script src="../../js/jquery.min-latest.js"></script>
        <script src="../../js/jquery.prettyPhoto.js"></script>
        <script src="../../js/jquery.isotope.min.js"></script>
        <script src="../../js/custom.js"></script>
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
        <div id="wrapper">
            <div id="header">
                
                <nav class="menu">
                    <a href="./index.php" class="header-label">
                        <label>DocuTracer</label>
                    </a>
                    
                    <!--user profile-->
                    <ul class="profile">
                        <li class="dropdown1">
                            
                            <a class="parent <?php if($Page =='password'){echo 'active';}?>">
                                <?php 
                                    if(isset($adminPic)){
                                        echo '<img src="../../uploads/admin/'.$adminPic.'" oncontextmenu="return false">';
                                    }else{
                                        echo '<label class="profile-user"><i class="fa fa-user"></i></label>';
                                    }
                                ?>
                                   
                                    <label><?php echo substr($adminName, 0, 15); ?></label>
                                
                            </a>                            
                            <ul class="drop-nav1">
                                <li>
                                    <a href="update-profile.php?id=<?php echo $adminID; ?>" class="<?php if($pg =='profile'){echo 'active';}?>">
                                        <i class="fa fa-user"></i>
                                        Update Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="update-pass.php?id=<?php echo $adminID; ?>" class="<?php if($pg =='password'){echo 'active';}?>">
                                        <i class="fa fa-lock"></i>
                                        Change Password
                                    </a>
                                </li>
                                <li>
                                    <a href="settings.php" class="<?php if($pg =='settings'){echo 'active';}?>">
                                        <i class="fa fa-cogs"></i>
                                        Settings
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
                        
                        <a href="index.php"> <li class="<?php if($pg =='home'){echo 'active';}?>">Home</li></a>
                        <a href="new-Document.php"> <li class="<?php if($pg =='new'){echo 'active';}?>">New <label id="messageCounter"></label></li> </a>
                        <a href="lost.php"> <li class="<?php if($pg =='lost'){echo 'active';}?>">Lost</li> </a>
                        <a href="found.php"> <li class="<?php if($pg =='found'){echo 'active';}?>">Found</li> </a>
                    </ul>
                    
                    <div class="menu-right">
                        <select onchange="javascript:handleSelect(this)">
                            <option selected="selected" >Menu</option> 			
                            <option value="index.php">Home</option>
                            <optgroup label="View">
                                <option value="lost.php">Lost Documents</option>
                                <option value="found.php">Found Documents</option>
                            </optgroup>             
                        </select>
                    </div>
                    
                </nav>
            </div>

                    