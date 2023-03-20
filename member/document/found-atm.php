<div class="document atm">
    
    <br><br>
    
    <div class="block">
        <div class="doc">
            <label class="profile-title">Firstname:</label>
            <br>
            <input type="text" name="fname" value="<?php echo $f; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Surname:</label>
            <br>
            <input type="text" name="sname" value="<?php echo $s; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Account No:</label>
            <br>
            <input type="number" name="acc" value="<?php echo $id; ?>">
        </div>

        <div class="doc">
            <label class="profile-title">Bank:</label>
            <br>
            <select name="bank">
                <option value="" <?php if($bank==""){echo 'selected="selected"';}?> >Select Bank</option>
                <?php 
                    if(!isset($num1)){
                        echo '<option value="">Oops! No bank(s) found!</option>';
                    }else{
                        while ($row1 = mysqli_fetch_array($result1)) {
                ?>

                    <option value="<?php echo $row1['BID']; ?>" <?php if($row1['BID']==$bank){echo 'selected="selected"';}?> > 
                        <?php echo $row1['name']; ?> 
                    </option>

                <?php  }} ?>

            </select>
        </div>
        
        <div class="doc">
            <label class="profile-title">Photo:</label>
            <br>
            <input type="file" name="file">
        </div>
    </div>
    
    <div class="doc1">
        <label class="profile-title">Details:</label>
        <br>
        <textarea name="details" rows="7" title="details" maxlength="1050" placeholder="Found document details (1050 characters max)..."><?php echo $details;?></textarea>
    </div>
    
    <button name="atm" class="submit" type="submit">Add</button>
</div>
