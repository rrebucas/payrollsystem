<!DOCTYPE html>
<html lang="en">
<head>
<title>Payroll System | SegWorks Technologies Corporation</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<!--ps css-->
<link rel="stylesheet" type="text/css" href="ps_theme/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/style.css"/>
<link rel="stylesheet" type="text/css" href="ps_includes/jquery_scroller/css/jquery.mCustomScrollbar.css" />
<!--ps js-->
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<aside>
<ul id="collapse-menu" class="sample-menu">

	<li><a href="calendar.php" target="content" id="homeMenu"><img src="ps_theme/images/home-icon.png" alt=""/>Home</a></li>


	<li><a href="ps_record_employees.php"  target="_blank" id="recordMenu"><img src="ps_theme/images/record-icon.png" alt=""/>Employees Record</a></li>

	<li>
	<a href="ps_list_employees.php" target="content" id="listMenu"><img src="ps_theme/images/listemployee-icon.png" alt=""/>List of Employees</a></li>
	
	<li><a href="ps_import.php" target="content" id="importMenu"><img src="ps_theme/images/import-icon.png" alt=""/>Import</a></li>
	<!--<li><a href="ps_export.php" target="content" id="exportMenu"><img src="ps_theme/images/export-icon.png" alt=""/>Export</a></li>-->
	<!--<li>
	<a href="ps_settings.php" target="content" id="settingMenu"><img src="ps_theme/images/settings-icon.png" alt=""/>Settings</a></li>
	
	<li><a href="#" id="logout"><img src="ps_theme/images/logout-icon.png" alt=""/>Logout</a></li>-->
	
</ul>
</aside>
<div class="clear">
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="ps_theme/js/modernizr.custom.58301.js"></script>
<script type="text/javascript" src="ps_theme/js/addclass_menu.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="ps_includes/jquery_scroller/js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
<script type="text/javascript" src="ps_includes/jquery_scroller/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">

$("#profileMenu").click(function () {
$("#collapse").slideToggle("slow");
});

(function($){
			$(window).load(function(){
				$("aside").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
			});
		})(jQuery);

</script>
</body>
</html>