<?php

require_once 'ps_connect_db.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Payroll System | SegWorks Technologies Corporation</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/search.css"/>
<link rel="stylesheet" type="text/css" href="ps_includes/jquery_validator/css/validationEngine.jquery.css" />
<script type="text/javascript" src="ps_theme/js/jquery-1.9.1.min.js"></script>

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    <style type="text/css">
    input[type="text"].nightvalue, input[type="text"].holidayvalue, input[type="text"].otvalue{
    /*background: none;
	border: none;
	display: none;
	font-family: 'Century Gothic',sans-serif;
	font-size: 12px;
	height: 14px;
	position: relative;*/
	text-align: center;
	top: 5px;
	width: 36px;
	color: #000;
}
</style>



<script type="text/javascript">
$(document).ready(function(){

		// get value for night , holiday , ot
		var night_checkbox = $("input[name='night_checkbox']"),
	    night_textbox = $("input[name='night_textbox']");

	    var holiday_checkbox = $("input[name='holiday_checkbox']"),
	    holiday_textbox = $("input[name='holiday_textbox']");

	    var ot_checkbox = $("input[name='ot_checkbox']"),
	    ot_textbox = $("input[name='ot_textbox']");


	    // condition > click for night , holiday , ot
		night_checkbox.click(function() {
		    night_textbox.attr("disabled", !night_checkbox.is(":checked")).val('0');
		});

		holiday_checkbox.click(function() {
		    holiday_textbox.attr("disabled", !holiday_checkbox.is(":checked")).val('0');
		});

		ot_checkbox.click(function() {
		    ot_textbox.attr("disabled", !ot_checkbox.is(":checked")).val('0');
		});


		// condition for night , holiday , ot
		if ( $(night_checkbox).is(':checked') !=true ){
			$(night_textbox).val('0');
			$(night_textbox).attr("disabled", true);
		}

		if ( $(holiday_checkbox).is(':checked') !=true ){
			$(holiday_textbox).val('0');
			$(holiday_textbox).attr("disabled", true);
		}

		if ( $(ot_checkbox).is(':checked') !=true ){
			$(ot_textbox).val('0');
			$(ot_textbox).attr("disabled", true);
		}
	
		

}); //end document

</script>

</head>
<body>

<div id="content">
	<div class="page-holder">
		<h1>Search Employee</h1>
		<form action="<?=$_SERVER['PHP_SELF']?>" method="GET" class="search">
			<label class="search_label">To search: Enter Employee's name (i.e. Arn,Mos)</label>
			<p>
				<label>Employee's Name: </label>
				<input type="text" size="45" name="search_key" value="" class="search-here" required/>
			</p>
			<p>
				<label class="batch_name">Batch Name: </label>
				<select>
				  <option value="Batch 1">May 1-15</option>
				  <option value="Batch 2">May 16-31</option>
				  <option value="Batch 3">June 1-15</option>
				  <option value="Batch 4">June 16-30</option>
				</select>
			</p>
			<p>
				<input type="submit" name="search_btn" value="search" class="btn">
			</p>
		</form>

		<hr>
		<div class="employee">
				<label>Name of Employee: <span> Arnel M. Moso</span></label>
				<p class="batch">Batch Number: <span>TEST</span></p>	
		</div>

		<table border="0" class="date">
		<caption>Cut off Dates</caption>
		<tbody>
		<tr>
			<td>From:</td>
			<td class="value">May 17, 2013</td>
		</tr>
		<tr>
			<td>To:</td>
			<td class="value">May 31, 2013</td>
		</tr>
		</tbody>
		</table>
			<p style="text-align: center;"><span class="red">*</span> Double Click on the cell to edit the value! <span class="red">*</span></p>
		<form action="#" method="post" id="validateForm" class="formular">
			<table class="table-striped data" border="1" id="mytable" width="800">
				<thead>
					<tr>
						<td rowspan="2">Date</td>
						<td colspan="3">&nbsp;</td>
						<td colspan="4">AM</td>
						<td colspan="4">PM</td>					
						<td rowspan="2" style="word-wrap:break-word;width:20px;">Actual Hours</td>
						<td rowspan="2" style="word-wrap:break-word;width:20px;">Cred. Hours</td>
						<td colspan="3">&nbsp;</td>
						<td rowspan="2">Remarks</td>
					</tr>		
					<tr>
						<td>&nbsp;Night?&nbsp;</td>
						<td>&nbsp;Holiday?&nbsp;</td>
						<td>&nbsp;&nbsp;OT?&nbsp;&nbsp;</td>
						<td colspan="2">In</td>
						<td colspan="2" >Out</td>
						<td colspan="2">In</td>
						<td colspan="2">Out</td>
						<td>Night</td>
						<td>Holiday</td>
						<td>OT</td>
					</tr>
				</thead>
				<tbody>

					<tr>
						<td style=" font-weight: bold; ">03/3/13</td>
						<td style="width: 18px;"><input name="night_checkbox" class="night" type="checkbox"></td>
						<td style="width: 18px;"><input name="holiday_checkbox" class="holiday" type="checkbox"></td>
						<td style="width: 18px;"><input name="ot_checkbox" class="ot" type="checkbox"></td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="am-in-hr " class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;">
											
						</td>
						<td style="width: 30px;">
							<input type="text" maxlength="2" name="am-in-min" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;">
											

							</td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="am-out-hr" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="am-out-min" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="pm-in-hr" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="pm-in-min" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="pm-in-hr" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="pm-in-min" class="validate[custom[integer]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="actual_hrs" class="validate[custom[number]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width: 30px;"><input type="text" maxlength="2" name="cred_hrs" class="validate[custom[number]] text-input" style="margin:5px;width:36px;padding:2px;text-align:center;"></td>
						<td style="width:30px;">
							<input class="nightvalue validate[custom[number]] text-input" type="text" name="night_textbox"  maxlength="5" value="" style="margin:5px;width: 36px;padding:2px;text-align:center;font-size: 14px;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;" />
						</td>
						<td style="width:30px;">
							<input class="holidayvalue validate[custom[number]] text-input" type="text" value="" maxlength="5" name="holiday_textbox" style="margin:5px;width: 36px;padding:2px;text-align:center;font-size: 14px;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;"/>
						</td>
						<td style="width: 30px;">
							<input class="otvalue validate[custom[number]] text-input" type="text" value="" maxlength="5" name="ot_textbox" style="margin:5px;width: 36px;padding:2px;text-align:center;font-size: 14px;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;font-weight: bold;" />
						</td>
						<td><input type="text" maxlength="2" name="remarks" class="validate[custom[integer]] text-input" style="margin:5px;width:72px;padding:2px;text-align:center;"></td>
					</tr>
					
					<tr>
						<td colspan="18">&nbsp;</td>
					</tr>
					<tr class="total">
						<td>Total</td>
						<td colspan="11">&nbsp;</td>
						<td>121.5</td>
						<td>123</td>
						<td>0.0</td>
						<td>0.0</td>
						<td>0.0</td>
						<td>&nbsp;</td>
					</tr>
				</tbody>
			</table>
			<p class="button">
				<button class="btn" type="button">Save</button>
				<button class="btn" type="button">Print</button>
			</p>
		</form>
		<div class="clear"></div>
		<aside>
			<a href="#">Download as PDF!</a>
			<a href="#">Download as Microsoft Word!</a>
		</aside>
		<table class="table-striped summary">
			<tr>
				<td>Creditable Hours</td>
				<td>123.00</td>
			</tr>
			<tr>
				<td>Night Premium</td>
				<td>0.0</td>
			</tr>
			<tr>
				<td>Total Holidays</td>
				<td>0.0</td>
			</tr>
			<tr>
				<td>Total Overtime</td>
				<td>0.0</td>
			</tr>
			<tr>
				<td>Total Hours</td>
				<td>123.00</td>
			</tr>
		</table>
	</div>
	</div>


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

