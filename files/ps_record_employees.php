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
			while($row_employee_name = mysqli_fetch_array($query_employee_name))
  					{
  					$var_employee_name = $row_employee_name['name'];
  					}

  			$query_check_employeename_batchname = mysqli_query($con, "SELECT id FROM seg_employee_import WHERE id = $var_employee_name_id ");

  			$num_check_employeename_batchname = mysqli_num_rows($query_check_employeename_batchname);

  			//check if the employee name exist in seg_employee_import
  			if ($num_check_employeename_batchname > 0) {	

	  			$query_employee_import = mysqli_query($con, "SELECT * FROM seg_employee_import WHERE id = $var_employee_name_id ");

	  			$row_time_array = array();
	  			$row_date_time_array = array();
	  			$row_date_time_employee_status_array = array();
	  			$row_date_array = array();

	  			while ($row_employee_import_list = mysqli_fetch_array($query_employee_import) ) {

	  				
	  				$row_date_time = $row_employee_import_list['date_time'];
	  				$row_date_time_employee_status_array[]= $row_date_time. " ".$row_employee_import_list['status']; 
	  				$row_date_time_array[] = $row_date_time;	//array date_time
	  				$row_date_time_explode = explode(" ", $row_date_time);	//exlplode date time
	  				$row_date_array[] = $row_date_time_explode[0];	//array date
	  				$row_time_array[] = $row_date_time_explode[1]." ".$row_date_time_explode[2]; //array time

  					}

  				$row_date_array_unique = array_unique($row_date_array);
  				$row_date_array_seq= array_values($row_date_array_unique);
  				$row_date_array_unique_count = count($row_date_array_unique);
  				$row_date_time_array_count = count($row_date_time_array);
  				$row_date_time_employee_status_array_count = count($row_date_time_employee_status_array);

		?>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" id="validateForm" class="formular">
		<div class="employee">
				<label>Name of Employee: <span><?php echo "$var_employee_name";?></span></label>
				<input type="hidden" name="employee_name" value="<?php echo "$var_employee_name";?>" />
				<p class="batch">Batch Number: <span><?php echo "$var_batchname"; ?></span></p>	
		</div>

		<table border="0" class="date">
		<caption>Cut off Dates</caption>
		<tbody>
		<tr>
			<td>From:</td>
			<td class="from_date_val value">
			<?php
				//$from_date_time = explode(" ", $row_date_time[0]);
				//echo $from_date_time[0]; 
				echo $row_date_array[0];
			 ?>
			</td>
		</tr>
		<tr>
			<td>To:</td>
			<td class="to_date_val value">
			<?php
				//$to_date_time = explode(" ", end($row_date_time));
			 	//echo $to_date_time[0];
			 	echo end($row_date_array); 
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
				<input value="<?php echo "$row_date_time_employee_status_array_count"; ?>" type="hidden"  name="total_increment" id="total_increment" >
					<?php
						$var_date_store_array=array();


					for ($row_tr=0; $row_tr < $row_date_time_employee_status_array_count ; $row_tr++) {

					

					if (in_array($row_date_array[$row_tr], $var_date_store_array)) {
						
						$class_tr = "warning";
						$i++;
					}
					else{
						$class_tr = '';
						$i= '0';
					}
					$var_date_store_array[]=  $row_date_array[$row_tr];
					?>
					<tr class="<?php if ( "$i" > 1 ){ echo 'error';} else {echo "$class_tr"; } ?>">
						<td>
						
						<?php
						if ($class_tr == 'warning') {
							?>
							<a  title="Remove" class="remove-btn" style="cursor:pointer;float: left;position: absolute;margin-left: 1px;margin-top:7px;"> <i class="icon-remove"></i> </a>
							<?php
							
						}else{}
						?>
						<input type="text" name="date[]" value="<?php echo $row_date_array[$row_tr] ?>" style="margin-top:5px;margin-left:20px;margin-bottom:5px;margin-right:5px;width:72px;padding:2px;text-align:center;" readonly  />
						</td>
						<td style="width: 18px;"><input name="night_checkbox-<?php echo "$row_tr"; ?>" class="night" type="checkbox" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> > </td>
						<td style="width: 18px;"><input name="holiday_checkbox-<?php echo "$row_tr"; ?>" class="holiday" type="checkbox" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<td style="width: 18px;"><input name="ot_checkbox-<?php echo "$row_tr"; ?>" class="ot" type="checkbox" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>

						<?php
						//$con_AM = strpos($row_date_time_employee_status_array[$row_tr],"AM");

						if ( (strpos($row_date_time_employee_status_array[$row_tr],"AM")) !=false )  {
						?>

							<?php
							if ( (strpos($row_date_time_employee_status_array[$row_tr],"C/In")) !=false )  {

								$var_time_date_explode = explode(" ", $row_date_time_employee_status_array[$row_tr] );
								$var_time = $var_time_date_explode[1]; // time
								$var_time_explode= explode(":", $var_time); //explode time
								$var_hour = $var_time_explode[0];
								$var_min =	$var_time_explode[1];
								
						
							?>
							<td style="width: 30px;"><input value="<?php echo "$var_hour"; ?>" type="text" maxlength="2" name="am-in-hr[] " class="validate[custom[integer]] text-input <?php if ( "$class_tr" == 'warning'){ echo 'val-warning';}else{} ?> " style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
							<td style="width: 30px;"><input value="<?php echo "$var_min"; ?>" type="text" maxlength="2" name="am-in-min[]" class="validate[custom[integer]] text-input <?php if ( "$class_tr" == 'warning'){ echo 'val-warning';}else{} ?> " style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
							<?php
								}// end if  AM IN
								else{
	
									?>
									<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-in-hr[] " class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
									<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-in-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>


							<?php
								}// end else AM IN
							?>
						<?php
						if ( (strpos($row_date_time_employee_status_array[$row_tr],"C/Out")) !=false )  {

								$var_time_date_explode = explode(" ", $row_date_time_employee_status_array[$row_tr] );
								$var_time = $var_time_date_explode[1]; // time
								$var_time_explode= explode(":", $var_time); //explode time
								$var_hour = $var_time_explode[0];
								$var_min =	$var_time_explode[1];

						?>
							<td style="width: 30px;"><input value="<?php echo "$var_hour"; ?>" type="text" maxlength="2" name="am-out-hr[]" class="validate[custom[integer]] text-input <?php if ( "$class_tr" == 'warning'){ echo 'val-warning';}else{} ?> " style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
							<td style="width: 30px;"><input value="<?php echo "$var_min"; ?>" type="text" maxlength="2" name="am-out-min[]" class="validate[custom[integer]] text-input <?php if ( "$class_tr" == 'warning'){ echo 'val-warning';}else{} ?> " style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<?php
						} //end if  AM OUT
						else{

								
						?>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-out-hr[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
							<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-out-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<?php	
						} //end else AM OUT
						?>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-in-hr[] " class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-in-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-out-hr[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?>  ></td>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-out-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<?php
							}// end if AM
						?>
						<?php
						
						if ( (strpos($row_date_time_employee_status_array[$row_tr],"PM")) !=false )  {



						?>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-in-hr[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-in-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-out-hr[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="am-out-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<?php
							if ( (strpos($row_date_time_employee_status_array[$row_tr],"C/In")) !=false )  {

								$var_time_date_explode = explode(" ", $row_date_time_employee_status_array[$row_tr] );
								$var_time = $var_time_date_explode[1]; // time
								$var_time_explode= explode(":", $var_time); //explode time
								$var_hour = $var_time_explode[0];
								$var_min =	$var_time_explode[1];
								
						
							?>
						<td style="width: 30px;"><input  value="<?php echo "$var_hour"; ?>" type="text" maxlength="2" name="pm-in-hr[]" class="validate[custom[integer]] text-input <?php if ( "$class_tr" == 'warning'){ echo 'val-warning';}else{} ?>" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width: 30px;"><input value="<?php echo "$var_min"; ?>" type="text" maxlength="2" name="pm-in-min[]" class="validate[custom[integer]] text-input <?php if ( "$class_tr" == 'warning'){ echo 'val-warning';}else{} ?>" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<?php
								}// end if  PM IN
								else{

									
						?>
									<td style="width: 30px;"><input  value="" type="text" maxlength="2" name="pm-in-hr[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
									<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-in-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<?php
									} //end else PM IN

						?>
						<?php
						if ( (strpos($row_date_time_employee_status_array[$row_tr],"C/Out")) !=false )  {

								$var_time_date_explode = explode(" ", $row_date_time_employee_status_array[$row_tr] );
								$var_time = $var_time_date_explode[1]; // time
								$var_time_explode= explode(":", $var_time); //explode time
								$var_hour = $var_time_explode[0];
								$var_min =	$var_time_explode[1];

						?>

						<td style="width: 30px;"><input value="<?php echo "$var_hour"; ?>" type="text" maxlength="2" name="pm-out-hr[]" class="validate[custom[integer]] text-input <?php if ( "$class_tr" == 'warning'){ echo 'val-warning';}else{} ?> " style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width: 30px;"><input value="<?php echo "$var_min"; ?>" type="text" maxlength="2" name="pm-out-min[]" class="validate[custom[integer]] text-input <?php if ( "$class_tr" == 'warning'){ echo 'val-warning';}else{} ?> " style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<?php
					} // end if PM OUT
					else {
						
						?>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-out-hr[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?>></td>
						<td style="width: 30px;"><input value="" type="text" maxlength="2" name="pm-out-min[]" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?>></td>

						<?php
						} //end else PM OUT
						?>





						<?php


						}	//end if PM
						?>
						<td style="width: 30px;"><input type="text" maxlength="2" name="actual_hrs[]" class="validate[custom[number]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="cred_hrs[]" class="validate[custom[number]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
						<td style="width:30px;"><input class="nightvalue validate[custom[number]] text-input" type="text" name="night_textbox[]"  maxlength="5" value="" style="margin:5px;width: 36px;padding:2px;text-align:center;font-size: 14px;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> /></td>
						<td style="width:30px;"><input class="holidayvalue validate[custom[number]] text-input" type="text" value="" maxlength="5" name="holiday_textbox[]" style="margin:5px;width: 36px;padding:2px;text-align:center;font-size: 14px;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> /></td>
						<td style="width: 30px;"><input class="otvalue validate[custom[number]] text-input" type="text" value="" maxlength="5" name="ot_textbox[]" style="margin:5px;width: 36px;padding:2px;text-align:center;font-size: 14px;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> /></td>
						<td><input type="text" maxlength="2" name="remarks[]" class="validate[custom[integer]] text-input" style="margin:5px;width:72px;padding:2px;text-align:center;" <?php if ($class_tr == 'warning') {echo "disabled";}else{} ?> ></td>
					</tr>
					<?php
						} //end for
					?>
					<tr>
						<td colspan="18">&nbsp;</td>
					</tr>
					<tr class="total">
						<td>Total</td>
						<td colspan="11">&nbsp;</td>
						<td style="width: 30px;"><input type="text" name="subTotal_actualHours"  style="margin:5px;width:36px;padding:2px;text-align:center;" readonly></td>
						<td style="width: 30px;"><input type="text" name="subTotal_credHours"  style="margin:5px;width:36px;padding:2px;text-align:center;" readonly></td>
						<td style="width: 30px;"><input type="text" name="subTotal_nightHours"  style="margin:5px;width:36px;padding:2px;text-align:center;" readonly></td>
						<td style="width: 30px;"><input type="text" name="subTotal_holidayHours"  style="margin:5px;width:36px;padding:2px;text-align:center;" readonly></td>
						<td style="width: 30px;"><input type="text" name="total_otHours"  style="margin:5px;width:36px;padding:2px;text-align:center;" readonly></td>
						<td>&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<div class="row">
				<div class="span6">
					<table class="table" style=" width: 433px;font-size:11px; ">
					  <thead>
				   		 <tr>
					      <th style=" width: 35%; ">Legend</th>
					      <th>Description</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td style="background-color:#fcf8e3;"></td>
					      <td>Indicates a warning that might need attention</td>
					    </tr>
					    <!--<tr>
					      <td style="background-color:#f2dede;"></td>
					      <td>Indicates a dangerous  negative action.</td>
					    </tr>-->
					  </tbody>
					</table>
				</div>
				<div class="span5">
					<p class="button">
						<button class="btn btn-info" type="submit" name="submit_btn_export">Save</button>
					</p>
				</div>
					<div class="pull-right">
					<table class="table table-striped summary">
						<tr>
							<td>Creditable Hours</td>
							<td><input type="text" name="total_credHours" style="margin:5px;width:36px;padding:2px;text-align:center;" readonly/></td>
						</tr>
						<tr>
							<td>Night Premium</td>
							<td><input type="text" name="total_nightPremium" style="margin:5px;width:36px;padding:2px;text-align:center;" readonly/></td>
						</tr>
						<tr>
							<td>Total Holidays</td>
							<td><input type="text" name="total_holidays" style="margin:5px;width:36px;padding:2px;text-align:center;" readonly/></td>
						</tr>
						<tr>
							<td>Total Overtime</td>
							<td><input type="text" name="total_overTime" style="margin:5px;width:36px;padding:2px;text-align:center;" readonly/></td>
						</tr>
						<tr>
							<td>Total Hours</td>
							<td><input type="text" name="total_hours" style="margin:5px;width:36px;padding:2px;text-align:center;" readonly/></td>
						</tr>
				</table>
				</div>
			</div>
			<?php

			/*print_r($var_date_store_array);*/

			?>
			
		</form>
		<?php

		
		?>
		<div class="clear"></div>
	
		
		<?php

		 } else {
		 	?>

		 	<p class="text-error" style=" text-align: center; font-size: 14px;"> <strong><em>'<?php echo "$var_employee_name";?>'</em></strong> does not exist in <strong><?php echo "$var_batchname"; ?></strong></p>

		 	<?php
		}// end else

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

