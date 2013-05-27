
<?php

require_once '../../ps_connect_db.php';

$val_filename = strtoupper(mysql_real_escape_string(trim($_POST["filename"])));
$val_filename_query = mysqli_query($con,"SELECT * FROM seg_employee_import WHERE batch_name='$val_filename' ");
$val_filename_find=mysqli_num_rows($val_filename_query);


echo "$val_filename_find";

/*if ($val_filename_find == 0) {
	?>
		<script>
		$("#submit_btn_import").prop("disabled", false);
		$("#submit_btn_import").attr("disabled", false);
		</script>
		<span class="text-success"><small><em>Available</em></small></span>
	<?php

}else {
	?>
		<script>
		$("#submit_btn_import").prop("disabled", true);
		$("#submit_btn_import").attr("disabled", 'disabled');
		</script>
		<span class="text-error"><small><em>Not Available</em></small></span>
	<?php
}*/



mysqli_close($con);
?>