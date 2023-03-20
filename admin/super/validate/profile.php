<?php

    if(isset($_POST['ppic']))
    {
        if(mysqli_real_escape_string($conn,$_GET['id'])){
            $proid=$_GET['id'];
        }
        
        $date = date("Y-m-d");
        
        $image = @addslashes(file_get_contents($_FILES['pro']['tmp_name']));
        $file = rand()."-".$date."-".$profileID."-".$_FILES['pro']['name'];
        $file_loc = $_FILES['pro']['tmp_name'];
        $file_size = $_FILES['pro']['size'];
        $file_type = $_FILES['pro']['type'];
        $image_size = @getimagesize($_FILES['pro']['tmp_name']);
        $folder="../uploads/profile/";
        
        // make file name in lower case
                $new_file_name = strtolower($file);
                $final_file=str_replace(' ','-',$new_file_name);

                $target_file = $folder . basename($final_file);

                if(!$image){
                    echo  '<br> <div class="error">Select image to upload! </div> <br>';
                }else
                if($image_size != TRUE){
                    echo '<br> <div class="error">File is not an image! </div> <br>';
                }else
                if(file_exists($target_file)) {
                    echo '<br> <div class="warning">An image with the same name already exists!</div> <br>';
                }else
                if($file_size > 5000000) {
                    echo '<br> <div class="error">Size of file is too big. Max allowed: 4.5MB! </div> <br>';
                }else 
                if(!move_uploaded_file($file_loc,$folder.$final_file)) {
                    echo '<br> <div class="error">Error in uploading image! </div> <br>';
                }else
                {
                    $directory=$final_file;
            
            if(!$insert = mysqli_query($conn,"UPDATE member SET pic ='$directory' WHERE MID = '$profileID' " ))
            {
                echo '<div class="error"><Strong>'.mysqli_error().'</div>';
            }else{
                
                $_SESSION['ppic']='True';
                header('Location:update-profile.php?id='.$proid);
                echo "<script type='text/javascript'> document.location = 'update-profile.php?id=$proid'; </script>";
    		exit();
            }
        }
    }
?>