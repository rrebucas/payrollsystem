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
<link rel="stylesheet" type="text/css" href="ps_theme/css/floating_img.css"/>
<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
</head>


<body>
<header>	
	<h1><a href="#">Payroll Management <span>System</span></a></h1>
</header>
<div id="form_newuser">
	
	<h2>Creat New Account</h2>
	<form action="#" method="post">
		<table border="0">
		<tr>
			<td>
				<label>Registration Date:</label>
			</td>
			<td>
				<input type="text" name="reg_date" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Registration Time:</label>
			</td>
			<td>
				<input type="text" name="reg_time" />
			</td>
		</tr>
		<br/>
		<tr>
			<td>
				<label>First Name:</label>
			</td>
			<td>
				<input type="text" name="Fname" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Last Name:</label>
			</td>
			<td>
				<input type="text" name="Lname" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Username:</label>
			</td>
			<td>
				<input type="text" name="Uname" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="password">Password:</label>
			</td>
			<td>
				<input type="password" name="pword" id="p1" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="password">Confirm Password:</label>
			</td>
			<td>
				<input type="password" name="ConfirnmPword" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Position:</label>
			</td>
			<td>
				<input type="text" name="user_position" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Address:</label>
			</td>
			<td>
				<input type="text" name="user_address" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Country:</label>
			</td>
			<td>
				<input type="text" name="user_country" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="zip">Zip Code:</label>
			</td>
			<td>
				<input type="text" name="zip" />
			</td>
		</tr>
		<tr>
			<td>
				<label>Nationality:</label>
			</td>
			<td>
				<input type="text" name="user_nationality" />
			</td>
		</tr>
		</table>
		<div id="create_reset_btn">
			<input class="btn btn-info" type="submit" name="position" value="Create" />
			<input class="btn" type="reset" name="position" value="Reset" />
		</div>
	</form>

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