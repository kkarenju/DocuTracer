            <div class="view-list">
                <table id="table" class="display-table view-striped">
                    <tr class="title">
                        
                        <th style="width:50px;height:30px;">Select</th>
                        <th> Type</th>
                        <th>Name</th>
                        <th> Number</th>
                        <th> Reported</th>
                        <th> Level</th>
                        <th> Country</th>
                        <th> Bank</th>
                        <th style="width:50px;"> Edit</th>
                    </tr>
                    
                    <?php 
                        if($rowcount<=0){
                            echo '<tr class="tr"><td colspan="8"><div class="error"><strong>No records found</strong></div><td></tr>';
                        }else{
                        while($row = mysqli_fetch_array($resul)) { 
                    ?>
                    
                        <tr>
                            <td>
                                <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['FID']; ?>">
                            </td>
                            <td> <?php echo $row['type'];?> </td>
                            <td> <?php echo $row['fname'].' '.$row['sname'];?> </td>
                            <td> <?php echo $row['id'];?> </td>
                            <td> <?php echo date_format(date_create($row['date_reported']),"d M, Y");?> </td>
                            <td> 
                                <?php if($row['level']){echo $row['level'];} else{ echo '<em>N/A</em>'; } ?> 
                            </td>
                            <td> <?php if($row['country']){ echo $row['country']; }else{ echo '<em>N/A</em>'; } ?> </td>
                            <td> <?php if($row['name']){ echo $row['name']; }else{ echo '<em>N/A</em>'; } ?> </td>
                            <td style="width:50px;">
                                <a href="" onclick="alert('This part of the system is currently under maintenance')"> <img src="../images/edit.png" style="cursor:pointer;" width="15" height="15" alt="edit"/></a>
                            </td>
                        </tr>
                        
                    
                    <?php }}?>
            </table>
            
            <?php
                if(isset($page)){
            ?>
                <div style="margin-top:2%;padding-bottom:3%;text-align:center;">
                <?php include '../includes/pagination.php';?>
                </div>
            <?php } ?>
            </div>