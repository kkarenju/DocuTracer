<?php 
    ob_start();
    session_start();
    include 'db_Connect.php';
    date_default_timezone_set("Africa/Nairobi");
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>DocuTracer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="shortcut icon" href="images/logo.png" />
        
        <link rel="stylesheet" href="css/sheet.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        
        <style type="text/css">
body {
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:13px;
}

.success {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 60px;
	background-repeat: no-repeat;
	background-position: 10px center;
        width:80%;
        color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
     
}

 .errormsgbox {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 60px;
	background-repeat: no-repeat;
	background-position: 10px center;
        width:80%;
    	color: #D8000C;
	background-color: #FFBABA;
	background-image: url('images/error.png');    
}

form{
    width:100%;
    max-width:450px;
    margin:0 auto;
    vertical-align:middle;
    padding:10px;
}
label{display:block;margin-bottom:5px;}

input{
    width:97%;
    margin:0 auto;
    border-radius:5px;
    border:1px solid black;
    padding:5px 10px 5px 10px;
}
input:focus{
    box-shadow: 0 0 5px #b77e0b;
    border: 1px solid #b77e0b;
}

button{padding:5px 20px 5px 20px;}

</style>
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
                        <a href="./"><li class="">Home</li></a>
                    </ul>
                    
                                        
                </nav>
            </div>
            

                    