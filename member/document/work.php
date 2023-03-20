<div class="document work">
    
    <br><br>
    
    <div class="block">
        <div class="doc">
            <label class="profile-title">Staff No:</label>
            <br>
            <input type="text" name="wId" value="<?php echo $wId; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Place of work:</label>
            <br>
            <input type="text" name="work" value="<?php echo $work; ?>">
        </div>
        
        <div class="doc">
            <label class="profile-title">Country</label>
            <br>
            <select name="wCountry">
                <option value="" <?php if($wCountry == ""){echo 'selected="selected"';}?> >Select Country</option>
                <option value="Afganistan" <?php if($wCountry == "Afganistan"){echo 'selected="selected"';}?> >Afghanistan</option>
                <option value="Albania" <?php if($wCountry == "Albania"){echo 'selected="selected"';}?> >Albania</option>
                <option value="Algeria" <?php if($wCountry == "Algeria"){echo 'selected="selected"';}?> >Algeria</option>
                <option value="American Samoa" <?php if($wCountry == "American Samoa"){echo 'selected="selected"';}?> >American Samoa</option>
                <option value="Andorra" <?php if($wCountry == "Andorra"){echo 'selected="selected"';}?> >Andorra</option>
                <option value="Angola" <?php if($wCountry == "Angola"){echo 'selected="selected"';}?> >Angola</option>
                <option value="Anguilla" <?php if($wCountry == "Anguilla"){echo 'selected="selected"';}?> >Anguilla</option>
                <option value="Antigua &amp; Barbuda" <?php if($wCountry == "Antigua &amp; Barbuda"){echo 'selected="selected"';}?> >Antigua &amp; Barbuda</option>
                <option value="Argentina" <?php if($wCountry == "Argentina"){echo 'selected="selected"';}?> >Argentina</option>
                <option value="Armenia" <?php if($wCountry == "Armenia"){echo 'selected="selected"';}?> >Armenia</option>
                <option value="Aruba" <?php if($wCountry == "Aruba"){echo 'selected="selected"';}?> >Aruba</option>
                <option value="Australia" <?php if($wCountry == "Australia"){echo 'selected="selected"';}?> >Australia</option>
                <option value="Austria" <?php if($wCountry == "Austria"){echo 'selected="selected"';}?> >Austria</option>
                <option value="Azerbaijan" <?php if($wCountry == "Azerbaijan"){echo 'selected="selected"';}?> >Azerbaijan</option>
                <option value="Bahamas" <?php if($wCountry == "Bahamas"){echo 'selected="selected"';}?> >Bahamas</option>
                <option value="Bahrain" <?php if($wCountry == "Bahrain"){echo 'selected="selected"';}?> >Bahrain</option>
                <option value="Bangladesh" <?php if($wCountry == "Bangladesh"){echo 'selected="selected"';}?> >Bangladesh</option>
                <option value="Barbados" <?php if($wCountry == "Barbados"){echo 'selected="selected"';}?> >Barbados</option>
                <option value="Belarus" <?php if($wCountry == "Belarus"){echo 'selected="selected"';}?> >Belarus</option>
                <option value="Belgium" <?php if($wCountry == "Belgium"){echo 'selected="selected"';}?> >Belgium</option>
                <option value="Belize" <?php if($wCountry == "Belize"){echo 'selected="selected"';}?> >Belize</option>
                <option value="Benin" <?php if($wCountry == "Benin"){echo 'selected="selected"';}?> >Benin</option>
                <option value="Bermuda" <?php if($wCountry == "Bermuda"){echo 'selected="selected"';}?> >Bermuda</option>
                <option value="Bhutan" <?php if($wCountry == "Bhutan"){echo 'selected="selected"';}?> >Bhutan</option>
                <option value="Bolivia" <?php if($wCountry == "Bolivia"){echo 'selected="selected"';}?> >Bolivia</option>
                <option value="Bonaire" <?php if($wCountry == "Bonaire"){echo 'selected="selected"';}?> >Bonaire</option>
                <option value="Bosnia &amp; Herzegovina" <?php if($wCountry == "Bosnia &amp; Herzegovina"){echo 'selected="selected"';}?> >Bosnia &amp; Herzegovina</option>
                <option value="Botswana" <?php if($wCountry == "Botswana"){echo 'selected="selected"';}?> >Botswana</option>
                <option value="Brazil" <?php if($wCountry == "Brazil"){echo 'selected="selected"';}?> >Brazil</option>
                <option value="British Indian Ocean Ter" <?php if($wCountry == "British Indian Ocean Ter"){echo 'selected="selected"';}?> >British Indian Ocean Ter</option>
                <option value="Brunei" <?php if($wCountry == "Brunei"){echo 'selected="selected"';}?> >Brunei</option>
                <option value="Bulgaria" <?php if($wCountry == "Bulgaria"){echo 'selected="selected"';}?> >Bulgaria</option>
                <option value="Burkina Faso" <?php if($wCountry == "Burkina Faso"){echo 'selected="selected"';}?> >Burkina Faso</option>
                <option value="Burundi" <?php if($wCountry == "Burundi"){echo 'selected="selected"';}?> >Burundi</option>
                <option value="Cambodia" <?php if($wCountry == "Cambodia"){echo 'selected="selected"';}?> >Cambodia</option>
                <option value="Cameroon" <?php if($wCountry == "Cameroon"){echo 'selected="selected"';}?> >Cameroon</option>
                <option value="Canada" <?php if($wCountry == "Canada"){echo 'selected="selected"';}?> >Canada</option>
                <option value="Canary Islands" <?php if($wCountry == "Canary Islands"){echo 'selected="selected"';}?> >Canary Islands</option>
                <option value="Cape Verde" <?php if($wCountry == "Cape Verde"){echo 'selected="selected"';}?> >Cape Verde</option>
                <option value="Cayman Islands" <?php if($wCountry == "Cayman Islands"){echo 'selected="selected"';}?> >Cayman Islands</option>
                <option value="Central African Republic" <?php if($wCountry == "Central African Republic"){echo 'selected="selected"';}?> >Central African Republic</option>
                <option value="Chad" <?php if($wCountry == "Chad"){echo 'selected="selected"';}?> >Chad</option>
                <option value="Channel Islands" <?php if($wCountry == "Channel Islands"){echo 'selected="selected"';}?> >Channel Islands</option>
                <option value="Chile" <?php if($wCountry == "Chile"){echo 'selected="selected"';}?> >Chile</option>
                <option value="China" <?php if($wCountry == "China"){echo 'selected="selected"';}?> >China</option>
                <option value="Christmas Island" <?php if($wCountry == "Christmas Island"){echo 'selected="selected"';}?> >Christmas Island</option>
                <option value="Cocos Island" <?php if($wCountry == "Cocos Island"){echo 'selected="selected"';}?> >Cocos Island</option>
                <option value="Colombia" <?php if($wCountry == "Colombia"){echo 'selected="selected"';}?> >Colombia</option>
                <option value="Comoros" <?php if($wCountry == "Comoros"){echo 'selected="selected"';}?> >Comoros</option>
                <option value="Congo" <?php if($wCountry == "Congo"){echo 'selected="selected"';}?> >Congo</option>
                <option value="Cook Islands" <?php if($wCountry == "Cook Islands"){echo 'selected="selected"';}?> >Cook Islands</option>
                <option value="Costa Rica" <?php if($wCountry == "Costa Rica"){echo 'selected="selected"';}?> >Costa Rica</option>
                <option value="Cote DIvoire" <?php if($wCountry == "Cote DIvoire"){echo 'selected="selected"';}?> >Cote D'Ivoire</option>
                <option value="Croatia" <?php if($wCountry == "Croatia"){echo 'selected="selected"';}?> >Croatia</option>
                <option value="Cuba" <?php if($wCountry == "Cuba"){echo 'selected="selected"';}?> >Cuba</option>
                <option value="Curaco" <?php if($wCountry == "Curaco"){echo 'selected="selected"';}?> >Curacao</option>
                <option value="Cyprus" <?php if($wCountry == "Cyprus"){echo 'selected="selected"';}?> >Cyprus</option>
                <option value="Czech Republic" <?php if($wCountry == "Czech Republic"){echo 'selected="selected"';}?> >Czech Republic</option>
                <option value="Denmark" <?php if($wCountry == "Denmark"){echo 'selected="selected"';}?> >Denmark</option>
                <option value="Djibouti" <?php if($wCountry == "Djibouti"){echo 'selected="selected"';}?> >Djibouti</option>
                <option value="Dominica" <?php if($wCountry == "Dominica"){echo 'selected="selected"';}?> >Dominica</option>
                <option value="Dominican Republic" <?php if($wCountry == "Dominican Republic"){echo 'selected="selected"';}?> >Dominican Republic</option>
                <option value="East Timor" <?php if($wCountry == "East Timor"){echo 'selected="selected"';}?> >East Timor</option>
                <option value="Ecuador" <?php if($wCountry == "Ecuador"){echo 'selected="selected"';}?> >Ecuador</option>
                <option value="Egypt" <?php if($wCountry == "Egypt"){echo 'selected="selected"';}?> >Egypt</option>
                <option value="El Salvador" <?php if($wCountry == "El Salvador"){echo 'selected="selected"';}?> >El Salvador</option>
                <option value="Equatorial Guinea" <?php if($wCountry == "Equatorial Guinea"){echo 'selected="selected"';}?> >Equatorial Guinea</option>
                <option value="Eritrea" <?php if($wCountry == "Eritrea"){echo 'selected="selected"';}?> >Eritrea</option>
                <option value="Estonia" <?php if($wCountry == "Estonia"){echo 'selected="selected"';}?> >Estonia</option>
                <option value="Ethiopia" <?php if($wCountry == "Ethiopia"){echo 'selected="selected"';}?> >Ethiopia</option>
                <option value="Falkland Islands" <?php if($wCountry == "Falkland Islands"){echo 'selected="selected"';}?> >Falkland Islands</option>
                <option value="Faroe Islands" <?php if($wCountry == "Faroe Islands"){echo 'selected="selected"';}?> >Faroe Islands</option>
                <option value="Fiji" <?php if($wCountry == "Fiji"){echo 'selected="selected"';}?> >Fiji</option>
                <option value="Finland" <?php if($wCountry == "Finland"){echo 'selected="selected"';}?> >Finland</option>
                <option value="France" <?php if($wCountry == "France"){echo 'selected="selected"';}?> >France</option>
                <option value="French Guiana" <?php if($wCountry == "French Guiana"){echo 'selected="selected"';}?> >French Guiana</option>
                <option value="French Polynesia" <?php if($wCountry == "French Polynesia"){echo 'selected="selected"';}?> >French Polynesia</option>
                <option value="French Southern Ter" <?php if($wCountry == "French Southern Ter"){echo 'selected="selected"';}?> >French Southern Ter</option>
                <option value="Gabon" <?php if($wCountry == "Gabon"){echo 'selected="selected"';}?> >Gabon</option>
                <option value="Gambia" <?php if($wCountry == "Gambia"){echo 'selected="selected"';}?> >Gambia</option>
                <option value="Georgia" <?php if($wCountry == "Georgia"){echo 'selected="selected"';}?> >Georgia</option>
                <option value="Germany" <?php if($wCountry == "Germany"){echo 'selected="selected"';}?> >Germany</option>
                <option value="Ghana" <?php if($wCountry == "Ghana"){echo 'selected="selected"';}?> >Ghana</option>
                <option value="Gibraltar" <?php if($wCountry == "Gibraltar"){echo 'selected="selected"';}?> >Gibraltar</option>
                <option value="Great Britain" <?php if($wCountry == "Great Britain"){echo 'selected="selected"';}?> >Great Britain</option>
                <option value="Greece" <?php if($wCountry == "Greece"){echo 'selected="selected"';}?> >Greece</option>
                <option value="Greenland" <?php if($wCountry == "Greenland"){echo 'selected="selected"';}?> >Greenland</option>
                <option value="Grenada" <?php if($wCountry == "Grenada"){echo 'selected="selected"';}?> >Grenada</option>
                <option value="Guadeloupe" <?php if($wCountry == "Guadeloupe"){echo 'selected="selected"';}?> >Guadeloupe</option>
                <option value="Guam" <?php if($wCountry == "Guam"){echo 'selected="selected"';}?> >Guam</option>
                <option value="Guatemala" <?php if($wCountry == "Guatemala"){echo 'selected="selected"';}?> >Guatemala</option>
                <option value="Guinea" <?php if($wCountry == "Guinea"){echo 'selected="selected"';}?> >Guinea</option>
                <option value="Guyana" <?php if($wCountry == "Guyana"){echo 'selected="selected"';}?> >Guyana</option>
                <option value="Haiti" <?php if($wCountry == "Haiti"){echo 'selected="selected"';}?> >Haiti</option>
                <option value="Hawaii" <?php if($wCountry == "Hawaii"){echo 'selected="selected"';}?> >Hawaii</option>
                <option value="Honduras" <?php if($wCountry == "Honduras"){echo 'selected="selected"';}?> >Honduras</option>
                <option value="Hong Kong" <?php if($wCountry == "Hong Kong"){echo 'selected="selected"';}?> >Hong Kong</option>
                <option value="Hungary" <?php if($wCountry == "Hungary"){echo 'selected="selected"';}?> >Hungary</option>
                <option value="Iceland" <?php if($wCountry == "Iceland"){echo 'selected="selected"';}?> >Iceland</option>
                <option value="India" <?php if($wCountry == "India"){echo 'selected="selected"';}?> >India</option>
                <option value="Indonesia" <?php if($wCountry == "Indonesia"){echo 'selected="selected"';}?> >Indonesia</option>
                <option value="Iran" <?php if($wCountry == "Iran"){echo 'selected="selected"';}?> >Iran</option>
                <option value="Iraq" <?php if($wCountry == "Iraq"){echo 'selected="selected"';}?> >Iraq</option>
                <option value="Ireland" <?php if($wCountry == "Ireland"){echo 'selected="selected"';}?> >Ireland</option>
                <option value="Isle of Man" <?php if($wCountry == "Isle of Man"){echo 'selected="selected"';}?> >Isle of Man</option>
                <option value="Israel" <?php if($wCountry == "Israel"){echo 'selected="selected"';}?> >Israel</option>
                <option value="Italy" <?php if($wCountry == "Italy"){echo 'selected="selected"';}?> >Italy</option>
                <option value="Jamaica" <?php if($wCountry == "Jamaica"){echo 'selected="selected"';}?> >Jamaica</option>
                <option value="Japan" <?php if($wCountry == "Japan"){echo 'selected="selected"';}?> >Japan</option>
                <option value="Jordan" <?php if($wCountry == "Jordan"){echo 'selected="selected"';}?> >Jordan</option>
                <option value="Kazakhstan" <?php if($wCountry == "Kazakhstan"){echo 'selected="selected"';}?> >Kazakhstan</option>
                <option value="Kenya" <?php if($wCountry == "Kenya"){echo 'selected="selected"';}?> >Kenya</option>
                <option value="Kiribati" <?php if($wCountry == "Kiribati"){echo 'selected="selected"';}?> >Kiribati</option>
                <option value="Korea North" <?php if($wCountry == "Korea North"){echo 'selected="selected"';}?> >Korea North</option>
                <option value="Korea South" <?php if($wCountry == "Korea South"){echo 'selected="selected"';}?> >Korea South</option>
                <option value="Kuwait" <?php if($wCountry == "Kuwait"){echo 'selected="selected"';}?> >Kuwait</option>
                <option value="Kyrgyzstan" <?php if($wCountry == "Kyrgyzstan"){echo 'selected="selected"';}?> >Kyrgyzstan</option>
                <option value="Laos" <?php if($wCountry == "Laos"){echo 'selected="selected"';}?> >Laos</option>
                <option value="Latvia" <?php if($wCountry == "Latvia"){echo 'selected="selected"';}?> >Latvia</option>
                <option value="Lebanon" <?php if($wCountry == "Lebanon"){echo 'selected="selected"';}?> >Lebanon</option>
                <option value="Lesotho" <?php if($wCountry == "Lesotho"){echo 'selected="selected"';}?> >Lesotho</option>
                <option value="Liberia" <?php if($wCountry == "Liberia"){echo 'selected="selected"';}?> >Liberia</option>
                <option value="Libya" <?php if($wCountry == "Libya"){echo 'selected="selected"';}?> >Libya</option>
                <option value="Liechtenstein" <?php if($wCountry == "Liechtenstein"){echo 'selected="selected"';}?> >Liechtenstein</option>
                <option value="Lithuania" <?php if($wCountry == "Lithuania"){echo 'selected="selected"';}?> >Lithuania</option>
                <option value="Luxembourg" <?php if($wCountry == "Luxembourg"){echo 'selected="selected"';}?> >Luxembourg</option>
                <option value="Macau" <?php if($wCountry == "Macau"){echo 'selected="selected"';}?> >Macau</option>
                <option value="Macedonia" <?php if($wCountry == "Macedonia"){echo 'selected="selected"';}?> >Macedonia</option>
                <option value="Madagascar" <?php if($wCountry == "Madagascar"){echo 'selected="selected"';}?> >Madagascar</option>
                <option value="Malaysia" <?php if($wCountry == "Malaysia"){echo 'selected="selected"';}?> >Malaysia</option>
                <option value="Malawi" <?php if($wCountry == "Malawi"){echo 'selected="selected"';}?> >Malawi</option>
                <option value="Maldives" <?php if($wCountry == "Maldives"){echo 'selected="selected"';}?> >Maldives</option>
                <option value="Mali" <?php if($wCountry == "Mali"){echo 'selected="selected"';}?> >Mali</option>
                <option value="Malta" <?php if($wCountry == "Malta"){echo 'selected="selected"';}?> >Malta</option>
                <option value="Marshall Islands" <?php if($wCountry == "Marshall Islands"){echo 'selected="selected"';}?> >Marshall Islands</option>
                <option value="Martinique" <?php if($wCountry == "Martinique"){echo 'selected="selected"';}?> >Martinique</option>
                <option value="Mauritania" <?php if($wCountry == "Mauritania"){echo 'selected="selected"';}?> >Mauritania</option>
                <option value="Mauritius" <?php if($wCountry == "Mauritius"){echo 'selected="selected"';}?> >Mauritius</option>
                <option value="Mayotte" <?php if($wCountry == "Mayotte"){echo 'selected="selected"';}?> >Mayotte</option>
                <option value="Mexico" <?php if($wCountry == "Mexico"){echo 'selected="selected"';}?> >Mexico</option>
                <option value="Midway Islands" <?php if($wCountry == "Midway Islands"){echo 'selected="selected"';}?> >Midway Islands</option>
                <option value="Moldova" <?php if($wCountry == "Moldova"){echo 'selected="selected"';}?> >Moldova</option>
                <option value="Monaco" <?php if($wCountry == "Monaco"){echo 'selected="selected"';}?> >Monaco</option>
                <option value="Mongolia" <?php if($wCountry == "Mongolia"){echo 'selected="selected"';}?> >Mongolia</option>
                <option value="Montserrat" <?php if($wCountry == "Montserrat"){echo 'selected="selected"';}?> >Montserrat</option>
                <option value="Morocco" <?php if($wCountry == "Morocco"){echo 'selected="selected"';}?> >Morocco</option>
                <option value="Mozambique" <?php if($wCountry == "Mozambique"){echo 'selected="selected"';}?> >Mozambique</option>
                <option value="Myanmar" <?php if($wCountry == "Myanmar"){echo 'selected="selected"';}?> >Myanmar</option>
                <option value="Nambia" <?php if($wCountry == "Nambia"){echo 'selected="selected"';}?> >Nambia</option>
                <option value="Nauru" <?php if($wCountry == "Nauru"){echo 'selected="selected"';}?> >Nauru</option>
                <option value="Nepal" <?php if($wCountry == "Nepal"){echo 'selected="selected"';}?> >Nepal</option>
                <option value="Netherland Antilles" <?php if($wCountry == "Netherland Antilles"){echo 'selected="selected"';}?> >Netherland Antilles</option>
                <option value="Netherlands" <?php if($wCountry == "Netherlands"){echo 'selected="selected"';}?> >Netherlands (Holland, Europe)</option>
                <option value="Nevis" <?php if($wCountry == "Nevis"){echo 'selected="selected"';}?> >Nevis</option>
                <option value="New Caledonia" <?php if($wCountry == "New Caledonia"){echo 'selected="selected"';}?> >New Caledonia</option>
                <option value="New Zealand" <?php if($wCountry == "New Zealand"){echo 'selected="selected"';}?> >New Zealand</option>
                <option value="Nicaragua" <?php if($wCountry == "Nicaragua"){echo 'selected="selected"';}?> >Nicaragua</option>
                <option value="Niger" <?php if($wCountry == "Niger"){echo 'selected="selected"';}?> >Niger</option>
                <option value="Nigeria" <?php if($wCountry == "Nigeria"){echo 'selected="selected"';}?> >Nigeria</option>
                <option value="Niue" <?php if($wCountry == "Niue"){echo 'selected="selected"';}?> >Niue</option>
                <option value="Norfolk Island" <?php if($wCountry == "Norfolk Island"){echo 'selected="selected"';}?> >Norfolk Island</option>
                <option value="Norway" <?php if($wCountry == "Norway"){echo 'selected="selected"';}?> >Norway</option>
                <option value="Oman" <?php if($wCountry == "Oman"){echo 'selected="selected"';}?> >Oman</option>
                <option value="Pakistan" <?php if($wCountry == "Pakistan"){echo 'selected="selected"';}?> >Pakistan</option>
                <option value="Palau Island" <?php if($wCountry == "Palau Island"){echo 'selected="selected"';}?> >Palau Island</option>
                <option value="Palestine" <?php if($wCountry == "Palestine"){echo 'selected="selected"';}?> >Palestine</option>
                <option value="Panama" <?php if($wCountry == "Panama"){echo 'selected="selected"';}?> >Panama</option>
                <option value="Papua New Guinea" <?php if($wCountry == "Papua New Guinea"){echo 'selected="selected"';}?> >Papua New Guinea</option>
                <option value="Paraguay" <?php if($wCountry == "Paraguay"){echo 'selected="selected"';}?> >Paraguay</option>
                <option value="Peru" <?php if($wCountry == "Peru"){echo 'selected="selected"';}?> >Peru</option>
                <option value="Phillipines" <?php if($wCountry == "Phillipines"){echo 'selected="selected"';}?> >Philippines</option>
                <option value="Pitcairn Island" <?php if($wCountry == "Pitcairn Island"){echo 'selected="selected"';}?> >Pitcairn Island</option>
                <option value="Poland" <?php if($wCountry == "Poland"){echo 'selected="selected"';}?> >Poland</option>
                <option value="Portugal" <?php if($wCountry == "Portugal"){echo 'selected="selected"';}?> >Portugal</option>
                <option value="Puerto Rico" <?php if($wCountry == "Puerto Rico"){echo 'selected="selected"';}?> >Puerto Rico</option>
                <option value="Qatar" <?php if($wCountry == "Qatar"){echo 'selected="selected"';}?> >Qatar</option>
                <option value="Republic of Montenegro" <?php if($wCountry == "Republic of Montenegro"){echo 'selected="selected"';}?> >Republic of Montenegro</option>
                <option value="Republic of Serbia" <?php if($wCountry == "Republic of Serbia"){echo 'selected="selected"';}?> >Republic of Serbia</option>
                <option value="Reunion" <?php if($wCountry == "Reunion"){echo 'selected="selected"';}?> >Reunion</option>
                <option value="Romania" <?php if($wCountry == "Romania"){echo 'selected="selected"';}?> >Romania</option>
                <option value="Russia" <?php if($wCountry == "Russia"){echo 'selected="selected"';}?> >Russia</option>
                <option value="Rwanda" <?php if($wCountry == "Rwanda"){echo 'selected="selected"';}?> >Rwanda</option>
                <option value="St Barthelemy" <?php if($wCountry == "St Barthelemy"){echo 'selected="selected"';}?> >St Barthelemy</option>
                <option value="St Eustatius" <?php if($wCountry == "St Eustatius"){echo 'selected="selected"';}?> >St Eustatius</option>
                <option value="St Helena" <?php if($wCountry == "St Helena"){echo 'selected="selected"';}?> >St Helena</option>
                <option value="St Kitts-Nevis" <?php if($wCountry == "St Kitts-Nevis"){echo 'selected="selected"';}?> >St Kitts-Nevis</option>
                <option value="St Lucia" <?php if($wCountry == "St Lucia"){echo 'selected="selected"';}?> >St Lucia</option>
                <option value="St Maarten" <?php if($wCountry == "St Maarten"){echo 'selected="selected"';}?> >St Maarten</option>
                <option value="St Pierre &amp; Miquelon" <?php if($wCountry == "St Pierre &amp; Miquelon"){echo 'selected="selected"';}?> >St Pierre &amp; Miquelon</option>
                <option value="St Vincent &amp; Grenadines" <?php if($wCountry == "St Vincent &amp; Grenadines"){echo 'selected="selected"';}?> >St Vincent &amp; Grenadines</option>
                <option value="Saipan" <?php if($wCountry == "Saipan"){echo 'selected="selected"';}?> >Saipan</option>
                <option value="Samoa" <?php if($wCountry == "Samoa"){echo 'selected="selected"';}?> >Samoa</option>
                <option value="Samoa American" <?php if($wCountry == "Samoa American"){echo 'selected="selected"';}?> >Samoa American</option>
                <option value="San Marino" <?php if($wCountry == "San Marino"){echo 'selected="selected"';}?> >San Marino</option>
                <option value="Sao Tome &amp; Principe" <?php if($wCountry == "Sao Tome &amp; Principe"){echo 'selected="selected"';}?> >Sao Tome &amp; Principe</option>
                <option value="Saudi Arabia" <?php if($wCountry == "Saudi Arabia"){echo 'selected="selected"';}?> >Saudi Arabia</option>
                <option value="Senegal" <?php if($wCountry == "Senegal"){echo 'selected="selected"';}?> >Senegal</option>
                <option value="Serbia" <?php if($wCountry == "Serbia"){echo 'selected="selected"';}?> >Serbia</option>
                <option value="Seychelles" <?php if($wCountry == "Seychelles"){echo 'selected="selected"';}?> >Seychelles</option>
                <option value="Sierra Leone" <?php if($wCountry == "Sierra Leone"){echo 'selected="selected"';}?> >Sierra Leone</option>
                <option value="Singapore" <?php if($wCountry == "Singapore"){echo 'selected="selected"';}?> >Singapore</option>
                <option value="Slovakia" <?php if($wCountry == "Slovakia"){echo 'selected="selected"';}?> >Slovakia</option>
                <option value="Slovenia" <?php if($wCountry == "Slovenia"){echo 'selected="selected"';}?> >Slovenia</option>
                <option value="Solomon Islands" <?php if($wCountry == "Solomon Islands"){echo 'selected="selected"';}?> >Solomon Islands</option>
                <option value="Somalia" <?php if($wCountry == "Somalia"){echo 'selected="selected"';}?> >Somalia</option>
                <option value="South Africa" <?php if($wCountry == "South Africa"){echo 'selected="selected"';}?> >South Africa</option>
                <option value="Spain" <?php if($wCountry == "Spain"){echo 'selected="selected"';}?> >Spain</option>
                <option value="Sri Lanka" <?php if($wCountry == "Sri Lanka"){echo 'selected="selected"';}?> >Sri Lanka</option>
                <option value="Sudan" <?php if($wCountry == "Sudan"){echo 'selected="selected"';}?> >Sudan</option>
                <option value="Suriname" <?php if($wCountry == "Suriname"){echo 'selected="selected"';}?> >Suriname</option>
                <option value="Swaziland" <?php if($wCountry == "Swaziland"){echo 'selected="selected"';}?> >Swaziland</option>
                <option value="Sweden" <?php if($wCountry == "Sweden"){echo 'selected="selected"';}?> >Sweden</option>
                <option value="Switzerland" <?php if($wCountry == "Switzerland"){echo 'selected="selected"';}?> >Switzerland</option>
                <option value="Syria" <?php if($wCountry == "Syria"){echo 'selected="selected"';}?> >Syria</option>
                <option value="Tahiti" <?php if($wCountry == "Tahiti"){echo 'selected="selected"';}?> >Tahiti</option>
                <option value="Taiwan" <?php if($wCountry == "Taiwan"){echo 'selected="selected"';}?> >Taiwan</option>
                <option value="Tajikistan" <?php if($wCountry == "Tajikistan"){echo 'selected="selected"';}?> >Tajikistan</option>
                <option value="Tanzania" <?php if($wCountry == "Tanzania"){echo 'selected="selected"';}?> >Tanzania</option>
                <option value="Thailand" <?php if($wCountry == "Thailand"){echo 'selected="selected"';}?> >Thailand</option>
                <option value="Togo" <?php if($wCountry == "Togo"){echo 'selected="selected"';}?> >Togo</option>
                <option value="Tokelau" <?php if($wCountry == "Tokelau"){echo 'selected="selected"';}?> >Tokelau</option>
                <option value="Tonga" <?php if($wCountry == "Tonga"){echo 'selected="selected"';}?> >Tonga</option>
                <option value="Trinidad &amp; Tobago" <?php if($wCountry == "Trinidad &amp; Tobago"){echo 'selected="selected"';}?> >Trinidad &amp; Tobago</option>
                <option value="Tunisia" <?php if($wCountry == "Tunisia"){echo 'selected="selected"';}?> >Tunisia</option>
                <option value="Turkey" <?php if($wCountry == "Turkey"){echo 'selected="selected"';}?> >Turkey</option>
                <option value="Turkmenistan" <?php if($wCountry == "Turkmenistan"){echo 'selected="selected"';}?> >Turkmenistan</option>
                <option value="Turks &amp; Caicos Is" <?php if($wCountry == "Turks &amp; Caicos Is"){echo 'selected="selected"';}?> >Turks &amp; Caicos Is</option>
                <option value="Tuvalu" <?php if($wCountry == "Tuvalu"){echo 'selected="selected"';}?> >Tuvalu</option>
                <option value="Uganda" <?php if($wCountry == "Uganda"){echo 'selected="selected"';}?> >Uganda</option>
                <option value="Ukraine" <?php if($wCountry == "Ukraine"){echo 'selected="selected"';}?> >Ukraine</option>
                <option value="United Arab Erimates" <?php if($wCountry == "United Arab Erimates"){echo 'selected="selected"';}?> >United Arab Emirates</option>
                <option value="United Kingdom" <?php if($wCountry == "United Kingdom"){echo 'selected="selected"';}?> >United Kingdom</option>
                <option value="United States of America" <?php if($wCountry == "United States of America"){echo 'selected="selected"';}?> >United States of America</option>
                <option value="Uraguay" <?php if($wCountry == "Uraguay"){echo 'selected="selected"';}?> >Uruguay</option>
                <option value="Uzbekistan" <?php if($wCountry == "Uzbekistan"){echo 'selected="selected"';}?> >Uzbekistan</option>
                <option value="Vanuatu" <?php if($wCountry == "Vanuatu"){echo 'selected="selected"';}?> >Vanuatu</option>
                <option value="Vatican City State" <?php if($wCountry == "Vatican City State"){echo 'selected="selected"';}?> >Vatican City State</option>
                <option value="Venezuela" <?php if($wCountry == "Venezuela"){echo 'selected="selected"';}?> >Venezuela</option>
                <option value="Vietnam" <?php if($wCountry == "Vietnam"){echo 'selected="selected"';}?> >Vietnam</option>
                <option value="Virgin Islands (Brit)" <?php if($wCountry == "Virgin Islands (Brit)"){echo 'selected="selected"';}?> >Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)" <?php if($wCountry == "Virgin Islands (USA)"){echo 'selected="selected"';}?> >Virgin Islands (USA)</option>
                <option value="Wake Island" <?php if($wCountry == "Wake Island"){echo 'selected="selected"';}?> >Wake Island</option>
                <option value="Wallis &amp; Futana Is" <?php if($wCountry == "Wallis &amp; Futana Is"){echo 'selected="selected"';}?> >Wallis &amp; Futana Is</option>
                <option value="Yemen" <?php if($wCountry == "Yemen"){echo 'selected="selected"';}?> >Yemen</option>
                <option value="Zaire" <?php if($wCountry == "Zaire"){echo 'selected="selected"';}?> >Zaire</option>
                <option value="Zambia" <?php if($wCountry == "Zambia"){echo 'selected="selected"';}?> >Zambia</option>
                <option value="Zimbabwe" <?php if($wCountry == "Zimbabwe"){echo 'selected="selected"';}?> >Zimbabwe</option>

            </select>
        </div>
        
        <div class="doc">
            <label class="profile-title">Photo:</label>
            <br>
            <input type="file" name="wFile">
        </div>
        
    </div>
    <button name="add" class="submit" type="submit">Add</button>
</div>
