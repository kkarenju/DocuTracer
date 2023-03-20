    <div class="boxes-full" id="lost-n-found">
        <a name="lost"><h1>Lost Documents</h1></a>
        <?php
            $qry="SELECT CONCAT(u.fname,' ',u.sname) AS user,d.*,b.name AS bank,b.abbreviation,m.name AS market, s.name AS station,l.date_reported
                    FROM doc d
                    LEFT JOIN member u
                        ON d.MID = u.MID
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
                    WHERE d.status = 'Lost' 
                    AND d.state='0'
                    ORDER BY d.DID DESC
                    LIMIT 0,20";
            $result=mysqli_query($conn,$qry); 
            $num=mysqli_num_rows($result);

            if($num <= 0){
                echo '<div class="success"> 
                        There are no lost documents in the system!
                        <br>
                        Safeguard your documents by <a href="login.php">registering</a> them now.
                    </div>';
            }else
            {
        ?>
            <div id="portfolio-container">
                <?php 
                    while ($row = mysqli_fetch_array($result)) 
                    {
                ?>        
                
                <div class="element web">
                    <div class="portfoliowrap">
                      <div class="portfolioimage">
                          <?php
                              //$pic = $row['pic'];
                              $type = $row['type'];

                              /*if($pic){
                                  echo    '<a href="uploads/documents/'.$pic.'" rel="prettyPhoto">
                                              <img src="uploads/documents/'.$pic.'" alt="" oncontextmenu="return false">
                                          </a>';
                              }else
                              {*/
                                  if($type == "ATM Card"){
                                      echo    '<a href="images/atm-card.png" rel="prettyPhoto">
                                                  <img src="images/atm-card.png" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == "Certificate"){
                                      echo    '<a href="images/cert.jpg" rel="prettyPhoto">
                                                  <img src="images/cert.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == "Driving License"){
                                      echo    '<a href="images/dl.jpg" rel="prettyPhoto">
                                                  <img src="images/dl1.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type === 'Letter'){
                                      echo    '<a href="images/letter.jpg" rel="prettyPhoto">
                                                  <img src="images/letter.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type === 'National ID'){
                                      echo    '<a href="images/id.jpg" rel="prettyPhoto">
                                                  <img src="images/id.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type === 'Novel'){
                                      echo    '<a href="images/novel.jpg" rel="prettyPhoto">
                                                  <img src="images/novell.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type === 'Student ID'){
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
                                                  <img src="images/title-deed.jpg" alt="" oncontextmenu="return false">
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
                          <label class="personal-info type"> <?php echo $row['type']; ?> </label>
                          <br>
                          <?php 
                            if($row['type']=="ATM Card")
                            {
                          ?>
                            <label class="details-title">Bank:</label> 
                            <label class="personal-info"> <?php echo $row['bank']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row['type']=="Certificate")
                            {
                          ?>
                            <label class="details-title">School:</label> 
                            <label class="personal-info"> <?php echo $row['school']; ?> </label>
                            <br>   
                          <?php
                            }else
                            if($row['type']=="Driving License")
                            {
                          ?>
                            <label class="details-title">Country:</label> 
                            <label class="personal-info"> <?php echo $row['country']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row['type']=="Letter")
                            {
                          ?>
                            <label class="details-title">Category:</label> 
                            <label class="personal-info"> <?php echo $row['category']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row['type']=="National ID")
                            {
                          ?>
                            <label class="details-title">Country:</label> 
                            <label class="personal-info"> <?php echo $row['country']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row['type']=="Student ID")
                            {
                          ?>
                            <label class="details-title">School:</label> 
                            <label class="personal-info"> <?php echo $row['school']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row['type']=="Title Deed")
                            {
                          ?>
                            <label class="details-title">Country:</label> 
                            <label class="personal-info"> <?php echo $row['country']; ?> </label>
                            <br>
                           <?php
                            }else
                            if($row['type']=="Transcript")
                            {
                          ?>
                            <label class="details-title">School:</label> 
                            <label class="personal-info"> <?php echo $row['school']; ?> </label>
                            <br> 
                           <?php
                            }else
                            if($row['type']=="Voucher")
                            {
                                if($row['type']=="Gas Station")
                                {
                          ?>
                            <label class="details-title">Gas Station:</label> 
                            <label class="personal-info"> <?php echo $row1['school']; ?> </label>
                            <br>
                          <?php
                            }else
                                if($row['type']=="Market")
                                {
                          ?>
                            <label class="details-title">Market:</label> 
                            <label class="personal-info"> <?php echo $row1['school']; ?> </label>
                            <br>
                          <?php 
                                }
                            }else
                            if($row['type']=="Work ID")
                            {
                          ?>
                            <label class="details-title">Work:</label> 
                            <label class="personal-info"> <?php echo $row['work']; ?> </label>
                            <br> 
                          <?php
                            }else
                            if($row['type']=="Passport")
                            {
                          ?>
                            <label class="details-title">Country:</label> 
                            <label class="personal-info"> <?php echo $row['country']; ?> </label>
                            <br> 
                           <?php
                            }else{
                           ?>
                            <label class="details-title">&nbsp;</label> 
                            <label class="personal-info"> &nbsp; </label>
                            <br>
                           <?php } ?>
                          
                          
                          <label class="details-title">Name:</label> 
                          <label class="personal-info"> <?php echo $row['user']; ?> </label>
                          <br>
                          <label class="details-title">No:</label> 
                          <label class="personal-info"> <?php echo substr($row['id'],2)."****".substr($row['id'],-2); ?> </label>
                          <br>
                          <label class="details-title">Status:</label> 
                          <label class="personal-info"> Lost </label>
                          <br>
                          <label class="details-title">Reported:</label> 
                          <label class="personal-info"> <?php echo date_format(date_create($row['date_reported']),"d M, Y"); ?> </label>
                      </div>
                        <div class="text-details">
                            <?php $doc=str_replace(" ","-",$type); ?>
                            <a href="details.php?id=<?php echo $row['DID'].'&status=Lost&type='.$doc;?> ">View Details</a>
                        </div>

                    </div>

                </div>
            <?php
                }
            ?> 
          
            </div>
        
            <?php
                if($num > 20 ){
            ?>
                <div class="see-more">
                    <a href="lost.php">see more</a>
                </div>
            <?php
             }}
            ?>
    </div>








