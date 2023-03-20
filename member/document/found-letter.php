<div class="document letter">
    
    <br><br>
    
    <div class="block">
        <div class="doc">
            <label class="profile-title">Firstname:</label>
            <br>
            <input type="text" name="fname2" value="<?php echo $f2; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Surname:</label>
            <br>
            <input type="text" name="sname2" value="<?php echo $s2; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Refrerence No:</label>
            <br>
            <input type="text" name="letterNo" value="<?php echo $letterId; ?>">
        </div>

        <div class="doc">
            <label class="profile-title">Category:</label>
            <br>
            <select name="letterCategory">
                <option value="" <?php if($letterCategory == ""){echo 'selected="selected"';}?> >Select Category</option>
                <option value="Admission" <?php if($letterCategory == "Admission"){echo 'selected="selected"';}?> > Admission Letter </option>
                <option value="Invitation" <?php if($letterCategory == "Invitation"){echo 'selected="selected"';}?> > Invitation Letter </option>
                <option value="Recomendation" <?php if($letterCategory == "Recomendation"){echo 'selected="selected"';}?> > Recomendation Letter </option>
            </select>
        </div>
        
        <div class="doc">
            <label class="profile-title">Photo:</label>
            <br>
            <input type="file" name="letterFile">
        </div>
        
    </div>
    
    <div class="doc1">
        <label class="profile-title">Details:</label>
        <br>
        <textarea name="details3" rows="7" title="details" maxlength="1050" placeholder="Found document details (1050 characters max)..."><?php echo $details3;?></textarea>
    </div>
    <button name="letter" class="submit" type="submit">Add</button>
</div>
