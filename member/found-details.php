<div class="boxes-full" class="view-details">
            <div id="portfolio-container">
                <?php 
                    
                    if($rowcount <= 0){
                        echo '<div class="error"><strong>No records found</strong></div>';
                    }else
                    {
                        mysqli_data_seek($resul,0);
                        while ($row1 = mysqli_fetch_array($resul)) 
                        {
                ?>        
                
                <div class="element web">
                    <div class="portfoliowrap">
                        <?php $id =$row1['FID']; ?>
                            <div>  
                                <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $id; ?> ">
                                <a href="" onclick="alert('This part of the system is currently under maintenance')" ><img src="../images/edit.png" style="cursor:pointer;float:right;" width="15" height="15" alt="edit"/></a>
                            </div>
                       
                      <div class="portfolioimage">
                          <?php
                          
                              $pic = $row1['pic'];
                              $type = $row1['type'];
                              
                              if($pic){
                                  echo    '<a href="../uploads/documents/'.$pic.'" rel="prettyPhoto">
                                              <img src="../uploads/documents/'.$pic.'" alt="" oncontextmenu="return false">
                                          </a>';
                              }else
                              {
                                  if($type == 'ATM Card'){
                                      echo    '<a href="../images/atm-card.jpg" rel="prettyPhoto">
                                                  <img src="../images/atm-card.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Certificate'){
                                      echo    '<a href="../images/cert.jpg" rel="prettyPhoto">
                                                  <img src="../images/cert.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Letter'){
                                      echo    '<a href="../images/letter.jpg" rel="prettyPhoto">
                                                  <img src="../images/letter.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'National ID'){
                                      echo    '<a href="../images/id.jpg" rel="prettyPhoto">
                                                  <img src="../images/id.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Novel'){
                                      echo    '<a href="../images/novel.jpg" rel="prettyPhoto">
                                                  <img src="../images/novel.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Student ID'){
                                      echo    '<a href="../images/student-id.jpg" rel="prettyPhoto">
                                                  <img src="../images/student-id.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Text Book'){
                                      echo    '<a href="../images/text-book.jpg" rel="prettyPhoto">
                                                  <img src="../images/text-book.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Title Deed'){
                                      echo    '<a href="../images/title-deed.jpg" rel="prettyPhoto">
                                                  <img src="../images/title-deed.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Transcript'){
                                      echo    '<a href="../images/transcript.jpg" rel="prettyPhoto">
                                                  <img src="../images/transcript.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Voucher'){
                                      echo    '<a href="../images/voucher.jpg" rel="prettyPhoto">
                                                  <img src="../images/voucher.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Work ID'){
                                      echo    '<a href="../images/work-id.jpg" rel="prettyPhoto">
                                                  <img src="../images/work-id.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  }else
                                  if($type == 'Passport'){
                                      echo    '<a href="../images/passport.jpg" rel="prettyPhoto">
                                                  <img src="../images/passport.jpg" alt="" oncontextmenu="return false">
                                              </a>';
                                  } 
                              }
                          ?>
                      </div>

                      <div class="text">
                          <label class="details-title">Type:</label> 
                          <label class="personal-info type"> <?php echo $row1['type']; ?> </label>
                          <br>
                          <label class="details-title">Name:</label> 
                          <label class="personal-info"> 
                              <b> 
                                <?php echo $row1['fname'].' '.$row1['sname']; ?> 
                              </b>
                          </label>
                          <br>
                          <label class="details-title">No:</label> 
                          <label class="personal-info"> <?php echo $row1['id']; ?> </label>
                          <br>
                           <label class="details-title">Reported:</label> 
                            <label class="personal-info"> <?php echo date_format(date_create($row1['date_reported']),"d M, Y"); ?> </label>
                          <br>
                      </div>

                    </div>

                </div>
            <?php
                }}
            ?> 
          
            </div>
        
            <?php
                if(isset($page)){
            ?>
                <div style="margin-top:2%;margin-bottom:3%;text-align:center;">
                <?php include '../includes/pagination.php';?>
                </div>
            <?php } ?>
    </div>