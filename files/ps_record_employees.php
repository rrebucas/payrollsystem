<?php

require_once 'ps_connect_db.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Payroll System | SegWorks Technologies Corporation</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/record.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="ps_includes/jquery_validator/css/validationEngine.jquery.css" />
<link rel="stylesheet" type="text/css" href="ps_theme/css/floating_img.css"/>


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <style type="text/css">
    input[type="text"].nightvalue, input[type="text"].holidayvalue, input[type="text"].otvalue{
	text-align: center;
	top: 5px;
	width: 36px;
	color: #000;
	}
	body{
		padding-bottom: 80px;
	}
	body, #content{
		margin: 0;
	}
	.page-holder{
		width: 90%;
	}
	.ui-tooltip, .arrow:after {
    background: black;
    border: 2px solid white;
  }
  .ui-tooltip {
    padding: 10px 20px;
    color: white;
    border-radius: 20px;
    font: bold 14px "Helvetica Neue", Sans-Serif;
    text-transform: uppercase;
    box-shadow: 0 0 7px black;
  }
  .arrow {
    width: 70px;
    height: 16px;
    overflow: hidden;
    position: absolute;
    left: 50%;
    margin-left: -35px;
    bottom: -16px;
  }
  .arrow.top {
    top: -16px;
    bottom: auto;
  }
  .arrow.left {
    left: 20%;
  }
  .arrow:after {
    content: "";
    position: absolute;
    left: 20px;
    top: -20px;
    width: 25px;
    height: 25px;
    box-shadow: 6px 5px 9px -9px black;
    -webkit-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    tranform: rotate(45deg);
  }
  .arrow.top:after {
    bottom: -20px;
    top: auto;
  }
</style>





</head>
<body>

<div id="content">
			<div id="top-title" class="pull-left">
				<div id="top-wrapper">
					<h1>Employees <span>Record</span></h1>
				</div>
			</div>

			<div id="top-btn" class="pull-right">
					<a id="back-btn" href="main.php" data-toggle="tooltip" data-placement="bottom" class="tip-title" title="Go to Main Page">back</a>
	
					<a id="refresh-btn" data-toggle="tooltip" data-placement="bottom" class="tip-title" title="Refresh">Refresh</a>
					<a id="close-btn" data-toggle="tooltip" data-placement="bottom" class="tip-title" title="Close">Close</a>
				
			</div>
	<div class="page-holder">
		<?php
		// fetch employee list and filename

		$query_employee_list = mysqli_query($con, "SELECT name, id FROM seg_employee_list");
		$query_batchname = mysqli_query($con, "SELECT  DISTINCT batch_name FROM seg_employee_import");

		?>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="search formular" id="search_employee_form">
			<label class="search_label">Lorem Ipsum dolor</label>
			<p>
				<label> Select Employee's Name: </label>
				<select name="employee_name" class="validate[required]">
				  <option value="">-Please Select Employee-</option>
				  <?php
				  while($row_employee_list = mysqli_fetch_array($query_employee_list))
  					{

  						$var_employee_name = $row_employee_list['name'];
  						$var_employee_name_id = $row_employee_list['id'];
  					?>
  					<option value="<?php echo "$var_employee_name_id";?>"><?php echo "$var_employee_name"; ?></option>
  					<?php
  					}
				  ?>
				</select>
			</p>
			<p>
				<label class="batch_name"> Select Batch Name: </label>
				<select name="filename" class="validate[required]">
				  <option value="">-Please Select Batch Name-</option>
				   <?php
				  while($row_batchname = mysqli_fetch_array($query_batchname))
  					{

  						$var_batchname = $row_batchname['batch_name'];
  	
  					?>
  					<option value="<?php echo "$var_batchname";?>"><?php echo "$var_batchname"; ?></option>
  					<?php
  					}
				  ?>
				</select>
			</p>
			<p>
				<input id="search-btn" type="submit" name="submit" value="Search" class="btn btn-info">
			</p>
		</form>

		<hr>
		<?php 
		//click submit
		if (isset($_POST['submit'])) {


			$var_employee_name_id = $_POST['employee_name'];
			$var_batchname = $_POST['filename'];

			$query_employee_name = mysqli_query($con, "SELECT name FROM seg_employee_list WHERE id = $var_employee_name_id");
			$query_employee_date = mysqli_query($con, "SELECT date_time FROM seg_employee_import WHERE id = $var_employee_name_id ");
			$employee_date_arr = array(); //store date
			while( $row_date = mysqli_fetch_array($query_employee_date)){

				$timestamp = strtotime($row_date['date_time']);
				$employee_date_arr[] = date('F d, Y', $timestamp);
			}


			while($row_employee_name = mysqli_fetch_array($query_employee_name))
  					{
  					$var_employee_name = $row_employee_name['name'];
  					}
  			$query_check_employeename_batchname = mysqli_query($con, "SELECT id FROM seg_employee_import WHERE id = $var_employee_name_id ");
  			$num_check_employeename_batchname = mysqli_num_rows($query_check_employeename_batchname);

  			//check if the employee name exist in seg_employee_import
  			if ($num_check_employeename_batchname > 0) {	
  				?>
  				<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="validateForm" class="formular">
  					<div class="employee">
						<label>Name of Employee: <span><?php echo "$var_employee_name";?></span></label>
						<input type="hidden" name="employee_name" value="<?php echo "$var_employee_name";?>" />
						<p class="batch">Batch Number: <span><?php echo "$var_batchname"; ?></span></p>	
					</div>	
					<?php
					$employee_date_array_unique = array_unique($employee_date_arr);

					?>
							<table border="0" class="date">
							<caption>Cut off Dates</caption>
							<tbody>
							<tr>
								<td>From:</td>
								<td class="from_date_val value">
								<?php
									echo $employee_date_array_unique[0];
								 ?>
								</td>
							</tr>
							<tr>
								<td>To:</td>
								<td class="to_date_val value">
								<?php
									echo end($employee_date_array_unique); 
								?>
								</td>
							</tr>
							</tbody>
							</table>
							<table class="table table-striped data" border="1" id="mytable" width="800">
								<thead>
									<tr>
										<td rowspan="2" style="text-align:center;vertical-align:middle;">Date</td>
										<td colspan="3">&nbsp;</td>
										<td colspan="4" style="text-align:center;">AM</td>
										<td colspan="4" style="text-align:center;">PM</td>					
										<td rowspan="2" style="word-wrap:break-word;width:20px;text-align:center;">Actual Hours</td>
										<td rowspan="2" style="word-wrap:break-word;width:20px;text-align:center;">Cred. Hours</td>
										<td colspan="3">&nbsp;</td>
										<td rowspan="2" style="text-align:center;vertical-align:middle;">Remarks</td>
									</tr>		
									<tr>
										<td style="text-align:center;">Night?</td>
										<td style="text-align:center;">Holiday?</td>
										<td style="text-align:center;">OT?</td>
										<td colspan="2" style="text-align:center;">In</td>
										<td colspan="2" style="text-align:center;">Out</td>
										<td colspan="2" style="text-align:center;">In</td>
										<td colspan="2" style="text-align:center;">Out</td>
										<td style="text-align:center;">Night</td>
										<td style="text-align:center;">Holiday</td>
										<td style="text-align:center;">OT</td>
									</tr>
								</thead>
								<tbody>
									<?php

									$query_employee_import = mysqli_query($con, "SELECT id, 
  										SUBSTRING_INDEX(MIN(CONCAT(date_time,`status`)),'C/In',1) AS date_time_in,
										SUBSTRING_INDEX(MAX(CONCAT(date_time,`status`)),'C/Out',1) AS date_time_out,
										TIMEDIFF(SUBSTRING_INDEX(MAX(CONCAT(date_time,`status`)),'C/Out',1),SUBSTRING_INDEX(MIN(CONCAT

										(date_time,`status`)),'C/In',1)) AS date_time_total
										FROM `seg_employee_import` import_tbl WHERE id=$var_employee_name_id
										GROUP BY import_tbl.id, DATE(date_time)");

  									while ($row_employee_import_list = mysqli_fetch_array($query_employee_import) ) {

  										$var_timeDate = $row_employee_import_list['date_time_in'];
  										
  									?>
									<tr>
										<td>
										<?php 
										echo $var_timeDate;
										?>
										</td>
										<td style="width: 18px;"><input name="night_checkbox" class="night" type="checkbox"> </td>
										<td style="width: 18px;"><input name="holiday_checkbox" class="holiday" type="checkbox"> </td>
										<td style="width: 18px;"><input name="ot_checkbox" class="ot" type="checkbox"> </td>
										<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-in-hr[] " class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
										<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-in-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
										<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-out-hr[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
										<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-out-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>

										<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-in-hr[] " class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
										<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-in-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
										<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-out-hr[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
										<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-out-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
									
										<td style="width: 30px;"><input type="text" maxlength="2" name="actual_hrs[]" class="validate[custom[number]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"  ></td>
										<td style="width: 30px;"><input type="text" maxlength="2" name="cred_hrs[]" class="validate[custom[number]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
										<td style="width:30px;"><input class="nightvalue validate[custom[number]] text-input" type="text" name="night_textbox[]"  maxlength="5" value="" style="margin:5px;width: 36px;padding:2px;text-align:center;font-size: 14px;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;"  /></td>
										<td style="width:30px;"><input class="holidayvalue validate[custom[number]] text-input" type="text" value="" maxlength="5" name="holiday_textbox[]" style="margin:5px;width: 36px;padding:2px;text-align:center;font-size: 14px;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;"/></td>
										<td style="width: 30px;"><input class="otvalue validate[custom[number]] text-input" type="text" value="" maxlength="5" name="ot_textbox[]" style="margin:5px;width: 36px;padding:2px;text-align:center;font-size: 14px;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;" /></td>
										<td><input type="text" maxlength="2" name="remarks[]" class="validate[custom[integer]] text-input" style="margin:5px;width:72px;padding:2px;text-align:center;"  ></td>

									</tr>
									<?php } // end while ?>
								</tbody>
							</table>
  				</form>

  				<?php

  			}// end else employee exit in filename
  			else {
		 	?>

		 	<p class="text-error" style=" text-align: center; font-size: 14px;"> <strong><em>'<?php echo "$var_employee_name";?>'</em></strong> does not exist in <strong><?php echo "$var_batchname"; ?></strong></p>

		 	<?php
			}// end else employee exit in filename

		} //end if

	//end employee record
		?>
		<?php


		if (isset($_POST['submit_btn_export'])) {
			
			echo "<h1 class='text-success'>Success.. Ready for export</h1>";

			
			$employee_name = $_POST['employee_name'];

			//AM
			$am_in_hr_arr = $_POST['am-in-hr']; //array  am in  hr time
			$am_in_min_arr = $_POST['am-in-min']; //array  am in min time

			$am_out_hr_arr = $_POST['am-out-hr']; //array  am out hr  time
			$am_out_min_arr = $_POST['am-out-min']; //array am out min time

			//PM
			$pm_in_hr_arr = $_POST['pm-in-hr']; //array  pm in  hr time
			$pm_in_min_arr = $_POST['pm-in-min']; //array  pm in min time

			$pm_out_hr_arr = $_POST['pm-out-hr']; //array  pm out hr  time
			$pm_out_min_arr = $_POST['pm-out-min']; //array pm out min time

			/*$am_in_hr_arr = array('one','two','three');
			foreach ($am_in_hr_arr as $key => $value) {
			    echo "Key: $key; Value: $value<br />\n";
			}*/
			?>
			<br>
			

			<form action="ps_export_as_excel.php" method="POST">
				<input type="hidden" value="<?php echo $employee_name; ?>" name="employee_name">
				<button class="btn btn-success" onclick="export_excel();" name="submit_btn_export_excel">Export As Excel</button>
			</form>
			<form action="tcpdf/examples/example_048.php" method="POST">
				<input type="hidden" value="<?php echo $employee_name; ?>" name="employee_name">
				<button class="btn btn-danger" name="submit_btn_export_pdf">Export As PDF</button>
			</form>


		<?php
		}

?>
	</div>
	</div>

<div id="divBottomRight">
	<a><img src="ps_theme/images/seglogo.png" alt="" title="Segworks Technologies Corporation"/></a>
</div>

<div id="dialog-confirm-remove" title="Delete this item" style="display:none">
  <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>These items will be temporary deleted.</p>
</div>

<script type="text/javascript" src="ps_theme/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="ps_theme/js/jquery-ui.js"></script>

<script type="text/javascript" src="ps_includes/jquery_validator/js/jquery.validationEngine-en.js" /></script>
<script type="text/javascript" src="ps_includes/jquery_validator/js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="ps_theme/js/floating_image.js"></script>
<script type="text/javascript" src="ps_theme/js/float_image.js"></script>
<script type="text/javascript" src="ps_theme/js/ps_calc_js.js"></script>


<script type="text/javascript">
jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#validateForm").validationEngine('attach');
			jQuery("#search_employee_form").validationEngine('attach');

		});
	   jQuery('#refresh-btn').click(function(){
	   		location.reload();
	    });
	   jQuery('#close-btn').click(function(){
	   		window.close();
	    });
	   
 </script>
</script>
</body>
</html>
<?php

mysqli_close($con);
?>

