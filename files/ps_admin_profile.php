<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/profile.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/floating_img.css"/>
<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>

<?php
// Create connection
require_once 'ps_connect_db.php'
?> 

</head>
<body>
<header>
	<h1>Admin Profile</h1>
</header>
<div id="content-admin-profile">
	<div id="employee_info">
		<form action="#" method="post">

		<?php

		$result = mysqli_query($con,"SELECT * FROM seg_ps_users");

echo "<table border=0 width=400 class=table table-striped >";

while($row = mysqli_fetch_array($result))
  {
  	?>
  <tr>
	  <td>Registered Last:</td>
	 <?php
	  echo "<td>" . $row['reg_date_time'] . "</td>";
	  ?>
	</tr>
	<tr>
	  <td>First Name:</td>
	 <?php
	  echo "<td>" . $row['firstname'] . "</td>";
	  ?>
	</tr>
	<tr>
	  <td>Last Name:</td>
	 <?php
	  echo "<td>" . $row['lastname'] . "</td>";
	  ?>
	</tr>
	<tr>
	  <td>Position:</td>
	 <?php
	  echo "<td>" . $row['position'] . "</td>";
	  ?>
	</tr>
	<tr>
	  <td>Address:</td>
	 <?php
	  echo "<td>" . $row['address'] . "</td>";
	  ?>
	</tr>
	<tr>
	  <td>Country:</td>
	 <?php
	  echo "<td>" . $row['country'] . "</td>";
	  ?>
	</tr>
	<tr>
	  <td>Zip Code:</td>
	 <?php
	  echo "<td>" . $row['zipcode'] . "</td>";
	}
	  ?>
	</tr>
	</table>
		</form>
	</div>
	<div id="profile_pic">


<!--FORM-->
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ENCTYPE="multipart/form-data" >
			<input type="file" name="image" id="file" required />
			<input class="btn btn-info btn-small upload_btn" type="submit" value="Upload" name="submit" />
			<div id="update_add">
				<a href="#" class="btn">Update</a>
				<a href="ps_add_newuser.php" target="_self" class="btn">Add New User</a>
			</div>
		</form>
	</div>
</div>
	<div class="clear"></div>
	<div id="divBottomRight">
	<a href="#"><img src="ps_theme/images/seglogo.png" alt="" title="Segworks Technologies Corporation"/></a>
</div>




<!--FILE UPLOAD-->
<?php 

	 $query=mysql_query("SELECT * FROM image_upload")or die(mysql_error());
	 while($row=mysql_fetch_array($query)){
	 ?>
	 
    <img src="<?php echo $row['image']; ?>" width="100" height="100" alt="" class="img-rounded img-polaroid" />

	

  <?php

if (isset($_POST['submit'])) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    $location = $_POST['image'];

    if (file_exists("/ps_files/user_img/" . $_FILES["image"]["name"]))
      {
      echo $_FILES["image"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["image"]["tmp_name"],
      "/ps_files/user_img/" . $_FILES["image"]["name"]);
      echo "Stored in: " . "/ps_files/user_img/" . $_FILES["image"]["name"];
      }




		$sql_user = "INSERT INTO image_upload(image)
			VALUES ('$location')";
			if (!mysqli_query($con,$sql_user))
			  {
			  die('Error: ' . mysqli_error($con));
			  }
			echo "Image Added </br>";
}
?>

<?php 
	}
	?>


<!--Page Generated-->
<?php $start_time = microtime(true);
$time_gen = number_format(microtime(true) - $start_time, 9);
?>

<pre class="prettyprint" id="page=generated" style="width: 90%; clear: both; margin: 0 auto; margin-bottom: 20px;">
 This page was generated in <span class="atv"><?php echo"$time_gen"; ?>
</span> seconds.
</pre>

</body>
</html>
<?php

mysqli_close($con);
?>