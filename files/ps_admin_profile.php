<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/profile.css"/>
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
		<?php


		$result = mysqli_query($con,"SELECT image FROM image_tbl");

while($row = mysqli_fetch_array($result))
  {
  echo "<img src=" . $row['image'] . " alt=profile_picture />" ;
  }
		?>
		
	
	<?php
	if (!isset($_POST['submit'])) { // if page is not submitted to itself echo the form
?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" ENCTYPE="multipart/form-data" >
			<input type="file" name="file" id="file" accept="image/jpeg, image/gif, image/png, image/jpg" />
			<input class="btn btn-info btn-small upload_btn" type="submit" value="Upload" name="submit" />
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


<?php
}
else{
$allowedExts = array("gif", "jpeg", "jpg", "png");

if(!empty($_POST["submit"]))
{
if(empty($_FILES["file"]["tmp_name"]))
$error[]="File is a required field."; // Check if File is empty.
else
{
if(strstr($_FILES["file"]["type"] , "image")==false)
$error[]="File needed to be an image.";
}
if(empty($error))
{
if(!empty($_FILES["file"]["tmp_name"]))
{
$name=$_FILES["file"]["name"];
$file=$_FILES["file"]["tmp_name"];
move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploaded_img/" . $_FILES["file"]["name"]);
$file=mysql_real_escape_string("uploaded_img/" .$_FILES["file"]["name"]);
}
$sql="INSERT INTO image_tbl (image) VALUES ('$file') ";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
}
else
print "Oopss!! errors:<br />" . implode("<br />" , $error);
/* table create code!
CREATE TABLE `images` (
`Filename` VARCHAR( 255 ) CHARACTER SET utf8 NOT NULL
,`imageid` int(11) NOT NULL auto_increment,
PRIMARY KEY (`imageid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
*/
}
} //if submit has pressed!
mysqli_close($con);
?> 
</body>
</html>