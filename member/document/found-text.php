<div class="document text-book">
    
    <br><br>
    
    <div class="block">
        <div class="doc">
            <label class="profile-title">Firstname:</label>
            <br>
            <input type="text" name="fname6" value="<?php echo $f6; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Surname:</label>
            <br>
            <input type="text" name="sname6" value="<?php echo $s6; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Serial No:</label>
            <br>
            <input type="text" name="txtID" value="<?php echo $txtID; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Title:</label>
            <br>
            <input type="text" name="txtTitle" value="<?php echo $txtTitle; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Level:</label>
            <br>
            <select name="txtLevel">
                <option value="" <?php if($txtCategory == ""){echo 'selected="selected"';}?> >Select Category</option>
                <option value="Kindergaten" <?php if($txtCategory == "Kindergaten"){echo 'selected="selected"';}?> >Kindergaten</option>
                <option value="Primary School" <?php if($txtCategory == "Primary School"){echo 'selected="selected"';}?> >Primary School</option>
                <option value="High School" <?php if($txtCategory == "High School"){echo 'selected="selected"';}?> >High School</option>
                <option value="A-Level" <?php if($txtCategory == "A-Level"){echo 'selected="selected"';}?> >A-Level</option>
                <option value="Institute" <?php if($txtCategory == "Institute"){echo 'selected="selected"';}?> >Institute</option>
                <option value="Techinical" <?php if($txtCategory == "Techinical"){echo 'selected="selected"';}?> >Techinical</option>
                <option value="College" <?php if($txtCategory == "College"){echo 'selected="selected"';}?> >College</option>
                <option value="University" <?php if($txtCategory == "University"){echo 'selected="selected"';}?> >University</option>
            </select>
        </div>
        
        <div class="doc">
            <label class="profile-title">Photo:</label>
            <br>
            <input type="file" name="txtFile">
        </div>
    </div>
    
    <div class="doc1">
        <label class="profile-title">Details:</label>
        <br>
        <textarea name="details7" rows="7" title="details" maxlength="1050" placeholder="Found document details (1050 characters max)..."><?php echo $details7;?></textarea>
    </div>
    
    <button name="text" class="submit" type="submit">Add</button>
</div>
