<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/new_user.css"/>
<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div id="new_user_content">
	<h1>Add New User</h1>
	<div id="user_form">
		<form action="#" method="post">
			<table border="0">
			<tr>
				<td>
					<label>Registration Date:</label>
				</td>
				<td>
					<input type="text" name="reg_date" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Registration Time:</label>
				</td>
				<td>
					<input type="text" name="reg_time" required />
				</td>
			</tr>
			<br/>
			<tr>
				<td>
					<label>First Name:</label>
				</td>
				<td>
					<input type="text" name="Fname" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Last Name:</label>
				</td>
				<td>
					<input type="text" name="Lname" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Username:</label>
				</td>
				<td>
					<input type="text" name="Uname" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Password:</label>
				</td>
				<td>
					<input type="password" name="pword" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Confirm Password:</label>
				</td>
				<td>
					<input type="password" name="ConfirnmPword" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Position:</label>
				</td>
				<td>
					<input type="text" name="user_position" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Address:</label>
				</td>
				<td>
					<input type="text" name="user_address" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Country:</label>
				</td>
				<td>
					<input type="text" name="user_country" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Zip Code:</label>
				</td>
				<td>
					<input type="text" name="user_zipcode" required />
				</td>
			</tr>
			<tr>
				<td>
					<label>Nationality:</label>
				</td>
				<td>
					<input type="text" name="user_nationality" required />
				</td>
			</tr>
			</table>
			<div id="create_reset_btn">
				<input class="btn btn-info" type="submit" name="position" value="Create" />
				<input class="btn" type="reset" name="position" value="Reset" />
			</div>
		</form>
	</div>
	<div id="new-user">
		<form action="#" method="post">
			<img src="http://placehold.it/150x150" class="img-polaroid" />
			<input id="browse_file" type="file" name="picture" accept="image/jpeg, image/gif, image/png" />
			<input class="btn btn-info upload_user" type="submit" name="upload_new_user" value="Upload" />
		</form>
	</div>

</div>
		<div class="clear"></div>
	<!--Page Generated-->
	<?php $start_time = microtime(true); 

$time_gen = number_format(microtime(true) - $start_time, 9);

?>

<pre class="prettyprint" id="page=generated" style="width: 90%; clear: both; margin: 0 auto; margin-bottom: 20px;">
This page was generated in <span class="atv"><?php echo"$time_gen"; ?></span> seconds.
</pre>
</body>
</html>