<?php
    if(isset($_POST['delete'])){
            if(!isset($_POST['checkbox'])){
                echo '<br> <div class="error"> No document(s) selected </div> <br>';
            }else
            {
                for($i=0;$i<count($_POST['checkbox']);$i++){
                $up_id=$_POST['checkbox'][$i];
                
                //select name of uploaded document photo in folder
                $res=mysqli_query($conn,"SELECT pic FROM found WHERE FID='$up_id'");
                $rows=mysqli_fetch_array($res);

                //delete row(s) of record(s)
                $sql = "DELETE FROM found WHERE FID='$up_id'";
                $deleted = mysqli_query($conn,$sql);

                //delete photo in folder
                unlink("../uploads/documents/".$rows['pic']);
                
                //get no. of rows deleted
                $records=  mysqli_affected_rows($conn);
                }
                if($deleted >! 0){  
                    echo '<br> <div class="error"> No document(s) were deleted </div> <br>';
                }else{
                    $_SESSION["docsDeleted"]=$i;
                    $_SESSION["deleted"]='true';
                    header('Location:report.php');
                    echo "<script type='text/javascript'> document.location = 'report.php'; </script>";
                    exit();
                }
            }
        }
?>