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
  <link rel="stylesheet" type="text/css" href="ps_theme/css/floating_img.css"/>
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
#top-btn{
  float: right;
}
#top-btn{
  position: fixed;
  top: 15px;
  z-index: 2;
  right: 20px;
}
#top-btn a{
  color: #fff;
  text-decoration: none;
  cursor: pointer;
}
#top-btn a#refresh-btn{
  background: url(ps_theme/images/refresh-icon.png) no-repeat scroll 0 0 transparent;
  display: inline-block;
  width: 30px;
  height: 35px;
  text-indent: -9999px;
  margin-right: 10px;
}
#top-btn a#close-btn{
  background: url(ps_theme/images/close-icon.png) no-repeat scroll 0 0 transparent;
  display: inline-block;
  width: 30px;
  height: 35px;
  text-indent: -9999px;
  margin-right: 25px;
}
header{
  background-color: #454647;
  box-shadow: 1px 1px 5px #777;
  position: fixed;
  top: 0;
  height: 63px;
  width: 100%;
  z-index: 2;
}
header h1{
  text-shadow: -2px -3px 1px #000;
  color: #fff;
  font-size: 23px;
  float: left;
}
#export-wrapper{
  margin-left: 35px;
}
</style>
</head>
<body>

<div id="loading"><img src="ps_theme/images/ajax-loader_page.gif" /></div>
<header>
  <div id="export-wrapper">
    <h1>Export</h1>
    <div id="top-btn">
      
      <a id="refresh-btn" data-toggle="tooltip" data-placement="bottom" class="tip-title" title="Refresh">Refresh</a>
      <a id="close-btn" data-toggle="tooltip" data-placement="bottom" class="tip-title" title="Close">Close</a>
    </div>
  </div>
</header>
<div id="body-wrapper">
<!--page generate-->
<?php 
$start_time = microtime(true); 
$time_gen = number_format(microtime(true) - $start_time, 9);
?>
<pre class="prettyprint" id="page=generated" style=" position: absolute; bottom: 0; width: 90%; ">
This page was generated in <span class="atv"><?php echo"$time_gen"; ?></span> seconds.
</pre>


</div>
</div>

  <div id="divBottomRight">
  <a><img src="ps_theme/images/seglogo.png" alt="" title="Segworks Technologies Corporation"/></a>
</div>
<script type="text/javascript" src="ps_theme/js/floating_image.js"></script>
<script type="text/javascript" src="ps_theme/js/float_image.js"></script>
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
    $('#textbox_filename').change(function(){
   		//alert('Hi');
   		$("#submit_btn_import").attr("disabled", 'disabled');
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
		            //$("#check_filename_text").html(data);
		            if (data == 0) {
		            	$("#submit_btn_import").attr("disabled", false);
		            	$('#check_filename_text').html('<span class="text-success"><small><em>Available</em></small></span>')

		            }else {
		            	$('#check_filename_text').html('<span class="text-error"><small><em>Not Available</em></small></span>')

		            	
		            };
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

 jQuery('#refresh-btn').click(function(){
        location.reload();
      });
     jQuery('#close-btn').click(function(){
        window.close();
      });


</script> 
</body>
</html>

<?php
mysqli_close($con);
?>