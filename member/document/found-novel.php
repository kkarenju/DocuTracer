<div class="document novel">
    
    <br><br>
    
    <div class="block">
        <div class="doc">
            <label class="profile-title">Firstname:</label>
            <br>
            <input type="text" name="fname4" placeholder="Firstname (optional)" value="<?php echo $f4; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Surname:</label>
            <br>
            <input type="text" name="sname4" placeholder="Surname (optional)" value="<?php echo $s4; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Serial No:</label>
            <br>
            <input type="text" name="novelID" value="<?php echo $novelID; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Title:</label>
            <br>
            <input type="text" name="novelTitle" value="<?php echo $novelTitle; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Author:</label>
            <br>
            <input type="text" name="novelAuthor" value="<?php echo $novelAuthor; ?>">
        </div>

        <div class="doc">
            <label class="profile-title">Category:</label>
            <br>
            <select name="novelCategory">
                <option value="" <?php if($novelCategory == ""){echo 'selected="selected"';}?> >Select Category</option>
                <option value="Commedy" <?php if($novelCategory == "Commedy"){echo 'selected="selected"';}?> >Commedy</option>
                <option value="Drama" <?php if($novelCategory == "Drama"){echo 'selected="selected"';}?> >Drama</option>
                <option value="Fictional" <?php if($novelCategory == "Science"){echo 'selected="selected"';}?> >Fictional</option>
                <option value="Science" <?php if($novelCategory == "Science"){echo 'selected="selected"';}?> >Science</option>
                <option value="Thriller" <?php if($novelCategory == "Thriller"){echo 'selected="selected"';}?> >Thriller</option>
                <option value="Motivational" <?php if($novelCategory == "Motivational"){echo 'selected="selected"';}?> >Motivational</option>
                <option value="Life Story" <?php if($novelCategory == "Life Story"){echo 'selected="selected"';}?> >Life Story</option>
            </select>
        </div>
        
        <div class="doc">
            <label class="profile-title">Photo:</label>
            <br>
            <input type="file" name="novelFile">
        </div>
    </div>
    
    <div class="doc1">
        <label class="profile-title">Details:</label>
        <br>
        <textarea name="details5" rows="7" title="details" maxlength="1050" placeholder="Found document details (1050 characters max)..."><?php echo $details5;?></textarea>
    </div>
    
    <button name="novel" class="submit" type="submit">Add</button>
</div>
