<!DOCTYPE html>
<html lang="en">
<head>
<title>Payroll System | SegWorks Technologies Corporation</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="http://fonts.googleapis.com/css?family=Mouse+Memoirs" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/home.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="ps_theme/css/floating_img.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/black_calculator.css" />
<link rel="stylesheet" type="text/css" href="ps_theme/css/black_calculator_ie.css" />
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
</head>

<body>
<header>
	<div class="wrapper">
		<h1>Welcome to <span>Segworks</span></h1>
	</div>
</header>
<div id="content">
	
		<div class="main">
			<h2>Calendar</h2>
			<div id="datepicker"></div>
		</div>
		<div class="main calculator-space">
			<h3>Calculator</h3>
			 <div id="calc-holder">
			 	<div class="calculator"></div>
			 </div>
		</div>

</div>
<div id="divBottomRight">
  <a><img src="ps_theme/images/seglogo.png" alt="" title="Segworks Technologies Corporation"/></a>
</div>
<!--page generate-->
<?php 
$start_time = microtime(true); 
$time_gen = number_format(microtime(true) - $start_time, 9);
?>
<pre class="prettyprint" id="page=generated" style="text-align:center; font-size: 13px; color: #333; margin: 20px auto; border-radius: 4px; background-color:#F7F7F9; border: 1px solid #E1E1E8; padding: 8px; bottom: 0; width: 90%; ">
This page was generated in <span class="atv" style="color: #DD1144;"><?php echo"$time_gen"; ?></span> seconds.
</pre>
<script type="text/javascript" src="ps_theme/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="ps_theme/js/jquery-ui.js"></script>
<script type="text/javascript" src="ps_theme/js/jquery.blackcalculator-1.0.min.js"></script>
<script type="text/javascript" src="ps_theme/js/floating_image.js"></script>
<script type="text/javascript" src="ps_theme/js/float_image.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
$( "#datepicker" ).datepicker();

	 $('.calculator').blackCalculator({type:'advanced', allowKeyboard:false,});

	});

</script>
</body>
</html>