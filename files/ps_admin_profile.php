<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/profile.css"/>
<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<header>
	<h1>Admin Profile</h1>
</header>
<div id="content-admin-profile">
	<div id="employee_info">
		<form action="#" method="post">
			<table border="0" width="400" class="table table-striped" >
			<tr>
				<td>
					Registration Date:
				</td>
				<td>
					March 21, 2008
				</td>
			</tr>
			<tr>
				<td>
					Registration Time:
				</td>
				<td>
					10:00 am
				</td>
			</tr>
			<tr>
				<td>
					First Name:
				</td>
				<td>
					Arnel
				</td>
			</tr>
			<tr>
				<td>
					Last Name:
				</td>
				<td>
					Moso
				</td>
			</tr>
			<tr>
				<td>
					Position:
				</td>
				<td>
					Admin Officer
				</td>
			</tr>
			<tr>
				<td>
					Address:
				</td>
				<td>
					Davao City
				</td>
			</tr>
			<tr>
				<td>
					Country:
				</td>
				<td>
					Philippines
				</td>
			</tr>
			<tr>
				<td>
					Zip Code:
				</td>
				<td>
					8000
				</td>
			</tr>
			<tr>
				<td>
					Nationality:
				</td>
				<td>
					Filipino
				</td>
			</tr>
			</table>
		</form>
	</div>
	<div id="profile_pic">
		<img src="http://placehold.it/150x150" class="img-polaroid" />
		<form action="#" method="post">
			<input type="file" name="picture" accept="image/jpeg, image/gif, image/png" />
			<input class="btn btn-info btn-small upload_btn" type="submit" value="Upload" name="upload_btn" />
			<div id="update_add">
				<a href="#" class="btn">Update</a>
				<a href="ps_add_newuser.php" target="_self" class="btn">Add New User</a>
			</div>
		</form>
	</div>
</div>
	<div class="clear"></div>
	<!--Page Generated-->
	<?php $start_time = microtime(true); 

$time_gen = number_format(microtime(true) - $start_time, 9);

?>

<pre class="prettyprint" id="page=generated" style="width: 90%; ">
This page was generated in <span class="atv"><?php echo"$time_gen"; ?></span> seconds.
</pre>
</body>
</html>