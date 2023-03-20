<div class="document student-id">
    
    <br><br>
    
    <div class="block">
        <div class="doc">
            <label class="profile-title">Firstname:</label>
            <br>
            <input type="text" name="fname5" value="<?php echo $f5; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Surname:</label>
            <br>
            <input type="text" name="sname5" value="<?php echo $s5; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Admission No:</label>
            <br>
            <input type="text" name="adm" value="<?php echo $adm; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">School:</label>
            <br>
            <input type="text" name="sSchool" value="<?php echo $sSchool; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Category:</label>
            <br>
            <select name="sCategory">
                <option value="" <?php if($sCategory == ""){echo 'selected="selected"';}?> >Select Category</option>
                <option value="Kindergaten" <?php if($sCategory == "Kindergaten"){echo 'selected="selected"';}?> >Kindergaten</option>
                <option value="Primary School" <?php if($sCategory == "Primary School"){echo 'selected="selected"';}?> >Primary School</option>
                <option value="High School" <?php if($sCategory == "High School"){echo 'selected="selected"';}?> >High School</option>
                <option value="A-Level" <?php if($sCategory == "A-Level"){echo 'selected="selected"';}?> >A-Level</option>
                <option value="Institute" <?php if($sCategory == "Institute"){echo 'selected="selected"';}?> >Institute</option>
                <option value="Techinical" <?php if($sCategory == "Techinical"){echo 'selected="selected"';}?> >Techinical</option>
                <option value="College" <?php if($sCategory == "College"){echo 'selected="selected"';}?> >College</option>
                <option value="University" <?php if($sCategory == "University"){echo 'selected="selected"';}?> >University</option>
            </select>
        </div>
        
        <div class="doc">
            <label class="profile-title">Photo:</label>
            <br>
            <input type="file" name="sFile">
        </div>
    </div>
    
    <div class="doc1">
        <label class="profile-title">Details:</label>
        <br>
        <textarea name="details6" rows="7" title="details" maxlength="1050" placeholder="Found document details (1050 characters max)..."><?php echo $details6;?></textarea>
    </div>
    
    <button name="studentID" class="submit" type="submit">Add</button>
</div>
