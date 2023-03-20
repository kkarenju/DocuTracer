<?php 
    include 'includes/header.php';  
    
    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }
    if (isset($_GET['status'])){
        $status = $_GET['status'];
    }
    if (isset($_GET['type'])){
        $doc = str_replace("-"," ",$_GET['type']);
        
    }
    
    //get page url
    $link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
    
    if($status=="Found"){
        $qry="SELECT CONCAT(fname,' ',sname) AS name,pic,type,id,date_reported,details
                FROM found 
                WHERE FID=".$id;
        $result=mysqli_query($conn,$qry); 
        $num=mysqli_num_rows($result);            
?>
    <!--change page title-->
    <script>
        $(document).ready(function ()
        {
            var doc = '<?php echo $doc; ?>';
            document.title = "Found "+doc+" | DocuTracer";
        });
    </script>
    
<?php 
    }else 
    if($status=="Lost"){ 
        $qry="SELECT CONCAT(u.fname,' ',u.sname) AS user,d.*,b.name,b.abbreviation,m.name AS market, s.name AS station,l.date_reported,l.details
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
                                SELECT MAX(date_reported) AS date_reported,MAX(time_reported)AS time_reported,details,DID
                                FROM lost
                                GROUP BY DID
                              ) AS l
                            ON l.DID = d.DID
                    WHERE d.status = 'Lost'
                    AND d.DID=".$id;
        $result=mysqli_query($conn,$qry); 
        $num=mysqli_num_rows($result);
 ?>
    <!--change page title-->
    <script>
        $(document).ready(function ()
        {
            var doc = '<?php echo $doc; ?>';
            document.title = "Lost "+doc+" | DocuTracer";
        });
    </script>
<?php } ?>

    <div id="wrap">
            <?php
                if($num <= 0){
                    echo '<div class="error"> 
                            Error retrieving document details!
                        </div>';
                }else
                {
                    while ($row = mysqli_fetch_array($result)) 
                    {
            ?>
        <div class="" id="lost-n-found">
            <a name="found"><h1><?php echo $status." ".$row['type']." Details";?></h1></a>
            
            <div id="details-image">
                              <?php
                                  //$pic = $row['pic'];
                                  $type = $row['type'];

                                  /*if($pic){
                                      echo    '<a href="uploads/documents/'.$pic.'" rel="prettyPhoto">
                                                  <img src="uploads/documents/'.$pic.'" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  {*/
                                      if($type === 'ATM Card'){
                                          echo    '<a href="images/atm-card.png" rel="prettyPhoto">
                                                      <img src="images/atm-card.png" alt="" oncontextmenu="return false">
                                                  </a>';
                                      }else
                                      if($type === 'Certificate'){
                                          echo    '<a href="images/cert.jpg" rel="prettyPhoto">
                                                      <img src="images/cert.jpg" alt="" oncontextmenu="return false">
                                                  </a>';
                                      }else
                                      if($type === "Driving License"){
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
                                      if($type === 'Text Book'){
                                          echo    '<a href="images/text-book.jpg" rel="prettyPhoto">
                                                      <img src="images/text-book.jpg" alt="" oncontextmenu="return false">
                                                  </a>';
                                      }else
                                      if($type === 'Title Deed'){
                                          echo    '<a href="images/title-deed.jpg" rel="prettyPhoto">
                                                      <img src="images/title-deed.jpg" alt="" oncontextmenu="return false">
                                                  </a>';
                                      }else
                                      if($type === 'Transcript'){
                                          echo    '<a href="images/transcript.jpg" rel="prettyPhoto">
                                                      <img src="images/transcript.jpg" alt="" oncontextmenu="return false">
                                                  </a>';
                                      }else
                                      if($type === 'Voucher'){
                                          echo    '<a href="images/voucher.jpg" rel="prettyPhoto">
                                                      <img src="images/voucher.jpg" alt="" oncontextmenu="return false">
                                                  </a>';
                                      }else
                                      if($type === 'Work ID'){
                                          echo    '<a href="images/work-id.jpg" rel="prettyPhoto">
                                                      <img src="images/work-id.jpg" alt="" oncontextmenu="return false">
                                                  </a>';
                                      }else
                                      if($type === 'Passport'){
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
                            if($row['type']=="Bank")
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
                              <label class="personal-info"> <?php echo $status; ?> </label>
                              <br>
                              <label class="details-title">Date:</label> 
                              <label class="personal-info"> <?php echo date_format(date_create($row['date_reported']),"d M, Y"); ?> </label>
                              <br><br>
                              <label class="details-title det">Details:</label>
                              <br>
                              <p><?php echo $row['details'];?></p>
                          </div>
                          
                            <div id="share">
                                <div style="float:left;margin-right:1%;">
                                <label class="details-title1">Share: <i class="fa fa-share-alt"></i></label>
                                </div>
                                
                                <div style="float:left;margin-right:1%;">
                                    <div class="fb-share-button" data-href="<?php echo $link;?>" data-layout="button" data-mobile-iframe="true"></div>
                                </div>
                                
                                <div style="float:left;margin-right:1%;">
                                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                                </div>
                                
                                <div style="float:left;margin-right:1%;">
                                    <a href="#" data-text="<?php echo $status." ".$row['type']." | Saka Solutions";?>" data-link="<?php echo $link;?>" class="mct_whatsapp_btn">Whatsapp</a>
                                </div>
                            </div>
                            
                            <!--whatsapp share button script-->
                            <script>
                                $(document).ready(function() {
                                    $(document).on("click", '.mct_whatsapp_btn', function() {
                                        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                                            var text = $(this).attr("data-text");
                                            var url = $(this).attr("data-link");
                                            var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
                                            var whatsapp_url = "whatsapp://send?text=" + message;
                                            window.location.href = whatsapp_url;
                                        } else {
                                            alert("Please use a mobile whatsapp supported device to Share this document");
                                        }
                                    });
                                });
                            </script>
                            
                            
                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                        </div>

                    </div>
       
<?php } } include 'includes/footer.php';  ?>
