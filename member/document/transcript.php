<div class="document transcript">
    
    <br> <br>
    
    <div class="block">
        <div class="doc">
            <label class="profile-title">Admission No:</label>
            <br>
            <input type="text" name="transNo" value="<?php echo $transId; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Institution:</label>
            <br>
            <input type="text" name="transInstitute" value="<?php echo $transInstitute; ?>">
        </div>

        <div class="doc">
            <label class="profile-title">Level:</label>
            <br>
            <select name="transLevel">
                <option value="" <?php if($transLevel == ""){echo 'selected="selected"';}?> >Select Level</option>
                <option value="Kindergaten" <?php if($transLevel == "Kindergaten"){echo 'selected="selected"';}?> >Kindergaten</option>
                <option value="Primary School" <?php if($transLevel == "Primary School"){echo 'selected="selected"';}?> >Primary School</option>
                <option value="High School" <?php if($transLevel == "High School"){echo 'selected="selected"';}?> >High School</option>
                <option value="A-Level" <?php if($transLevel == "A-Level"){echo 'selected="selected"';}?> >A-Level</option>
                <option value="Institute" <?php if($transLevel == "Institute"){echo 'selected="selected"';}?> >Institute</option>
                <option value="Techinical" <?php if($transLevel == "Techinical"){echo 'selected="selected"';}?> >Techinical</option>
                <option value="College" <?php if($transLevel == "College"){echo 'selected="selected"';}?> >College</option>
                <option value="University" <?php if($transLevel == "University"){echo 'selected="selected"';}?> >University</option>
            
            </select>
        </div>
        
        <div class="doc">
            <label class="profile-title">Photo:</label>
            <br>
            <input type="file" name="transFile">
        </div>
        
    </div>
    <button name="trans" class="submit" type="submit">Add</button>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             