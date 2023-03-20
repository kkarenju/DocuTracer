<?php 
    $pg = 'profile';
    include 'includes/header.php';
    
    if(!isset($_GET['id'])){
        echo '<div class="error">Error occured ... link does not exist!</div>';
    }else{
        
        $array = unserialize(base64_decode($_GET['id']));
        $arrays=implode(',',$array);
        
        // Get page data
        $queryy = "SELECT *
                    FROM doc d
                    WHERE DID IN($arrays)
                    ORDER BY DID 
                    DESC";
        $resul = mysqli_query($conn,$queryy);
        $rowcount=  mysqli_num_rows($resul);
        
?>
<div id="wrap">
    <div id="cover-up">
        <label class="registered">Details</label>
    </div>
    <?php
        if($rowcount < 1){
            echo '<div class="warning">Error occured while trying to display document(s).</div>';
        }else{
    ?>
    <form method="POST" class="form" enctype="multipart/form-data">
        <?php include ('../validate/marked.php'); ?>
        <div class="view-list">
                <table id="table" class="display-table view-striped">
                    <tr class="title">
                        
                        <th style="width:50px;height:30px;">#</th>
                        <th>Type</th>
                        <th>Document Number</th>
                        <th> Status</th>
                    </tr>
                    
                    <?php 
                        if($rowcount<=0){
                            echo '<tr class="tr"><td colspan="8"><div class="error"><strong>No records found</strong></div><td></tr>';
                        }else{
                            $no = 1;
                        while($row = mysqli_fetch_array($resul)) { 
                    ?>
                    
                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td> <?php echo $row['type'];?> </td>
                            <td> <?php echo $row['id'];?> </td>
                            <td>Lost</td>
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
            <br><br>
            
            <div class="doc1">
                <label class="profile-title">Details:</label>
                <br>
                <textarea name="details" rows="7" title="details" maxlength="1050" placeholder="Lost document details (1050 characters max)..."><?php echo $details;?></textarea>
            </div>
            
            <div style="text-align:center;margin-top:2%;">
                <button name="complete" class="submit" type="submit">Complete</button>
            </div>
        </form>
    <?php } ?>
</div>
    <?php } include 'includes/footer.php';  ?>