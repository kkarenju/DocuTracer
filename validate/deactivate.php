<?php
    session_start();
    include '../db_Connect.php';
    
    //select name of uploaded profile photo in folder
    $res=mysqli_query($conn,"SELECT pic FROM member WHERE MID='".$_SESSION['idd']."'");
    $rows=mysqli_fetch_array($res);
    
    //select name of uploaded document photo in folder
    $res1=mysqli_query($conn,"SELECT pic FROM doc WHERE MID='".$_SESSION['idd']."'");
    $rows1=mysqli_fetch_array($res1);
    
    //select name of uploaded found document photo in folder
    $res2=mysqli_query($conn,"SELECT pic FROM found WHERE MID='".$_SESSION['idd']."'");
    $rows2=mysqli_fetch_array($res2);
    
    //delete member account, together with all it's associated records
    $sql = "DELETE FROM member WHERE MID='".$_SESSION['idd']."'";
    $deleted = mysqli_query($conn,$sql);

    
    
    $sql1 = "DELETE FROM doc WHERE MID='".$_SESSION['idd']."'";
    $deleted1 = mysqli_query($conn,$sql1);
    
    //delete photo in folder
    unlink("../uploads/profile/".$rows['pic']);
    
    //delete photo in folder
    unlink("../uploads/documents/".$rows1['pic']);
    
    //delete photo in folder
    unlink("../uploads/documents/".$rows2['pic']);
    
    //get no. of rows deleted
    $records=  mysqli_affected_rows($conn);
    
    if($records<1){            
        $_SESSION["deactivate"]='false';
        header('Location:../member/update-profile.php');
        echo "<script type='text/javascript'> document.location = '../member/update-profile.php'; </script>";
        exit();
    }else 
    {
        unset($_SESSION['idd']);
        
        $_SESSION["deactivate"]='true';
        header('Location:../register.php');
        echo "<script type='text/javascript'> document.location = '../register.php'; </script>";
        exit();
    }
?>