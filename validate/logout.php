<?php
    session_start();
    unset($_SESSION['idd']);

    echo "<script type='text/javascript'> document.location = '../'; </script>";
    exit();
?>;