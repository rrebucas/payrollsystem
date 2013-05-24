<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/new_user.css"/>
<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
<?php
// Create connection
$con=mysqli_connect("localhost","root","","seg_ps_db");
// Check connection
if (mysqli_connect_errno($con))
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
</head>
<body>
<div id="new_user_content">
	<h1>Add New User</h1>
	<div id="user_form">
		<?php
	if (!isset($_POST['submit'])) { // if page is not submitted to itself echo the form
?>
		<form action="<?php echo $_server['php_self']; ?>
			 " method="post">
			<table border="0">
			<tr>
				<td>
					<label>Registration Date:</label>
				</td>
				<td>
					<input type="text" name="reg_date" required/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Registration Time:</label>
				</td>
				<td>
					<input type="text" name="reg_time" required/>
				</td>
			</tr>
			<br/>
			<tr>
				<td>
					<label>First Name:</label>
				</td>
				<td>
					<input type="text" name="Fname" required pattern="[a-zA-Z ]+"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Last Name:</label>
				</td>
				<td>
					<input type="text" name="Lname" required pattern="[a-zA-Z ]+"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Username:</label>
				</td>
				<td>
					<input type="text" name="Uname" required/>
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
					<label>Position:</label>
				</td>
				<td>
					<input type="text" name="user_position" required/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Address:</label>
				</td>
				<td>
					<input type="text" name="user_address" required/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Country:</label>
				</td>
				<td>
					<input type="text" name="user_country" required/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="zip">Zip Code:</label>
				</td>
				<td>
					<input type="text" name="zip" required pattern="[0-9]{4}"/>
				</td>
			</tr>
			<tr>
				<td>
					<label>Nationality:</label>
				</td>
				<td>
					<input type="text" name="user_nationality" required/>
				</td>
			</tr>
			</table>
			<div id="create_reset_btn">
				<input class="btn btn-info" type="submit" name="position" value="Create"/>
				<input class="btn" type="reset" name="position" value="Reset"/>
			</div>
		</form>
	</div>
</div>
<div class="clear">
</div>
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
<?php
}
else {
$Date_time = $_POST["reg_date"];
$Uname = $_POST["Uname"];
$pword = $_POST["pword"];
$Fname = $_POST["Fname"];
$Lname = $_POST["Lname"];
$position = $_POST["user_position"];
$address = $_POST["user_address"];
$country = $_POST["user_country"];
$zipcode = $_POST["zipcode"];
$nationality = $_POST["user_nationality"];
$sql_user = "INSERT INTO seg_payrollsystem_user (reg_date_time, username, password, firstname, lastname, position, address, country, zipcode, nationality)
VALUES ('$Date_time', '$Uname', '$pword', '$Fname', '$Lname', '$position', '$address', '$country' , '$zipcode', '$nationality')";
if (!mysqli_query($con,$sql_user))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";
}
mysqli_close($con);
?>
</body>
</html>