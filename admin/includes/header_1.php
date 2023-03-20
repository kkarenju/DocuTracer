<?php 
    ob_start();
    session_start();
    
    include '../db_Connect.php';
    date_default_timezone_set("Africa/Nairobi");
    
    if(isset($_SESSION['iid']))
    { 
        header("location:../member/index.php");
    }else    
    if(isset($_SESSION['aid']))
    { 
        header("location:home.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home | DocuTracer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="images/logo.png" />
        
        <link rel="stylesheet" href="css/sheet.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
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
        
        <!-- lost n found -->
        <script src="js/jquery.min-latest.js"></script>
       
  
        
    </head>
    
    <body>
        <div id="wrapper">
            

                    