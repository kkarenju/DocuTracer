<?php
    session_start();
    unset($_SESSION['aid']);

    echo "<script type='text/javascript'> document.location = '../index.php'; </script>";
    exit();
?>;