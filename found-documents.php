<?php  
        $tableName="found";
        $targetpage = "found.php";
        $limit = 60;
    
        $sql = "SELECT COUNT(*) as num FROM $tableName WHERE status='0' "; 
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
        $s1=$s2="";
        if(isset($_GET['search'])){
            $search1= mysqli_real_escape_string($conn,$_GET['search']);            
            $s1=str_replace("-"," ",$search1);
            
            if(isset($_GET['id'])){
                $s2= mysqli_real_escape_string($conn,$_GET['id']);
            }
            
            
        $queryy = "SELECT CONCAT(f.fname,' ',f.sname) AS user,f.FID,b.name AS bank,b.abbreviation,m.name AS market, s.name AS station,f.date_reported
                    FROM $tableName f
                    LEFT JOIN bank b 
                            ON f.BID = b.BID 
                    LEFT JOIN market m
                            ON f.SMID = m.SMID
                    LEFT JOIN station s
                            ON f.SID = s.SID
                    WHERE (f.status = '0'
                    AND state= '0'
                    AND f.type = '$s1')
                    OR (f.status = 'Lost'
                    AND state = '1'
                    AND f.type = '$s1'
                    AND f.id = '$s2')
                    ORDER BY f.DID
                    DESC LIMIT $start, $limit ";
        $resul = mysqli_query($conn,$queryy);
        $rowcount=  mysqli_num_rows($resul);
        
        }else
            {
            $queryy = "SELECT CONCAT(f.fname,' ',f.sname) AS user,f.FID,f.pic,f.type,f.id,b.name AS bank,b.abbreviation,m.name AS market, s.name AS station,f.date_reported
                    FROM $tableName f
                    LEFT JOIN bank b 
                            ON f.BID = b.BID 
                    LEFT JOIN market m
                            ON f.SMID = m.SMID
                    LEFT JOIN station s
                            ON f.SID = s.SID
                    WHERE f.status = 'Lost' 
                    AND f.state = '1'
                    ORDER BY f.FID
                    DESC LIMIT $start, $limit ";
        $resul = mysqli_query($conn,$queryy);
        $rowcount=  mysqli_num_rows($resul);
        }
?>
<div id="wrap">
    <form method="POST">
        <?php include 'validate/search.php'; ?>
    <div id="cover-up">
            <label class="registered">Lost Documents</label>
         <div style="float:left;margin-right:1%;"><br>
            <label class="search">Search by:</label>
        </div>
        <div class="doc">
            <label class="profile-title">Type:</label>
            <br>
            <select name="s1" id="document-type" onchange="showOptions(this)">
                <option value="">Select Document Type</option>
                <option value="ATM Card" <?php if($s1=="ATM Card"){echo 'selected="selected"';} ?> >ATM Card</option>
                <option value="Certificate" <?php if($s1=="Certificate"){echo 'selected="selected"';} ?> >Certificate</option>
                <option value="Driving License" <?php if($s1=="Driving License"){echo 'selected="selected"';} ?> >Driving License</option>
                <option value="Letter" <?php if($s1=="Letter"){echo 'selected="selected"';} ?> >Letter</option>
                <option value="National ID" <?php if($s1=="National ID"){echo 'selected="selected"';} ?> >National ID</option>
                <option value="Novel" <?php if($s1=="Novel"){echo 'selected="selected"';} ?> >Novel</option>
                <option value="Student ID" <?php if($s1=="Student ID"){echo 'selected="selected"';} ?> >Student ID</option>
                <option value="Text Book" <?php if($s1=="Text Book"){echo 'selected="selected"';} ?> >Text Book</option>
                <option value="Title Deed" <?php if($s1=="Title Deed"){echo 'selected="selected"';} ?> >Title Deed</option>
                <option value="Transcript" <?php if($s1=="Transcript"){echo 'selected="selected"';} ?> >Transcript</option>
                <option value="Voucher" <?php if($s1=="Voucher"){echo 'selected="selected"';} ?> >Voucher</option>
                <option value="Work ID" <?php if($s1=="Work ID"){echo 'selected="selected"';} ?> >Work ID</option>
                <option value="Passport" <?php if($s1=="Passport"){echo 'selected="selected"';} ?> >Passport</option>
            </select>
        </div>
        <div style="float:left;margin-right:1%;"><br>
            <label class="search">&</label>
        </div>
        <div class="doc">  
            <label class="profile-title">Number:</label>
            <br>
            <input type="text" name="s2" value="<?php echo $s2;?>" placeholder="Document No.">
        </div>
                
        
            <div class="doc">
                <label class="profile-title">&nbsp;</label>
            <br>
                <button name="search" type="submit">Search <i class="fa fa-search"></i></button>
            </div>
        
    </div>
    </form>
    <?php
        if($rowcount < 1){
            echo '<div class="success"> There are no found documents. 
                    <br> Safeguard your documents by backing them up now 
                 </div>';
        }else{
             if(isset($page)){
    ?>
                <div style="margin-top:2%;margin-bottom:3%;text-align:center;">
                    <?php include 'includes/pagination.php';?>
                </div>
    <?php } ?>
    
        <div class="boxes-full" class="view-details">
            <div id="portfolio-container">
                <?php 
                        mysqli_data_seek($resul,0);
                        while ($row1 = mysqli_fetch_array($resul)) 
                        {
                ?>        
                
                <div class="element web">
                    <div class="portfoliowrap">
                        
                      <div class="portfolioimage">
                          <?php
                          
                              $pic = $row1['pic'];
                              $type = $row1['type'];
                              
                              /*if($pic){
                                  echo    '<a href="uploads/documents/'.$pic.'" rel="prettyPhoto">
                                              <img src="uploads/documents/'.$pic.'" alt="" oncontextmenu="return false">
                                          </a>';
                              }else
                              {*/
                                  if($type == 'ATM Card'){
                                      echo    '<a href="images/atm-card.png" rel="prettyPhoto">
                                                  <img src="images/atm-card.png" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Certificate'){
                                      echo    '<a href="images/cert.jpg" rel="prettyPhoto">
                                                  <img src="images/cert.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Letter'){
                                      echo    '<a href="images/letter.jpg" rel="prettyPhoto">
                                                  <img src="images/letter.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'National ID'){
                                      echo    '<a href="images/id.jpg" rel="prettyPhoto">
                                                  <img src="images/id.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Novel'){
                                      echo    '<a href="images/novel.jpg" rel="prettyPhoto">
                                                  <img src="images/novel.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Student ID'){
                                      echo    '<a href="images/student-id.jpg" rel="prettyPhoto">
                                                  <img src="images/student-id.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Text Book'){
                                      echo    '<a href="images/text-book.jpg" rel="prettyPhoto">
                                                  <img src="images/text-book.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Title Deed'){
                                      echo    '<a href="images/title-deed.jpg" rel="prettyPhoto">
                                                  <img src="../images/title-deed.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Transcript'){
                                      echo    '<a href="images/transcript.jpg" rel="prettyPhoto">
                                                  <img src="images/transcript.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Voucher'){
                                      echo    '<a href="images/voucher.jpg" rel="prettyPhoto">
                                                  <img src="images/voucher.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Work ID'){
                                      echo    '<a href="images/work-id.jpg" rel="prettyPhoto">
                                                  <img src="images/work-id.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Passport'){
                                      echo    '<a href="images/passport.jpg" rel="prettyPhoto">
                                                  <img src="images/passport.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  } 
                              //}
                          ?>
                      </div>

                      <div class="text">
                          <label class="details-title">Type:</label> 
                          <label class="personal-info type"> <?php echo $row1['type']; ?> </label>
                          <br>
                          <?php 
                            if($row1['type']=="ATM Card")
                            {
                          ?>
                            <label class="details-title">Bank:</label> 
                            <label class="personal-info"> <?php echo $row1['bank']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row1['type']=="Certificate")
                            {
                          ?>
                            <label class="details-title">School:</label> 
                            <label class="personal-info"> <?php echo $row1['school']; ?> </label>
                            <br>   
                          <?php
                            }else
                            if($row1['type']=="Driving License")
                            {
                          ?>
                            <label class="details-title">Country:</label> 
                            <label class="personal-info"> <?php echo $row1['country']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row1['type']=="Letter")
                            {
                          ?>
                            <label class="details-title">Category:</label> 
                            <label class="personal-info"> <?php echo $row1['category']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row1['type']=="National ID")
                            {
                          ?>
                            <label class="details-title">Country:</label> 
                            <label class="personal-info"> <?php echo $row1['country']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row1['type']=="Student ID")
                            {
                          ?>
                            <label class="details-title">School:</label> 
                            <label class="personal-info"> <?php echo $row1['school']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row1['type']=="Title Deed")
                            {
                          ?>
                            <label class="details-title">Country:</label> 
                            <label class="personal-info"> <?php echo $row1['country']; ?> </label>
                            <br>
                           <?php
                            }else
                            if($row1['type']=="Transcript")
                            {
                          ?>
                            <label class="details-title">School:</label> 
                            <label class="personal-info"> <?php echo $row1['school']; ?> </label>
                            <br> 
                           <?php
                            }else
                            if($row1['type']=="Voucher")
                            {
                                if($row1['type']=="Gas Station")
                                {
                          ?>
                            <label class="details-title">Gas Station:</label> 
                            <label class="personal-info"> <?php echo $row1['school']; ?> </label>
                            <br>
                          <?php
                            }else
                                if($row1['type']=="Market")
                                {
                          ?>
                            <label class="details-title">Market:</label> 
                            <label class="personal-info"> <?php echo $row1['school']; ?> </label>
                            <br>
                          <?php 
                                }
                            }else
                            if($row1['type']=="Work ID")
                            {
                          ?>
                            <label class="details-title">Work:</label> 
                            <label class="personal-info"> <?php echo $row1['work']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row1['type']=="Passport")
                            {
                          ?>
                            <label class="details-title">Country:</label> 
                            <label class="personal-info"> <?php echo $row1['country']; ?> </label>
                            <br> 
                           <?php
                            }else{
                           ?>
                            <label class="details-title">&nbsp;</label> 
                            <label class="personal-info"> &nbsp; </label>
                            <br>
                           <?php } ?>
                            
                            
                          <label class="details-title">Name:</label> 
                          <label class="personal-info"> 
                              <b> 
                                <?php echo $row1['user']; ?> 
                              </b>
                          </label>
                          <br>
                          <label class="details-title">No:</label> 
                          <label class="personal-info"> <?php echo substr($row1['id'],2)."****".substr($row1['id'],-2); ?> </label>
                          <br>
                           <label class="details-title">Found:</label> 
                            <label class="personal-info"> <?php echo date_format(date_create($row1['date_reported']),"d M, Y"); ?> </label>
                          <br>
                      </div>
                        <div class="text-details">
                            <?php $doc=str_replace(" ","-",$type); ?>
                            <a href="details.php?id=<?php echo $row1['FID'].'&status=Found&type='.$doc;?> ">View Details</a>
                        </div>
                    </div>

                </div>
            <?php
                }
            ?> 
          
            </div>
        
            <?php
                if(isset($page)){
            ?>
                <div style="margin-top:2%;margin-bottom:3%;text-align:center;">
                <?php include 'includes/pagination.php';?>
                </div>
            <?php } ?>
    </div>
        <?php } ?>
</div>