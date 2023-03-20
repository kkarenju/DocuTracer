<?php 
        $tableName="doc";
        $targetpage = "new-Document.php";
        $limit = 1;

        $sql = "SELECT COUNT(DISTINCT d.DID) as num
                FROM $tableName d
                LEFT JOIN member m
                    ON d.MID = m.MID
                WHERE d.state = '1'
                GROUP BY d.date_registered,d.time_registered
                "; 
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
        
        // Get page data
        $queryy = "SELECT d.*,CONCAT (m.fname,' ',m.sname) AS name,m.gender,m.pic as user,m.mail,m.phone
                    FROM doc d
                    LEFT JOIN member m
                    ON d.MID = m.MID
                    WHERE state = '1'
                    GROUP BY m.MID,d.date_registered,time_registered
                    ORDER BY d.DID 
                    DESC LIMIT $start, $limit ";
        $resul = mysqli_query($conn,$queryy);
        $rowcount=  mysqli_num_rows($resul);
        

        if($rowcount < 1){
            echo '<div class="warning">Error occured while trying to display document(s).</div>';
        }else{
            
            if($rowcount<=0){
                echo '<tr class="tr"><td colspan="8"><div class="error"><strong>No records found</strong></div><td></tr>';
             }else{
                $no = 1;
                while($row = mysqli_fetch_array($resul)) 
                { 
    ?>
    <form method="POST" class="form" enctype="multipart/form-data">
        <?php //include ('validate/mark.php'); ?>
        <div id="user">
            <h3>User Details</h3>
            <div class="details">
            <div class="user-details">
                <?php
                if(isset($row['user'])){
                    echo '<img src="../../uploads/profile/'.$row['user'].'" oncontextmenu="return false">';
                }else
                {
                    if($row['gender']=="Male"){
                        echo '<img src="../../images/male-user.png" oncontextmenu="return false">';
                    }else
                    if($row['gender']=="Female"){
                        echo '<img src="../../images/female-user.png" oncontextmenu="return false">';
                    }else
                    if($row['gender']=="Other"){
                        echo '<img src="../../images/other-user.png" oncontextmenu="return false">';
                    }
                }
                ?>
                
            </div>
            
            <div class="user-details">
                <label class="title">Name:</label>
                <br>
                <label><?php echo $row['name'];?></label>
            </div>
            
            <div class="user-details">
                <label class="title">Gender:</label>
                <br>
                <label><?php echo $row['gender'];?></label>
            </div >
            
            <div class="user-details">
                <label class="title">Phone:</label>
                <br>
                <label><?php echo $row['phone'];?></label>
            </div>
            
            <div class="user-details">
                <label class="title">Mail:</label>
                <br>
                <label><?php echo $row['mail'];?></label>
            </div>
           </div>
        </div>
        
        
        <div class="view-list">
                <table id="table" class="display-table view-striped">
                    <tr class="title">
                        <th style="width:50px;">Select</th>
                        <th style="width:20px;height:30px;">#</th>
                        <th>Pic</th>
                        <th>Type</th>
                        <th>Document Number</th>
                        <th> Status</th>
                        <th style="width:130px;">Date</th>
                        <th style="width:70px;">Time</th>
                        <th>View</th>
                    </tr>
                        <tr>
                            <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['DID']; ?>"></td>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <div id="pic">
                                    <?php 
                                        /*if(isset($row['pic'])){
                                            echo    '<a href="../../uploads/documents/'.$row['pic'].'" rel="prettyPhoto">
                                                        <img src="../../uploads/documents/'.$row['pic'].'" alt="" oncontextmenu="return false">
                                                    </a>';
                                        }else{
                                            echo    '<a href="../../images/doc.png" rel="prettyPhoto">
                                                        <img src="../../images/doc.png" alt="" oncontextmenu="return false">
                                                    </a>';
                                            }*/
                                    ?>
                                </div>
                            </td>
                            <td> <?php echo $row['type'];?> </td>
                            <td> <?php echo $row['id'];?> </td>
                            <td>Lost</td>
                            <td><?php echo date_format(date_create($row['date_registered']),"D,d-M-Y");?></td>
                            <td><?php echo date("g:i A", strtotime($row['time_registered']));?></td>
                            <td>
                                <a class="view">
                                <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                        
                    
                    
            </table>
            
            <?php
                if(isset($page)){
            ?>
                <div style="margin-top:2%;padding-bottom:0px;text-align:center;">
                <?php include '../../includes/pagination.php';?>
                </div>
            <?php } ?>
            </div>
            
            <br><br>
            
            <div class="doc1">
                <label class="profile-title">Details:</label>
                <br>
                <textarea name="details" rows="7" title="details" maxlength="1050" readonly placeholder="Lost document details (1050 characters max)..."><?php //echo $row['details'];?></textarea>
            </div>
            
            <div style="text-align:center;margin-top:2%;">
                <button name="complete" class="submit" type="submit">Approve</button>
                <button name="delete" class="delete" type="submit" title="Reject Document(s)" onClick="return confirm('You are about to disapprove selected document(s).\nWant to continue?');">Reject</button>
                
            </div>
        </form>
        <?php }}} ?>