<?php
    if(isset($_POST['mark'])){
        if(!isset($_POST['checkbox'])){
            echo '<br> <div class="error"> No document(s) selected </div> <br>';
        }else
        if(!isset($_POST['selectMark'])){
            echo '<br> <div class="error">Select Mark document(s) option </div> <br>';
        }else
        {
            $select=$_POST['selectMark'];
            
            
        
        
            if($select==="Okay"){
                for($i=0;$i<count($_POST['checkbox']);$i++){}
                
                $up_id=$_POST['checkbox'];
                $id = implode(',',$up_id);

                
                //select status of row to be updated
                $sq = "SELECT status FROM doc WHERE DID IN ($id) "; 
                $doc = mysqli_query($conn,$sq);
                 
                while ($res = mysqli_fetch_array($doc)) {
                    $status[]=$res['status'];
                }
                
                 
                $counts = array_count_values($status);
                $wrong = $counts['Okay'];
                    
                if($wrong > 0){
                    echo '<br> <div class="warning"> <b>'.$wrong.'</b> document(s) already marked as <b>Okay</b>. Deselect them, to continue with this action.
                            </div> 
                         <br>';
                }else
                    {
                        //delete row(s) of record(s)
                        $sql = "UPDATE doc SET status='$select' WHERE DID IN($id)";
                        $updated = mysqli_query($conn,$sql);

                        //delete row(s) of record(s)
                        $sql1 = "UPDATE lost SET state='0' WHERE DID IN($id)";
                        $updated1 = mysqli_query($conn,$sql1);

                        //get no. of rows deleted
                        $records=  mysqli_affected_rows($conn);


                        if($updated >! 0){  
                            echo '<br> <div class="error"> No document(s) were marked </div> <br>';
                        }else{
                            $_SESSION["marked"]=$i;
                            $_SESSION["state"]=$select;
                            $_SESSION["mark"]='true';
                            header('Location:index.php');
                            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                            exit();
                        }
                    }
            }else
                
            if($select==="Lost"){
                for($i=0;$i<count($_POST['checkbox']);$i++){}
                
                $check=$_POST['checkbox'];
                $id = implode(',',$check);

                
                //select status of row to be updated
                $sq = "SELECT status FROM doc WHERE DID IN ($id) "; 
                $doc = mysqli_query($conn,$sq);
                 
                while ($res = mysqli_fetch_array($doc)) {
                    $status[]=$res['status'];
                }
                
                $counts = array_count_values($status);
                $wrong = $counts['Lost'];
                    
                if($wrong > 0){
                    echo '<br> <div class="warning"> <b>'.$wrong.'</b> document(s) already marked as <b>Lost</b>. Deselect them, to continue with this action.
                            </div> 
                         <br>';
                }else
                    {
                        $ids=base64_encode(serialize($check));
                        echo '<script type="text/javascript"> document.location = "lostDetails.php?id='.$ids.'"; </script>';
                    }
            }
        }
    }
?>