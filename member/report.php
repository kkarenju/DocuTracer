<?php 
    $pg = 'report';
    include 'includes/header.php';  
    
        $tableName="found";
        $targetpage = "report.php";
        $limit = 20;
    
        $sql = "SELECT COUNT(*) as num FROM $tableName WHERE MID='$profileID' "; 
        $pages = mysqli_fetch_array(mysqli_query($conn,$sql));
        $total_pages = $pages['num'];

    
        $stages = 3;
        if(isset($_GET['page'])){
            $page = mysqli_real_escape_string($conn,$_GET['page']);
        }else {$page=0;}

        if($page){
        $start = ($page - 1) * $limit;
        }else{
        $start = 0;
        }
    
    
        $queryy = "SELECT d.*,b.name,b.abbreviation
                    FROM $tableName d
                    LEFT JOIN bank b 
                    ON d.BID = b.BID 
                    WHERE d.MID='$profileID' 
                    ORDER BY d.FID 
                    DESC LIMIT $start, $limit ";
        $resul = mysqli_query($conn,$queryy);
        $rowcount=  mysqli_num_rows($resul);
?>

<script>
    $(document).ready(function ()
    {
        document.title = "Report Found Documents | DocuTracer";
    });
</script>

    <div id="wrap">
        <div id="profile">
            
            <form method="POST" class="form" enctype="multipart/form-data">
                <fieldset>
                    <legend>Report Found Document</legend>
                    
                    <?php 
                        include ('../validate/report.php'); 
                        
                        if(isset($_SESSION['atmSuccess'])=="true"){
                            $count = $_SESSION['count'];
                             
                            echo '<br> <div class="success">ATM CardSuccessfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['atmSuccess']);
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['certSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Certificate was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['certSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['dlSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Driving License was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['dlSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['letterSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Letter was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['letterSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['nidSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> National ID was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['nidSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['novelSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Novel was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['novelSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['sidSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Student ID was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['sidSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['txtSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Text Book was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['txtSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['deedSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Title Deed was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['deedSuccess']);
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['transcriptSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Transcript was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['transcriptSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['voucherSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Voucher was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['voucherSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['workSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Work ID was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['workSuccess']); 
                            unset($_SESSION['count']);
                        }
                        
                        if(isset($_SESSION['passportSuccess'])=="true"){
                            $count = $_SESSION['count'];
                            
                            echo '<br> <div class="success"> Passport was successfully reported.<br><b>'.$count.'</b> match(s) found!</div> <br>';
                            unset($_SESSION['passportSuccess']); 
                            unset($_SESSION['count']);
                        }
                    ?>
                    
                    <div>
                        <select name="type" id="document-type" onchange="showOptions(this)">
                            <option value="">Select Document Type</option>
                            <option value="ATM Card" <?php if($type=="ATM Card"){echo 'selected="selected"';} ?> >ATM Card</option>
                            <option value="Certificate" <?php if($type=="Certificate"){echo 'selected="selected"';} ?> >Certificate</option>
                            <option value="Driving License" <?php if($type=="Driving License"){echo 'selected="selected"';} ?> >Driving License</option>
                            <option value="Letter" <?php if($type=="Letter"){echo 'selected="selected"';} ?> >Letter</option>
                            <option value="National ID" <?php if($type=="National ID"){echo 'selected="selected"';} ?> >National ID</option>
                            <option value="Novel" <?php if($type=="Novel"){echo 'selected="selected"';} ?> >Novel</option>
                            <option value="Student ID" <?php if($type=="Student ID"){echo 'selected="selected"';} ?> >Student ID</option>
                            <option value="Text Book" <?php if($type=="Text Book"){echo 'selected="selected"';} ?> >Text Book</option>
                            <option value="Title Deed" <?php if($type=="Title Deed"){echo 'selected="selected"';} ?> >Title Deed</option>
                            <option value="Transcript" <?php if($type=="Transcript"){echo 'selected="selected"';} ?> >Transcript</option>
                            <option value="Voucher" <?php if($type=="Voucher"){echo 'selected="selected"';} ?> >Voucher</option>
                            <option value="Work ID" <?php if($type=="Work ID"){echo 'selected="selected"';} ?> >Work ID</option>
                            <option value="Passport" <?php if($type=="Passport"){echo 'selected="selected"';} ?> >Passport</option>
                        </select>
                        
                    </div>
                        
                        
                        
                      
                    <?php    
                        include 'document/found-atm.php';
                        include 'document/found-cert.php';
                        include 'document/found-dl.php';
                        include 'document/found-letter.php';
                        include 'document/found-id.php';
                        include 'document/found-novel.php';
                        include 'document/found-student-id.php';
                        include 'document/found-text.php';
                        include 'document/found-deed.php';
                        include 'document/found-transcript.php';
                        include 'document/found-voucher.php';
                        include 'document/found-work.php';
                        include 'document/found-passport.php';
                    ?>
                    
                </fieldset>

            </form>
            <form method="POST">
            <?php
                //delete documents
                include '../validate/deleteFound.php';
            
                if(isset($_SESSION['deleted'])=="true"){
                    if(isset($_SESSION['docsDeleted'])){
                        $docsDel = $_SESSION['docsDeleted'];
                    }
                    echo '<br> <div class="success"> <b>'.$docsDel.'</b> document(s) successfully deleted.</div> <br>';
                    unset($_SESSION['docsDeleted']); 
                    unset($_SESSION['deleted']); 
                }
            
                if($total_pages < 1){
                    echo '<label class="registered">My Found Documents</label>';;
                    echo '<br><br>';
                    echo '<div class="warning"> You have not reported any documents.
                                <br>Help someone get back their documents today, by reporting found documents
                         </div>';
                }else{
                   
            ?>
                <label class="registered">My Found Documents <a style="color:black;font-size:14px;">(<?php echo $total_pages; ?>)</a></label>
                
                <select onchange="showHide(this)">
                    <option value="">View</option>
                    <option value="list">List</option>
                    <option value="details">Details</option>
                </select>

                <button name="delete" class="delete" type="submit" title="Delete Document(s)" onClick="return confirm('You are about to permanently delete selected document(s).\nWant to continue?');">Delete</button>

                <br><br>
                <div class="view-list">
                    <?php include 'found-list.php'; ?>
                </div>
                <div class="view-details">
                    <?php include 'found-details.php'; ?>
                </div>
            </form>
            <?php }?>
            
        </div>
    </div>
<?php include 'includes/footer.php';  ?>
