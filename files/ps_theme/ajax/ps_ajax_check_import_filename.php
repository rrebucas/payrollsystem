
<?php

require_once '../../ps_connect_db.php';

$val_filename = mysql_real_escape_string(trim($_POST["filename"]));
$val_filename_query = mysqli_query($con,"SELECT * FROM seg_employee_import WHERE batch_name='$val_filename' ");
$val_filename_find=mysqli_num_rows($val_filename_query);

if ($val_filename_find == 0) {
	?>
		<script type="text/javascript">
		$("#submit_btn_import").attr("disabled", false);
		</script>
		<span class="text-success"><small><em>Available</em></small></span>
	<?php

}else {
	?>
		<script type="text/javascript">
		$("#submit_btn_import").attr("disabled", true);
		</script>
		<span class="text-error"><small><em>Not Avaiable</em></small></span>
	<?php
}



mysqli_close($con);
?>