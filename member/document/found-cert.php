<div class="document cert">
    
    <br> <br>
    
    <div class="block">
        <div class="doc">
            <label class="profile-title">Firstname:</label>
            <br>
            <input type="text" name="fname1" value="<?php echo $f1; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Surname:</label>
            <br>
            <input type="text" name="sname1" value="<?php echo $s1; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Certificate No:</label>
            <br>
            <input type="text" name="certNo" value="<?php echo $certId; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Institution:</label>
            <br>
            <input type="text" name="certInstitute" value="<?php echo $certInstitute; ?>">
        </div>

        <div class="doc">
            <label class="profile-title">Level:</label>
            <br>
            <select name="certLevel">
                <option value="" <?php if($certLevel == ""){echo 'selected="selected"';}?> >Select Level</option>
                <option value="Kindergaten" <?php if($certLevel == "Kindergaten"){echo 'selected="selected"';}?> > Kindergaten </option>
                <option value="Primary School" <?php if($certLevel == "Primary School"){echo 'selected="selected"';}?> > Primary School </option>
                <option value="High School" <?php if($certLevel == "High School"){echo 'selected="selected"';}?> > High School </option>
                <option value="A-Level" <?php if($certLevel == "A-Level"){echo 'selected="selected"';}?> > A-Level </option>
                <option value="College" <?php if($certLevel == "College"){echo 'selected="selected"';}?> > College </option>
                <option value="Institute" <?php if($certLevel == "Institute"){echo 'selected="selected"';}?> > Institute </option>
                <option value="Technical" <?php if($certLevel == "Technical"){echo 'selected="selected"';}?> > Technical </option>
                <option value="University" <?php if($certLevel == "University"){echo 'selected="selected"';}?> > University </option>
            </select>
        </div>
        
        <div class="doc">
            <label class="profile-title">Photo:</label>
            <br>
            <input type="file" name="certFile">
        </div>
        
    </div>
    <div class="doc1">
        <label class="profile-title">Details:</label>
        <br>
        <textarea name="details1" rows="7" title="details" maxlength="1050" placeholder="Found document details (1050 characters max)..."><?php echo $details1;?></textarea>
    </div>
    <button name="cert" class="submit" type="submit">Add</button>
</div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             