<div class="document voucher">
    
    <br><br>
    
    <div class="block">
        <div class="doc">
            <label class="profile-title">Firstname:</label>
            <br>
            <input type="text" name="fname9" value="<?php echo $f9; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Surname:</label>
            <br>
            <input type="text" name="sname9" value="<?php echo $s9; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Voucher No:</label>
            <br>
            <input type="text" name="vNo" value="<?php echo $vId; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Category:</label>
            <br>
            <select name="vCategory" id="voucher" onchange="displayVoucher(this)">
                <option value="">Select Category</option>
                <option value="Gas Station" <?php if($vCategory == "Gas Station"){echo 'selected="selected"';}?> > Gas Station </option>
                <option value="Market" <?php if($vCategory == "Market"){echo 'selected="selected"';}?> > Market </option>    
            </select>
        </div>

        <div class="doc market">
            <label class="profile-title">Market:</label>
            <br>
            <select name="market">
                <option value="" <?php if($market == ""){echo 'selected="selected"';}?> >Select Supermarket</option>
                <?php 
                    if(!isset($nums)){
                        echo '<option value="">Oops! No records(s) found!</option>';
                    }else{
                        while ($rows = mysqli_fetch_array($results)) {
                ?>

                    <option value="<?php echo $rows['SMID']; ?>" <?php if($market == $rows['SMID']){echo 'selected="selected"';}?> > <?php echo $rows['name']; ?> </option>

                <?php  }} ?>

            </select>
        </div>
        
        
        <div class="doc station">
            <label class="profile-title">Gas Station:</label>
            <br>
            <select name="station">
                <option value="" <?php if($station == ""){echo 'selected="selected"';}?> > Select Gas Station</option>
                <?php 
                    if(!isset($nums1)){
                        echo '<option value="">Oops! No records(s) found!</option>';
                    }else{
                        mysqli_data_seek($results1,0);
                        while ($rows1 = mysqli_fetch_array($results1)) {
                ?>

                    <option value="<?php echo $rows1['SID']; ?>" <?php if($station == $rows1['SID']){echo 'selected="selected"';}?> > <?php echo $rows1['name']; ?> </option>

                <?php  }} ?>

            </select>
        </div>
        
        <div class="doc">
            <label class="profile-title">Photo:</label>
            <br>
            <input type="file" name="vFile">
        </div>
    </div>
    
    <div class="doc1">
        <label class="profile-title">Details:</label>
        <br>
        <textarea name="details10" rows="7" title="details" maxlength="1050" placeholder="Found document details (1050 characters max)..."><?php echo $details10;?></textarea>
    </div>
    
    <button name="voucher" class="submit" type="submit">Add</button>
</div>
