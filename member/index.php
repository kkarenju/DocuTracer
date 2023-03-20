<?php 
    $pg = 'profile';
    include 'includes/header.php';  
    
    $tableName="doc";
        $targetpage = "index.php";
        $limit = 60;
    
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
    
    
        $queryy = "SELECT d.*,b.name,b.abbreviation,m.name AS market, s.name AS station,l.date_reported
                    FROM doc d
                    LEFT JOIN bank b 
                            ON d.BID = b.BID 
                    LEFT JOIN market m
                            ON d.SMID = m.SMID
                    LEFT JOIN station s
                            ON d.SID = s.SID
                    LEFT JOIN (
                                SELECT MAX(date_reported) AS date_reported,MAX(time_reported)AS time_reported,DID
                                FROM lost
                                GROUP BY DID
                              ) AS l
                            ON l.DID = d.DID
                    WHERE d.MID='$profileID' 
                    ORDER BY d.DID
                    DESC LIMIT $start, $limit ";
        $resul = mysqli_query($conn,$queryy);
        $rowcount=  mysqli_num_rows($resul);
?>
    <div id="wrap">
        <div id="profile">
            
            <form method="POST" class="form" enctype="multipart/form-data">
                <fieldset>
                    <legend>Add Document</legend>
                    
                    <?php 
                        include ('../validate/document.php'); 
                        
                        if(isset($_SESSION['atmSuccess'])=="true"){
                            echo '<br> <div class="success">ATM Card was successfully added.</div> <br>';
                            unset($_SESSION['atmSuccess']); 
                        }
                        
                        if(isset($_SESSION['certSuccess'])=="true"){
                            echo '<br> <div class="success"> Certificate was successfully added.</div> <br>';
                            unset($_SESSION['certSuccess']); 
                        }
                        
                        if(isset($_SESSION['dlSuccess'])=="true"){
                            echo '<br> <div class="success"> Driving Lincence was successfully added.</div> <br>';
                            unset($_SESSION['dlSuccess']); 
                        }
                        
                        if(isset($_SESSION['letterSuccess'])=="true"){
                            echo '<br> <div class="success"> Letter was successfully added.</div> <br>';
                            unset($_SESSION['letterSuccess']); 
                        }
                        
                        if(isset($_SESSION['nidSuccess'])=="true"){
                            echo '<br> <div class="success"> National ID was successfully added.</div> <br>';
                            unset($_SESSION['nidSuccess']); 
                        }
                        
                        if(isset($_SESSION['novelSuccess'])=="true"){
                            echo '<br> <div class="success"> Novel was successfully added.</div> <br>';
                            unset($_SESSION['novelSuccess']); 
                        }
                        
                        if(isset($_SESSION['sidSuccess'])=="true"){
                            echo '<br> <div class="success"> Student ID was successfully added.</div> <br>';
                            unset($_SESSION['sidSuccess']); 
                        }
                        
                        if(isset($_SESSION['txtSuccess'])=="true"){
                            echo '<br> <div class="success"> Text Book was successfully added.</div> <br>';
                            unset($_SESSION['txtSuccess']); 
                        }
                        
                        if(isset($_SESSION['deedSuccess'])=="true"){
                            echo '<br> <div class="success"> Title Deed was successfully added.</div> <br>';
                            unset($_SESSION['deedSuccess']); 
                        }
                        
                        if(isset($_SESSION['transcriptSuccess'])=="true"){
                            echo '<br> <div class="success"> Transcript was successfully added.</div> <br>';
                            unset($_SESSION['transcriptSuccess']); 
                        }
                        
                        if(isset($_SESSION['voucherSuccess'])=="true"){
                            echo '<br> <div class="success"> Voucher was successfully added.</div> <br>';
                            unset($_SESSION['voucherSuccess']); 
                        }
                        
                        if(isset($_SESSION['workSuccess'])=="true"){
                            echo '<br> <div class="success"> Work ID was successfully added.</div> <br>';
                            unset($_SESSION['workSuccess']); 
                        }
                        
                        if(isset($_SESSION['passportSuccess'])=="true"){
                            echo '<br> <div class="success"> Passport was successfully added.</div> <br>';
                            unset($_SESSION['passportSuccess']); 
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
                        include 'document/atm.php';
                        include 'document/cert.php';
                        include 'document/dl.php';
                        include 'document/letter.php';
                        include 'document/id.php';
                        include 'document/novel.php';
                        include 'document/student-id.php';
                        include 'document/text.php';
                        include 'document/deed.php';
                        include 'document/transcript.php';
                        include 'document/voucher.php';
                        include 'document/work.php';
                        include 'document/passport.php';
                    ?>
                    
                </fieldset>
            </form>
            
            <form method="POST">
            <?php 
                //delete documents
                include '../validate/delete.php';
            
                if(isset($_SESSION['deleted'])=="true"){
                    if(isset($_SESSION['docsDeleted'])){
                        $docsDel = $_SESSION['docsDeleted'];
                    }
                    echo '<br> <div class="success"> <b>'.$docsDel.'</b> document(s) successfully deleted.</div> <br>';
                    unset($_SESSION['docsDeleted']); 
                    unset($_SESSION['deleted']); 
                }
                if($num11 < 1){
                    echo '<label class="registered">My Documents</label>';;
                    echo '<br><br>';
                    echo '<div class="warning"> You have not registered any documents. 
                                                <br> Safguard your documents by backing them up now 
                           </div>';
                }else{
                    
                    //mark documents as lost or okay
                    include '../validate/mark.php';
            
                    if(isset($_SESSION['mark'])=="true"){
                        if(isset($_SESSION['marked'])){
                            $no = $_SESSION['marked'];
                        }
                        if(isset($_SESSION['state'])){
                            $stat = $_SESSION['state'];
                        }
                        echo '<br> <div class="success"> <b>'.$no.'</b> document(s) successfully marked as <b>'.$stat.'</b>.</div> <br>';
                        unset($_SESSION['mark']);
                        unset($_SESSION['marked']);
                        unset($_SESSION['state']);
                    }
                    
                    
            ?>
                <label class="registered">My Documents <a style="color:black;font-size:14px;">(<?php echo $total_pages; ?>)</a> </label>
                <select name="selectMark">
                    <option value="">Mark Document(s) as</option>
                    <option value="Lost" onClick="return confirm('Mark selected document(s) as Lost??');">Lost</option>
                    <option value="Okay" onClick="return confirm('Mark selected document(s) as Okay??');">Okay</option>
                </select>

                <button name="mark" class="submit" type="submit" title="Submit marked documents">Submit</button>

                <select onchange="showHide(this)">
                    <option value="">View</option>
                    <option value="list">List</option>
                    <option value="details">Details</option>
                </select>

                <button name="delete" class="delete" type="submit" title="Delete Document(s)" onClick="return confirm('You are about to permanently delete selected document(s).\nWant to continue?');">Delete</button>

                <br><br>
                    <?php 
                        include 'view-list.php';
                        include 'view-details.php'; 
                    ?>
                </div>
            </form>
            <?php }?>
            
        </div>
    </div>
<?php include 'includes/footer.php';  ?>
