<?php
    $ss1=$ss2="";
    if(isset($_POST['search'])){
        $ss1=  mysqli_real_escape_string($conn,$_POST['s1']);
        $ss2=  mysqli_real_escape_string($conn,$_POST['s2']);
        
        if(!$ss1){   
            echo'<div class="warning">Search by document type & number</div>';
        }else
        {
            $search1=str_replace(" ","-",$ss1);
            echo '<script type="text/javascript"> document.location = "lost.php?search='.$search1.'&id='.$ss2.'"; </script>';
        }
    }
?>