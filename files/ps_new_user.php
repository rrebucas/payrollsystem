<?php

require_once ('ps_connect_db.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Create New Account | Payroll Management System</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link href="http://fonts.googleapis.com/css?family=Mouse+Memoirs" rel="stylesheet" type="text/css" />
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/newuser.css"/>
<script type="text/javascript" src="ps_theme/js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="ps_theme/css/floating_img.css"/>
<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
</head>


<body>
<header>	
	<h1><a href="#">Payroll Management <span>System</span></a></h1>
</header>
<div id="form_newuser">
	
	<h2>Creat New Account</h2>
	
	<?php
			if (!isset($_POST['submit'])) { 
		?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>
			 " method="post">
			<table border="0">
			<tr>
				<td>
				<label>Registration Date:</label>
				</td>
				<td><input type="text" value="<?php echo date("F d,Y");?>" name="reg_date" id="reg_date" readonly />
				</td>
		</tr>
		<tr>
			<td>
				<label>Registration Time:</label>
			</td>
			<td><input type="text" value="<?php $date = new DateTime("now"); echo date("H:i:s");?>" name="reg_time" id="reg_time" readonly />
			</td>
		</tr>
		<br/>
		<tr>
			<td>
				<label for="Fname">First Name:</label>
			</td>
			<td>
				<input type="text" name="Fname" required pattern="[a-zA-Z ]+"/>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
				<label for="Lname">Last Name:</label>
			</td>
			<td>
				<input type="text" name="Lname" required pattern="[a-zA-Z ]+"/>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
				<label for="username">Username:</label>
			</td>
			<td>
				<input type="text" name="username" id="username" required/>
			</td>	
				<td>
				<div id="ajax_checkusername"></div>
			</td>
		</tr>
		<tr>
			<td>
				<label for="password">Password:</label>
			</td>
			<td>
				<input type="password" name="pword" id="p1" required/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="password">Confirm Password:</label>
			</td>
			<td>
				<input type="password" name="ConfirnmPword" onfocus="validatePass(document.getElementById('p1'), this);" oninput="validatePass(document.getElementById('p1'), this);" required/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="user_position">Position:</label>
			</td>
			<td>
				<input type="text" name="user_position" required/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="user-address">Address:</label>
			</td>
			<td>
				<input type="text" name="user_address" required/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="user_country">Country:</label>
			</td>
			<td>
				<select name="user_country" width="147" id="user_country" required>
				  <option value=""  SELECTED >Select one</option>
                    <option value="Afghanistan"   >Afghanistan</option>
                    <option value="Aland Islands"   >Aland Islands</option>
                    <option value="Albania"   >Albania</option>
                    <option value="Algeria"   >Algeria</option>
                    <option value="American Samoa"   >American Samoa</option>
                    <option value="Andorra"   >Andorra</option>
                    <option value="Angola"   >Angola</option>
                    <option value="Anguilla"   >Anguilla</option>
                    <option value="Antarctica"   >Antarctica</option>
                    <option value="Antigua and Barbuda"   >Antigua and Barbuda</option>
                    <option value="Argentina"   >Argentina</option>
                    <option value="Armenia"   >Armenia</option>
                    <option value="Aruba"   >Aruba</option>
                    <option value="Australia"   >Australia</option>
                    <option value="Austria"   >Austria</option>
                    <option value="Azerbaijan"   >Azerbaijan</option>
                    <option value="Bahamas"   >Bahamas</option>
                    <option value="Bahrain"   >Bahrain</option>
                    <option value="Bangladesh"   >Bangladesh</option>
                    <option value="Barbados"   >Barbados</option>
                    <option value="Belarus"   >Belarus</option>
                    <option value="Belgium"   >Belgium</option>
                    <option value="Belize"   >Belize</option>
                    <option value="Benin"   >Benin</option>
                    <option value="Bermuda"   >Bermuda</option>
                    <option value="Bhutan"   >Bhutan</option>
                    <option value="Bolivia"   >Bolivia</option>
                    <option value="Bosnia and Herzegovina"   >Bosnia and Herzegovina</option>
                    <option value="Botswana"   >Botswana</option>
                    <option value="Bouvet Island"   >Bouvet Island</option>
                    <option value="Brazil"   >Brazil</option>
                    <option value="British Indian Ocean Territory"   >British Indian Ocean Territory</option>
                    <option value="British Virgin Islands"   >British Virgin Islands</option>
                    <option value="Brunei"   >Brunei</option>
                    <option value="Bulgaria"   >Bulgaria</option>
                    <option value="Burkina Faso"   >Burkina Faso</option>
                    <option value="Burundi"   >Burundi</option>
                    <option value="Cambodia"   >Cambodia</option>
                    <option value="Cameroon"   >Cameroon</option>
                    <option value="Canada"   >Canada</option>
                    <option value="Cape Verde"   >Cape Verde</option>
                    <option value="Cayman Islands"   >Cayman Islands</option>
                    <option value="Central African Republic"   >Central African Republic</option>
                    <option value="Chad"   >Chad</option>
                    <option value="Chile"   >Chile</option>
                    <option value="cn"   >China</option>
                    <option value="Christmas Island"   >Christmas Island</option>
                    <option value="Cocos (Keeling) Islands"   >Cocos (Keeling) Islands</option>
                    <option value="Colombia"   >Colombia</option>
                    <option value="Comoros"   >Comoros</option>
                    <option value="Congo"   >Congo</option>
                    <option value="Cook Islands"   >Cook Islands</option>
                    <option value="Costa Rica"   >Costa Rica</option>
                    <option value="Croatia"   >Croatia</option>
                    <option value="Cuba"   >Cuba</option>
                    <option value="Cyprus"   >Cyprus</option>
                    <option value="Czech Republic"   >Czech Republic</option>
                    <option value="Democratic Republic of Congo"   >Democratic Republic of Congo</option>
                    <option value="Denmark"   >Denmark</option>
                    <option value="Disputed Territory"   >Disputed Territory</option>
                    <option value="Djibouti"   >Djibouti</option>
                    <option value="Dominica"   >Dominica</option>
                    <option value="Dominican Republic"   >Dominican Republic</option>
                    <option value="East Timor"   >East Timor</option>
                    <option value="Ecuador"   >Ecuador</option>
                    <option value="Egypt"   >Egypt</option>
                    <option value="El Salvador"   >El Salvador</option>
                    <option value="Equatorial Guinea"   >Equatorial Guinea</option>
                    <option value="Eritrea"   >Eritrea</option>
                    <option value="Estonia"   >Estonia</option>
                    <option value="Ethiopia"   >Ethiopia</option>
                    <option value="Falkland Islands"   >Falkland Islands</option>
                    <option value="Faroe Islands"   >Faroe Islands</option>
                    <option value="Federated States of Micronesia"   >Federated States of Micronesia</option>
                    <option value="Fiji"   >Fiji</option>
                    <option value="Finland"   >Finland</option>
                    <option value="France"   >France</option>
                    <option value="French Guyana"   >French Guyana</option>
                    <option value="French Polynesia"   >French Polynesia</option>
                    <option value="French Southern Territories"   >French Southern Territories</option>
                    <option value="Gabon"   >Gabon</option>
                    <option value="Gambia"   >Gambia</option>
                    <option value="Georgia"   >Georgia</option>
                    <option value="Germany"   >Germany</option>
                    <option value="Ghana"   >Ghana</option>
                    <option value="Gibraltar"   >Gibraltar</option>
                    <option value="Greece"   >Greece</option>
                    <option value="Greenland"   >Greenland</option>
                    <option value="Grenada"   >Grenada</option>
                    <option value="Guadeloupe"   >Guadeloupe</option>
                    <option value="Guam"   >Guam</option>
                    <option value="Guatemala"   >Guatemala</option>
                    <option value="Guinea"   >Guinea</option>
                    <option value="Guinea-Bissau"   >Guinea-Bissau</option>
                    <option value="Guyana"   >Guyana</option>
                    <option value="Haiti"   >Haiti</option>
                    <option value="Heard Island and Mcdonald Islands"   >Heard Island and Mcdonald Islands</option>
                    <option value="Honduras"   >Honduras</option>
                    <option value="Hong Kong"   >Hong Kong</option>
                    <option value="Hungary"   >Hungary</option>
                    <option value="Iceland"   >Iceland</option>
                    <option value="India"   >India</option>
                    <option value="Indonesia"   >Indonesia</option>
                    <option value="Iran"   >Iran</option>
                    <option value="Iraq"   >Iraq</option>
                    <option value="Iraq-Saudi Arabia Neutral Zone"   >Iraq-Saudi Arabia Neutral Zone</option>
                    <option value="Ireland"   >Ireland</option>
                    <option value="Israel"   >Israel</option>
                    <option value="Italy"   >Italy</option>
                    <option value="Ivory Coast"   >Ivory Coast</option>
                    <option value="Jamaica"   >Jamaica</option>
                    <option value="Japan"   >Japan</option>
                    <option value="Jordan"   >Jordan</option>
                    <option value="Kazakhstan"   >Kazakhstan</option>
                    <option value="Kenya"   >Kenya</option>
                    <option value="Kiribati"   >Kiribati</option>
                    <option value="Kuwait"   >Kuwait</option>
                    <option value="Kyrgyzstan"   >Kyrgyzstan</option>
                    <option value="Laos"   >Laos</option>
                    <option value="Latvia"   >Latvia</option>
                    <option value="Lebanon"   >Lebanon</option>
                    <option value="Lesotho"   >Lesotho</option>
                    <option value="Liberia"   >Liberia</option>
                    <option value="Libya"   >Libya</option>
                    <option value="Liechtenstein"   >Liechtenstein</option>
                    <option value="Lithuania"   >Lithuania</option>
                    <option value="Luxembourg"   >Luxembourg</option>
                    <option value="Macau"   >Macau</option>
                    <option value="Macedonia"   >Macedonia</option>
                    <option value="Madagascar"   >Madagascar</option>
                    <option value="Malawi"   >Malawi</option>
                    <option value="Malaysia"   >Malaysia</option>
                    <option value="Maldives"   >Maldives</option>
                    <option value="Mali"   >Mali</option>
                    <option value="Malta"   >Malta</option>
                    <option value="Marshall Islands"   >Marshall Islands</option>
                    <option value="Martinique"   >Martinique</option>
                    <option value="Mauritania"   >Mauritania</option>
                    <option value="Mauritius"   >Mauritius</option>
                    <option value="Mayotte"   >Mayotte</option>
                    <option value="Mexico"   >Mexico</option>
                    <option value="Moldova"   >Moldova</option>
                    <option value="Monaco"   >Monaco</option>
                    <option value="Mongolia"   >Mongolia</option>
                    <option value="Montserrat"   >Montserrat</option>
                    <option value="Morocco"   >Morocco</option>
                    <option value="Mozambique"   >Mozambique</option>
                    <option value="Myanmar"   >Myanmar</option>
                    <option value="Namibia"   >Namibia</option>
                    <option value="Nauru"   >Nauru</option>
                    <option value="Nepal"   >Nepal</option>
                    <option value="Netherlands"   >Netherlands</option>
                    <option value="Netherlands Antilles"   >Netherlands Antilles</option>
                    <option value="New Caledonia"   >New Caledonia</option>
                    <option value="New Zealand"   >New Zealand</option>
                    <option value="Nicaragua"   >Nicaragua</option>
                    <option value="Niger"   >Niger</option>
                    <option value="Nigeria"   >Nigeria</option>
                    <option value="Niue"   >Niue</option>
                    <option value="Norfolk Island"   >Norfolk Island</option>
                    <option value="North Korea"   >North Korea</option>
                    <option value="Northern Mariana Islands"   >Northern Mariana Islands</option>
                    <option value="Norway"   >Norway</option>
                    <option value="Oman"   >Oman</option>
                    <option value="Pakistan"   >Pakistan</option>
                    <option value="Palau"   >Palau</option>
                    <option value="Palestinian Territories"   >Palestinian Territories</option>
                    <option value="Panama"   >Panama</option>
                    <option value="Papua New Guinea"   >Papua New Guinea</option>
                    <option value="Paraguay"   >Paraguay</option>
                    <option value="Peru"   >Peru</option>
                    <option value="Philippines"   >Philippines</option>
                    <option value="Pitcairn Islands"   >Pitcairn Islands</option>
                    <option value="Poland"   >Poland</option>
                    <option value="Portugal"   >Portugal</option>
                    <option value="Puerto Rico"   >Puerto Rico</option>
                    <option value="Qatar"   >Qatar</option>
                    <option value="Reunion"   >Reunion</option>
                    <option value="Romania"   >Romania</option>
                    <option value="Russia"   >Russia</option>
                    <option value="Rwanda"   >Rwanda</option>
                    <option value="Saint Helena and Dependencies"   >Saint Helena and Dependencies</option>
                    <option value="Saint Kitts and Nevis"   >Saint Kitts and Nevis</option>
                    <option value="Saint Lucia"   >Saint Lucia</option>
                    <option value="Saint Pierre and Miquelon"   >Saint Pierre and Miquelon</option>
                    <option value="Saint Vincent and the Grenadines"   >Saint Vincent and the Grenadines</option>
                    <option value="Samoa"   >Samoa</option>
                    <option value="San Marino"   >San Marino</option>
                    <option value="Sao Tome and Principe"   >Sao Tome and Principe</option>
                    <option value="Saudi Arabia"   >Saudi Arabia</option>
                    <option value="Senegal"   >Senegal</option>
                    <option value="Seychelles"   >Seychelles</option>
                    <option value="Sierra Leone"   >Sierra Leone</option>
                    <option value="Singapore"   >Singapore</option>
                    <option value="Slovakia"   >Slovakia</option>
                    <option value="Slovenia"   >Slovenia</option>
                    <option value="Solomon Islands"   >Solomon Islands</option>
                    <option value="Somalia"   >Somalia</option>
                    <option value="South Africa"   >South Africa</option>
                    <option value="South Georgia and South Sandwich Islands"   >South Georgia and South Sandwich Islands</option>
                    <option value="South Korea"   >South Korea</option>
                    <option value="Spain"   >Spain</option>
                    <option value="Spratly Islands"   >Spratly Islands</option>
                    <option value="Sri Lanka"   >Sri Lanka</option>
                    <option value="Sudan"   >Sudan</option>
                    <option value="Suriname"   >Suriname</option>
                    <option value="Svalbard and Jan Mayen"   >Svalbard and Jan Mayen</option>
                    <option value="Swaziland"   >Swaziland</option>
                    <option value="Sweden"   >Sweden</option>
                    <option value="Switzerland"   >Switzerland</option>
                    <option value="Syria"   >Syria</option>
                    <option value="Taiwan"   >Taiwan</option>
                    <option value="Tajikistan"   >Tajikistan</option>
                    <option value="Tanzania"   >Tanzania</option>
                    <option value="Thailand"   >Thailand</option>
                    <option value="Togo"   >Togo</option>
                    <option value="Tokelau"   >Tokelau</option>
                    <option value="Tonga"   >Tonga</option>
                    <option value="Trinidad and Tobago"   >Trinidad and Tobago</option>
                    <option value="Tunisia"   >Tunisia</option>
                    <option value="Turkey"   >Turkey</option>
                    <option value="Turkmenistan"   >Turkmenistan</option>
                    <option value="Turks And Caicos Islands"   >Turks And Caicos Islands</option>
                    <option value="Tuvalu"   >Tuvalu</option>
                    <option value="Uganda"   >Uganda</option>
                    <option value="Ukraine"   >Ukraine</option>
                    <option value="United Arab Emirates"   >United Arab Emirates</option>
                    <option value="United Kingdom"   >United Kingdom</option>
                    <option value="United States"   >United States</option>
                    <option value="United States Minor Outlying Islands"   >United States Minor Outlying Islands</option>
                    <option value="Uruguay"   >Uruguay</option>
                    <option value="US Virgin Islands"   >US Virgin Islands</option>
                    <option value="Uzbekistan"   >Uzbekistan</option>
                    <option value="Vanuatu"   >Vanuatu</option>
                    <option value="Vatican City"   >Vatican City</option>
                    <option value="Venezuela"   >Venezuela</option>
                    <option value="Vietnam"   >Vietnam</option>
                    <option value="Wallis and Futuna"   >Wallis and Futuna</option>
                    <option value="Western Sahara"   >Western Sahara</option>
                    <option value="Yemen"   >Yemen</option>
                    <option value="Zambia"   >Zambia</option>
                    <option value="Zimbabwe"   >Zimbabwe</option>
                    <option value="Serbia"   >Serbia</option>
                    <option value="Montenegro"   >Montenegro</option>
				</select> 
			</td>
		</tr>
		<tr>
			<td>
				<label for="zipcode">Zip Code:</label>
			</td>
			<td>
				<input type="text" name="zipcode" required pattern="[0-9]{4}"/>
			</td>
		</tr>
		</table>
		<div id="create_reset_btn">
			<input class="btn btn-info" type="submit" id="submit_btn_adduser" name="submit" value="Create"/>
			<input class="btn btn-info" type="reset" name="reset" value="Reset"/>
		</div>
	</form>

	<?php 
		} // end if
		else {
			$reg_date_time = $_POST["reg_date"]." , " .$_POST["reg_time"];
			$Uname = mysql_real_escape_string(trim($_POST["username"]));
			$pword = mysql_real_escape_string(trim (sha1($_POST["pword"])));
			$Fname = mysql_real_escape_string(trim($_POST["Fname"]));
			$Lname = mysql_real_escape_string(trim($_POST["Lname"]));
			$position = mysql_real_escape_string(trim($_POST["user_position"]));
			$address = mysql_real_escape_string(trim($_POST["user_address"]));
			$country = mysql_real_escape_string(trim($_POST["user_country"]));
			$zipcode = mysql_real_escape_string(trim($_POST["zipcode"]));

			$sql_user = "INSERT INTO seg_ps_users (reg_date_time, username, password, firstname, lastname, position, address, country, zipcode)
			VALUES ('$reg_date_time', '$Uname', '$pword', '$Fname', '$Lname', '$position', '$address', '$country' , '$zipcode')";
			if (!mysqli_query($con,$sql_user))
			  {
			  die('Error: ' . mysqli_error($con));
			  }
			echo "<p class=success_user style=text-align:center;>Successfully New User Account Added </br>";
               
			echo "<a href=login.php>[go to log in page]</a></p>";

		}

	?>

<!--Confirm Password-->

<script type="text/javascript">
function validatePass(p1, p2) {
if (p1.value != p2.value || p1.value == '' || p2.value == '') {
p2.setCustomValidity('Password incorrect');
} else {
p2.setCustomValidity('');
}
}
</script>


	<!--validator-->

<script type="text/javascript">

$(document).ready(function(){

	$('#username').keyup(function(){

		$('#ajax_checkusername').html('<img src="ps_theme/images/ajax-loader_s.gif" />')
		var check_username = $(this).val();
		var data_checkusername = "username=" + check_username ;
		if ( check_username  == null || check_username == ""){
        	$("#ajax_checkusername").html('');
        	

      	} else{

      		$.ajax({
		        type:"POST",
		        url:"ps_theme/ajax/ps_ajax_check_username.php",
		        data:data_checkusername,
		        success:function(data){
		        	if (data == 0) {
		        		$('#ajax_checkusername').html('<img src="ps_theme/images/icon-ok.jpg" />');
                         $('#submit_btn_adduser').attr('disabled',false);

		        	}else {
		        		$('#ajax_checkusername').html('<img src="ps_theme/images/icon-x.jpg" />');

                              $('#submit_btn_adduser').attr('disabled',true);

		        	};
		            
		        }
		     });

      	} // end else
	});

}); // end document

</script>

</div>
<div id="divBottomRight">
	<a href="#"><img src="ps_theme/images/seglogo.png" alt="" title="Segworks Technologies Corporation"/></a>
</div>
<script type="text/javascript" src="ps_theme/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="ps_theme/js/floating_image.js"></script>
<script type="text/javascript" src="ps_theme/js/float_image.js"></script>
</body>
</html>
<?php

mysqli_close($con);
?>