<?php 
    $pg = 'profile';
    include 'includes/header.php';  
    
    $tableName="doc";
    $targetpage = "view-product.php";
    $limit = 15;
    
    $sql = "SELECT COUNT(*) as num FROM $tableName"; 
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
    
    
    $query1 = "SELECT d.*,b.name,b.abbreviation
                FROM $tableName d
                LEFT JOIN bank b 
                ON d.BID = b.BID 
                WHERE d.MID='$profileID' 
                ORDER BY d.type 
                ASC LIMIT $start, $limit ";
    $result = mysqli_query($conn,$query1);
    $rowcount=  mysqli_num_rows($result);
?>
    <div id="wrap">
        <div id="profile">
            
            <form method="POST">
                <fieldset>
                    <legend>Add Document</legend>
                    <div>
                        <select name="type" id="type">
                            <option value="">Select Document Type</option>
                            <option value="ATMCard">ATM Card</option>
                            <option value="Draft">Draft</option>
                            <option value="Certificate">Certificate</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Letter">Letter</option>
                            <option value="National ID">National ID</option>
                            <option value="Novel">Novel</option>
                            <option value="Receipt">Receipt</option>
                            <option value="Student ID">Student ID</option>
                            <option value="Text Book">Text Book</option>
                            <option value="Title Deed">Title Deed</option>
                            <option value="Transcript">Transcript</option>
                            <option value="Voucher">Voucher</option>
                            <option value="Work ID">Work ID</option>
                            <option value="Passport">Passport</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                        
                    <?php 
                        include 'document/atm.php';
                    ?>
                        
                    

                </fieldset>

            </form>
            
            <label class="registered">My Documents</label>
            <select>
                <option value="">Mark Document(s) as</option>
                <option value="Lost" onClick="return confirm('Mark selected document(s) as Lost??');">Lost</option>
                <option value="Ok" onClick="return confirm('Mark selected document(s) as Okay??');">Okay</option>
            </select>
            
            <button name="mark" class="submit" type="submit" title="Submit marked documents">Submit</button>
            
            <select>
                <option value="">View</option>
                <option value="list">List</option>
                <option value="details">Details</option>
            </select>
            <br><br>
                <table id="table" class="display-table view-striped">
                    <tr class="title">
                        
                        <th style="width:50px;">
                            <button type="submit" name="delete" onClick="return confirm('Are you sure you want to delete??');">
                                <input type="image"style="cursor:pointer;width:30px;" src="../images/del.png"  border="0" alt="Submit" />
                            </button>
                        </th>
                        <th>Doc</th>
                        <th> Type</th>
                        <th> Number</th>
                        <th> Status</th>
                        <th> Level</th>
                        <th> Country</th>
                        <th> Bank</th>
                        <th style="width:50px;"> Edit</th>
                    </tr>
                    
                    <?php 
                        if($rowcount<=0){
                            echo '<tr class="tr"><td colspan="8"><div class="error"><strong>No records found</strong></div><td></tr>';
                        }else{
                        while($row = mysqli_fetch_array($result)) { 
                    ?>
                    
                        <tr>
                            <td>
                                <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['DID']; ?>">
                            </td>
                            <td>
                                <img src="../uploads/documents/<?php echo $row['pic'] ?>" alt="<?php echo $row['type']; ?>" class="pic" width="20" height="20"/>
                            </td>
                            <td> <?php echo $row['type'];?> </td>
                            <td> <?php echo $row['id'];?> </td>
                            <td> <?php echo $row['status'];?> </td>
                            <td> <?php echo $row['level'];?> </td>
                            <td> <?php echo $row['country'];?> </td>
                            <td> <?php echo $row['name'];?> </td>
                            <td style="width:50px;">
                                <a href="update-document.php?id=<?php echo $row['DID']?>"><img src="../images/edit.png" style="cursor:pointer;" width="15" height="15" alt="edit"/></a>
                            </td>
                        </tr>
                        
                    
                    <?php }}?>
            </table>
            
            <?php
                if(isset($_GET['page'])){
            ?>
                <div style="margin-top:1%;text-align:center;">
                <?php include 'includes/pagination.php';?>
                </div>
            <?php }?>
            
        </div>
    </div>
<?php include 'includes/footer.php';  ?>
