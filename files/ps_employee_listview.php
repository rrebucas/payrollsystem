<?php
require_once ('ps_connect_db.php');

$employee_id = $_GET['employee_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/list.css"/>
<link rel="stylesheet" type="text/css" href="ps_includes/jquery_validator/css/validationEngine.jquery.css" />
<script type="text/javascript" src="ps_includes/jquery_validator/js/jquery-1.8.2.min.js"></script>
<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php

$result_employee = mysqli_query($con,"SELECT * FROM seg_employee_list WHERE id='$employee_id'");

?>
<div id="employee_listview" style=" text-align: center; ">

	<?php
		while($row_employee = mysqli_fetch_array($result_employee)) {
	?>
	<h1 style=" text-align: left; ">Employee Name: <span><?php echo $row_employee['name']; ?></span></h1>
		<form id="validateForm" class="formular" action="#" method="post">
			<table class="table-striped" width="200" border="1">
	<tbody>
	<tr>
		<th>Holiday Rate</th>
		<td>
			<input type="text" value="<?php echo $row_employee['holiday_rate']; ?>" class="validate[required,custom[number]] text-input" id="number" maxlength="5" name="hol-rate" />
		</td>
	</tr>
	<tr>
		<th>OT Rate</th>
		<td>
			<input type="text" value="<?php echo $row_employee['ot_rate']; ?>" class="validate[required,custom[number]] text-input" maxlength="5" name="ot-rate" />
		</td>
	</tr>
	<tr>
		<th>Night Premium</th>
		<td>
			<input type="text" value="<?php echo $row_employee['night_premium']; ?>" class="validate[required,custom[number]] text-input" maxlength="5" name="night-premium"/>
		</td>
	</tr>
	<tr>
		<th>Creditable Hours</th>
		<td>
			<input type="text" value="<?php echo $row_employee['creditable_hours']; ?>"  class="validate[required,custom[number]] text-input" maxlength="5" name="creditable-hours"/>
		</td>
	</tr>
	</tbody>
	</table>
		<div id="submit-reset-btn">
			<input type="submit" class="btn btn-info" name="submit" value="Save" />
			<input type="reset" class="btn" name="reset" value="Reset" />

		</div>
	</form>
	<?php
		} //end while
	if (isset($_POST['submit'])) {
		

		$holiday_rate = $_POST['hol-rate'];
		$OT_rate = $_POST['ot-rate'];
		$night_premium = $_POST['night-premium'];
		$creditable_hours = $_POST['creditable-hours'];



		mysqli_query($con,"UPDATE seg_employee_list SET holiday_rate='$holiday_rate', ot_rate='$OT_rate', night_premium='$night_premium', creditable_hours='$creditable_hours'  WHERE id='$employee_id'");
	?>
	<span class="text-success"><strong>Saved</strong></span>
	<div class="clear"></div>
	<script type="text/javascript">
		 jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			window.location.reload();

		});
	</script>
	<br />
	<?php

	}

	?>

</div>
<div class="clear">
</div>
<!--Page Generated-->
<?php $start_time = microtime(true); 
		$time_gen = number_format(microtime(true) - $start_time, 9);
	?>
<pre class="prettyprint" id="page=generated" style="width: 90%; ">
	 This page was generated in <span class="atv"><?php echo"$time_gen"; ?>
	</span> seconds.
</pre>


<script type="text/javascript" src="ps_includes/jquery_validator/js/jquery.validationEngine-en.js" /></script>
<script type="text/javascript" src="ps_includes/jquery_validator/js/jquery.validationEngine.js"></script>
<script type="text/javascript">
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#validateForm").validationEngine('attach');

		});
	</script>

</body>
</html>
<?php
mysqli_close($con);
?>