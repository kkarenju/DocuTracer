<?php
    $details="";
    
    
    if(isset($_POST['complete'])){
        
        //generate random combination of numbers,characters, and letters
        function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
        
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
                    
                    
        $details = $_POST['details'];
        $date=date("Y-m-d");
        $time=date("H:i:s");
        $no=generateRandomString()."/".$date."/".$time; //add date and time, to random generated string, to make it more unique
        
        if(!$details){
            echo '<div class="error">Enter details on lost documents</div><br>';
        }else
            {
                
                //get count on rows of array
                for($i=0;$i<count($array);$i++){}
                    
                $details1 = array_fill(0,$i,$details);
                $date1 = array_fill(0,$i,$date);
                $time1 = array_fill(0,$i,$time);
                $state = array_fill(0,$i,"1");
                $lno = array_fill(0,$i,$no);
                $did=$array;
                    
                $c = array_map(function ($lno,$did,$date1,$time1,$details1,$state){return "'$lno','$did','$date1','$time1','$details1','$state'";} ,$lno,$did,$date1,$time1,$details1,$state);
             
                //insert row(s) of record(s)
                $sql = mysqli_query($conn,"UPDATE doc SET status='Lost'  WHERE DID IN($arrays)");
                
                if(!$sql = mysqli_query($conn,"INSERT INTO lost (LNO,DID,date_reported,time_reported,details,state) VALUES(".implode('),(', $c).")"))
                {
                    echo "<div class=\"warning\">".mysqli_error()."</div>";
                }else
                    {
                       $updated=  mysqli_affected_rows($conn);

                        $_SESSION["marked"]=$updated;
                        $_SESSION["state"]="Lost";
                        $_SESSION["mark"]='true';
                        header('Location:index.php');
                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                        exit();
                    }
            }
    }    
?>