<?php

require_once 'ps_connect_db.php';

//include the following 2 files
require_once 'ps_includes/phpexcel/Classes/PHPExcel.php';
require_once 'ps_includes/phpexcel/Classes/PHPExcel/IOFactory.php';


?>

<!DOCTYPE html>
<html>
<head lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>HTML Frames Example - Content</title>
<!--ps css-->

<link rel="stylesheet" type="text/css" href="ps_theme/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/style.css"/>
<link href="ps_includes/bootstrap/css/prettify.css" rel="stylesheet" media="screen">
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<!--ps js-->
 <script src="ps_theme/js/jquery-1.9.1.min.js"></script>
 <script src="ps_theme/js/jquery-ui.js"></script>
 <script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="ps_theme/js/modernizr.custom.58301.js"></script>


<style type="text/css">
#body-wrapper {
	font-family:verdana,arial,sans-serif;
	font-size:10pt;
	margin:30px;
	background-color:#fff;
	
	}
#loading {

position: fixed;
width: 100%;
height: 100%;
padding-top: 15%;
background: #fff;
z-index: 100;
overflow: hidden;
text-align: center;
}
.input-small{
	padding: 3px;
}
</style>
</head>
<body>

<div id="loading"><img src="ps_theme/images/ajax-loader_page.gif" /></div>
<div id="body-wrapper">

<h2>Import</h2>

<?php   

if (!isset($_FILES['file_import'])) {

?>
<p> <span class="label label-info">Howdy!</span> Upload your <strong>Biometric Excel</strong> file and we’ll import the <abbr title="Employees Name">employees name</abbr>, <abbr title="Employees ID">employees id</abbr>, <abbr title="Employees Date and Time">employees date-time</abbr>  and <abbr title="Employees Status">employees status</abbr>  into this site.</p>
<p>Choose a <strong>Microsoft Excel</strong>  ( <code>.xlsx</code> or <code>.xls</code> )file to upload, then click import.</p>


	<form name="import-form" enctype="multipart/form-data" id="import-upload-form" method="post" class="wp-upload-form" action="#" onsubmit="return gotoCheck();" >
		

		<p>
		<label for="upload">Choose a file from your computer:</label> (Maximum size: 2 MB)
		<input type="file" id="upload" name="file_import" size="25">
		</p>
			
		<p style="float:left;" >	
		File Name  <em style="color:#e82c00;font-weight: bold;">*</em> <em class="tip-title" title="Example format (May1-15.13) or (May20-April-14.13)">  <i class="icon-info-sign"></i></em><br>
			<input type="text" name="file_name" id="textbox_filename" autocomplete="off"/>
			<div id="check_filename_text" style=" padding-top: 17px; width: 16px; float: left; margin-left: 5px; "></div>
		</p>
		<p class="submit" style="clear:both;">
			<input type="submit" name="submit" id="submit_btn_import" class="btn btn-small btn-primary" value="Upload file and Import" disabled>
		</p>
	</form>
<?php
}

else {

	$errors = array();
	$allowed_ext = array('xls','xlsx');

	$file_name = $_FILES['file_import']['name'];
	$file_ext_explode = explode('.', $file_name);
	$file_ext= strtolower(end($file_ext_explode));
	$file_size = $_FILES['file_import']['size'];
	$file_tmp = $_FILES['file_import']['tmp_name'];

	if (in_array($file_ext, $allowed_ext)=== false) {
	
		$errors[]= 'Extension not allowed..';	

	}

	if ($file_size > 2097152 )  {

		$errors[] = 'File size must be under 2MB..';
	
	}

	

	if (empty($errors)) {
		$sec = gettimeofday();
		$import_loc = 'ps_files/import/'.$sec['sec'].'_'.$file_name;
		move_uploaded_file($file_tmp, $import_loc)
		?>
		<h4 class="text-success"> File Name: <?php echo $_POST['file_name']; ;?> is successfully added..</h4>
		<a href="javascript:import_preview('<?php echo "$import_loc"; ?>') " class="btn btn-mini btn-success">Preview</a>
		<?php


		$path = $import_loc;

		$filename = $_POST['file_name'];

		$objPHPExcel = PHPExcel_IOFactory::load($path);
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;
}
		for ($row = 2; $row <= $highestRow; ++ $row) {

			$val=array();
			for ($col = 0; $col < $highestColumnIndex; ++ $col) {
			   $cell = $worksheet->getCellByColumnAndRow($col, $row);
			   $val[] = $cell->getValue();
			 }

			 $sql="INSERT INTO seg_employee_import(batch_name, id, date_time, status) VALUES('$filename','" . $val[1] . "','" . $val[2]. "','" . $val[3]. "')";

			 $result = mysqli_query($con, $sql);

			 $sql_employee_list="INSERT INTO seg_employee_list(id, name) VALUES('".$val[1]."','" . $val[0] . "')";

			 $result_employee_list = mysqli_query($con, $sql_employee_list);

		} //end for


	} else {
		?>
		<h4 class="text-error">Oops! There has been an error.</h4>
		<?php
		foreach ($errors as $error ) {
			?>
			
			<p class="text-error"> <em><?php echo "$error"; ?></em> </p>
		<?php
		} 

		?>
		<a href="ps_xls_import.php" class="btn btn-mini btn-danger">[Back]</a>

		<?php
	}


	
} //end main else




?>


<!--page generate-->
<?php 
$start_time = microtime(true); 
$time_gen = number_format(microtime(true) - $start_time, 9);
?>
<pre class="prettyprint" id="page=generated" style=" position: absolute; bottom: 0; width: 90%; ">
This page was generated in <span class="atv"><?php echo"$time_gen"; ?></span> seconds.
</pre>


</div>
<script type="text/javascript">
<!-- 

//
$(document).ready(function(){

    $(window).load(function() {
		$("#loading").fadeOut('fast', function () {
			$("#body-wrapper").fadeIn(3000);
  		});
    });
    //
   $( ".tip-title" ).tooltip({
      show: {
        effect: "slideDown",
        delay: 250
      }
    });
    //
    $('#textbox_filename').keyup(function(){
   		//alert('Hi');
   		$("#subm_btn_import").attr("disabled", true);
   		$("#check_filename_text").html('<img src="ps_theme/images/ajax-loader_s.gif" />');
   		var val_filename = $("#textbox_filename").val();
   		var data_val_filename = "filename=" + val_filename;
   		if ( val_filename == null || val_filename == ""){
        	$("#check_filename_text").html('');
        	

      	}
      	else{
      		$.ajax({
		        type:"POST",
		        url:"ps_theme/ajax/ps_ajax_check_import_filename.php",
		        data:data_val_filename,
		        success:function(data){
		            $("#check_filename_text").html(data);
		        }
		        });
      	}
   		
   	});
});

//
function import_preview(x)
{
	
	urlholder="ps_import_preview.php?preview_loc="+x;
	helpwin=window.open(urlholder,"helpwin","width=790,height=540,menubar=no,resizable=yes,scrollbars=yes");
	window.helpwin.moveTo(0,0);
}
// 

function gotoCheck()
{


var y=document.forms["import-form"]["file_import"].value;
var x=document.forms["import-form"]["textbox_filename"].value;
if (x==null || x==""){
  	alert(" Oops! Error: *Enter Unique Filename.");
  	return false;
 }
if(y==null || y==""){
	alert(" Oops! Error: *Please Choose file.");
  	return false;

}

} //end funtion
//-->
</script> 
</body>
</html>

<?php
mysqli_close($con);
?>