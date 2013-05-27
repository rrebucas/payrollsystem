<?php

require_once('ps_connect_db.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/new_user.css"/>
<script type="text/javascript" src="ps_theme/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="ps_includes/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<div id="new_user_content">
	<h1>Add New User</h1>
	<div id="user_form">
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
			<td><input type="text" value="<?php $date = new DateTime("now"); echo date("H:i:s A");?>" name="reg_time" id="reg_time" readonly />
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
                    <option value="af"   >Afghanistan</option>
                    <option value="ax"   >Aland Islands</option>
                    <option value="al"   >Albania</option>
                    <option value="dz"   >Algeria</option>
                    <option value="as"   >American Samoa</option>
                    <option value="ad"   >Andorra</option>
                    <option value="ao"   >Angola</option>
                    <option value="ai"   >Anguilla</option>
                    <option value="aq"   >Antarctica</option>
                    <option value="ag"   >Antigua and Barbuda</option>
                    <option value="ar"   >Argentina</option>
                    <option value="am"   >Armenia</option>
                    <option value="aw"   >Aruba</option>
                    <option value="au"   >Australia</option>
                    <option value="at"   >Austria</option>
                    <option value="az"   >Azerbaijan</option>
                    <option value="bs"   >Bahamas</option>
                    <option value="bh"   >Bahrain</option>
                    <option value="bd"   >Bangladesh</option>
                    <option value="bb"   >Barbados</option>
                    <option value="by"   >Belarus</option>
                    <option value="be"   >Belgium</option>
                    <option value="bz"   >Belize</option>
                    <option value="bj"   >Benin</option>
                    <option value="bm"   >Bermuda</option>
                    <option value="bt"   >Bhutan</option>
                    <option value="bo"   >Bolivia</option>
                    <option value="ba"   >Bosnia and Herzegovina</option>
                    <option value="bw"   >Botswana</option>
                    <option value="bv"   >Bouvet Island</option>
                    <option value="br"   >Brazil</option>
                    <option value="io"   >British Indian Ocean Territory</option>
                    <option value="vg"   >British Virgin Islands</option>
                    <option value="bn"   >Brunei</option>
                    <option value="bg"   >Bulgaria</option>
                    <option value="bf"   >Burkina Faso</option>
                    <option value="bi"   >Burundi</option>
                    <option value="kh"   >Cambodia</option>
                    <option value="cm"   >Cameroon</option>
                    <option value="ca"   >Canada</option>
                    <option value="cv"   >Cape Verde</option>
                    <option value="ky"   >Cayman Islands</option>
                    <option value="cf"   >Central African Republic</option>
                    <option value="td"   >Chad</option>
                    <option value="cl"   >Chile</option>
                    <option value="cn"   >China</option>
                    <option value="cx"   >Christmas Island</option>
                    <option value="cc"   >Cocos (Keeling) Islands</option>
                    <option value="co"   >Colombia</option>
                    <option value="km"   >Comoros</option>
                    <option value="cg"   >Congo</option>
                    <option value="ck"   >Cook Islands</option>
                    <option value="cr"   >Costa Rica</option>
                    <option value="hr"   >Croatia</option>
                    <option value="cu"   >Cuba</option>
                    <option value="cy"   >Cyprus</option>
                    <option value="cz"   >Czech Republic</option>
                    <option value="cd"   >Democratic Republic of Congo</option>
                    <option value="dk"   >Denmark</option>
                    <option value="xx"   >Disputed Territory</option>
                    <option value="dj"   >Djibouti</option>
                    <option value="dm"   >Dominica</option>
                    <option value="do"   >Dominican Republic</option>
                    <option value="tl"   >East Timor</option>
                    <option value="ec"   >Ecuador</option>
                    <option value="eg"   >Egypt</option>
                    <option value="sv"   >El Salvador</option>
                    <option value="gq"   >Equatorial Guinea</option>
                    <option value="er"   >Eritrea</option>
                    <option value="ee"   >Estonia</option>
                    <option value="et"   >Ethiopia</option>
                    <option value="fk"   >Falkland Islands</option>
                    <option value="fo"   >Faroe Islands</option>
                    <option value="fm"   >Federated States of Micronesia</option>
                    <option value="fj"   >Fiji</option>
                    <option value="fi"   >Finland</option>
                    <option value="fr"   >France</option>
                    <option value="gf"   >French Guyana</option>
                    <option value="pf"   >French Polynesia</option>
                    <option value="tf"   >French Southern Territories</option>
                    <option value="ga"   >Gabon</option>
                    <option value="gm"   >Gambia</option>
                    <option value="ge"   >Georgia</option>
                    <option value="de"   >Germany</option>
                    <option value="gh"   >Ghana</option>
                    <option value="gi"   >Gibraltar</option>
                    <option value="gr"   >Greece</option>
                    <option value="gl"   >Greenland</option>
                    <option value="gd"   >Grenada</option>
                    <option value="gp"   >Guadeloupe</option>
                    <option value="gu"   >Guam</option>
                    <option value="gt"   >Guatemala</option>
                    <option value="gn"   >Guinea</option>
                    <option value="gw"   >Guinea-Bissau</option>
                    <option value="gy"   >Guyana</option>
                    <option value="ht"   >Haiti</option>
                    <option value="hm"   >Heard Island and Mcdonald Islands</option>
                    <option value="hn"   >Honduras</option>
                    <option value="hk"   >Hong Kong</option>
                    <option value="hu"   >Hungary</option>
                    <option value="is"   >Iceland</option>
                    <option value="in"   >India</option>
                    <option value="id"   >Indonesia</option>
                    <option value="ir"   >Iran</option>
                    <option value="iq"   >Iraq</option>
                    <option value="xe"   >Iraq-Saudi Arabia Neutral Zone</option>
                    <option value="ie"   >Ireland</option>
                    <option value="il"   >Israel</option>
                    <option value="it"   >Italy</option>
                    <option value="ci"   >Ivory Coast</option>
                    <option value="jm"   >Jamaica</option>
                    <option value="jp"   >Japan</option>
                    <option value="jo"   >Jordan</option>
                    <option value="kz"   >Kazakhstan</option>
                    <option value="ke"   >Kenya</option>
                    <option value="ki"   >Kiribati</option>
                    <option value="kw"   >Kuwait</option>
                    <option value="kg"   >Kyrgyzstan</option>
                    <option value="la"   >Laos</option>
                    <option value="lv"   >Latvia</option>
                    <option value="lb"   >Lebanon</option>
                    <option value="ls"   >Lesotho</option>
                    <option value="lr"   >Liberia</option>
                    <option value="ly"   >Libya</option>
                    <option value="li"   >Liechtenstein</option>
                    <option value="lt"   >Lithuania</option>
                    <option value="lu"   >Luxembourg</option>
                    <option value="mo"   >Macau</option>
                    <option value="mk"   >Macedonia</option>
                    <option value="mg"   >Madagascar</option>
                    <option value="mw"   >Malawi</option>
                    <option value="my"   >Malaysia</option>
                    <option value="mv"   >Maldives</option>
                    <option value="ml"   >Mali</option>
                    <option value="mt"   >Malta</option>
                    <option value="mh"   >Marshall Islands</option>
                    <option value="mq"   >Martinique</option>
                    <option value="mr"   >Mauritania</option>
                    <option value="mu"   >Mauritius</option>
                    <option value="yt"   >Mayotte</option>
                    <option value="mx"   >Mexico</option>
                    <option value="md"   >Moldova</option>
                    <option value="mc"   >Monaco</option>
                    <option value="mn"   >Mongolia</option>
                    <option value="ms"   >Montserrat</option>
                    <option value="ma"   >Morocco</option>
                    <option value="mz"   >Mozambique</option>
                    <option value="mm"   >Myanmar</option>
                    <option value="na"   >Namibia</option>
                    <option value="nr"   >Nauru</option>
                    <option value="np"   >Nepal</option>
                    <option value="nl"   >Netherlands</option>
                    <option value="an"   >Netherlands Antilles</option>
                    <option value="nc"   >New Caledonia</option>
                    <option value="nz"   >New Zealand</option>
                    <option value="ni"   >Nicaragua</option>
                    <option value="ne"   >Niger</option>
                    <option value="ng"   >Nigeria</option>
                    <option value="nu"   >Niue</option>
                    <option value="nf"   >Norfolk Island</option>
                    <option value="kp"   >North Korea</option>
                    <option value="mp"   >Northern Mariana Islands</option>
                    <option value="no"   >Norway</option>
                    <option value="om"   >Oman</option>
                    <option value="pk"   >Pakistan</option>
                    <option value="pw"   >Palau</option>
                    <option value="ps"   >Palestinian Territories</option>
                    <option value="pa"   >Panama</option>
                    <option value="pg"   >Papua New Guinea</option>
                    <option value="py"   >Paraguay</option>
                    <option value="pe"   >Peru</option>
                    <option value="ph"   >Philippines</option>
                    <option value="pn"   >Pitcairn Islands</option>
                    <option value="pl"   >Poland</option>
                    <option value="pt"   >Portugal</option>
                    <option value="pr"   >Puerto Rico</option>
                    <option value="qa"   >Qatar</option>
                    <option value="re"   >Reunion</option>
                    <option value="ro"   >Romania</option>
                    <option value="ru"   >Russia</option>
                    <option value="rw"   >Rwanda</option>
                    <option value="sh"   >Saint Helena and Dependencies</option>
                    <option value="kn"   >Saint Kitts and Nevis</option>
                    <option value="lc"   >Saint Lucia</option>
                    <option value="pm"   >Saint Pierre and Miquelon</option>
                    <option value="vc"   >Saint Vincent and the Grenadines</option>
                    <option value="ws"   >Samoa</option>
                    <option value="sm"   >San Marino</option>
                    <option value="st"   >Sao Tome and Principe</option>
                    <option value="sa"   >Saudi Arabia</option>
                    <option value="sn"   >Senegal</option>
                    <option value="sc"   >Seychelles</option>
                    <option value="sl"   >Sierra Leone</option>
                    <option value="sg"   >Singapore</option>
                    <option value="sk"   >Slovakia</option>
                    <option value="si"   >Slovenia</option>
                    <option value="sb"   >Solomon Islands</option>
                    <option value="so"   >Somalia</option>
                    <option value="za"   >South Africa</option>
                    <option value="gs"   >South Georgia and South Sandwich Islands</option>
                    <option value="kr"   >South Korea</option>
                    <option value="es"   >Spain</option>
                    <option value="pi"   >Spratly Islands</option>
                    <option value="lk"   >Sri Lanka</option>
                    <option value="sd"   >Sudan</option>
                    <option value="sr"   >Suriname</option>
                    <option value="sj"   >Svalbard and Jan Mayen</option>
                    <option value="sz"   >Swaziland</option>
                    <option value="se"   >Sweden</option>
                    <option value="ch"   >Switzerland</option>
                    <option value="sy"   >Syria</option>
                    <option value="tw"   >Taiwan</option>
                    <option value="tj"   >Tajikistan</option>
                    <option value="tz"   >Tanzania</option>
                    <option value="th"   >Thailand</option>
                    <option value="tg"   >Togo</option>
                    <option value="tk"   >Tokelau</option>
                    <option value="to"   >Tonga</option>
                    <option value="tt"   >Trinidad and Tobago</option>
                    <option value="tn"   >Tunisia</option>
                    <option value="tr"   >Turkey</option>
                    <option value="tm"   >Turkmenistan</option>
                    <option value="tc"   >Turks And Caicos Islands</option>
                    <option value="tv"   >Tuvalu</option>
                    <option value="ug"   >Uganda</option>
                    <option value="ua"   >Ukraine</option>
                    <option value="ae"   >United Arab Emirates</option>
                    <option value="uk"   >United Kingdom</option>
                    <option value="us"   >United States</option>
                    <option value="um"   >United States Minor Outlying Islands</option>
                    <option value="uy"   >Uruguay</option>
                    <option value="vi"   >US Virgin Islands</option>
                    <option value="uz"   >Uzbekistan</option>
                    <option value="vu"   >Vanuatu</option>
                    <option value="va"   >Vatican City</option>
                    <option value="ve"   >Venezuela</option>
                    <option value="vn"   >Vietnam</option>
                    <option value="wf"   >Wallis and Futuna</option>
                    <option value="eh"   >Western Sahara</option>
                    <option value="ye"   >Yemen</option>
                    <option value="zm"   >Zambia</option>
                    <option value="zw"   >Zimbabwe</option>
                    <option value="rs"   >Serbia</option>
                    <option value="me"   >Montenegro</option>
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
			<input class="btn" type="reset" name="reset" value="Reset"/>
		</div>
	</form>
	<?php 
		} // end if
		else {
			$reg_date_time = $_POST["reg_date"]." " .$_POST["reg_time"];
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
			echo "Successfully New User Account Added </br>";
			echo "<a href=ps_add_newuser.php>[back to register again]</a>";

		}

	?>
</div>
</div>
<div class="clear"></div>
<!--Page Generated-->
<?php $start_time = microtime(true);
$time_gen = number_format(microtime(true) - $start_time, 9);
?>

<pre class="prettyprint" id="page=generated" style="width: 90%; clear: both; margin: 0 auto; margin-bottom: 20px;">
 This page was generated in <span class="atv"><?php echo"$time_gen"; ?>
</span> seconds.
</pre>

<script type="text/javascript">
function validatePass(p1, p2) {
if (p1.value != p2.value || p1.value == '' || p2.value == '') {
p2.setCustomValidity('Password incorrect');
} else {
p2.setCustomValidity('');
}
}
</script>

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

</body>

</html>
<?php
mysqli_close($con);
?>