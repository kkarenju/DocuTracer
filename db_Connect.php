<?php
    error_reporting(E_ALL ^ E_DEPRECATED);

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'docutracer';
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

    if(! $conn ) {
       die('Could not connect: ' . mysqli_error());
    }
?>