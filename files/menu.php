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
<ul id="accordion">
	<li><a href="#" id="homeMenu"><img src="ps_theme/images/home-icon.png" alt=""/>Home</a></li>
	<ul>
	</ul>
	<li><a href="#" id="searchMenu"><img src="ps_theme/images/search-icon.png" alt=""/>Search</a></li>
	<ul>
	</ul>
	<!--conflict-->
	<li>
	<a href="ps_list_employees_ren.php" target="content" id="listMenu"><img src="ps_theme/images/listemployee-icon.png" alt=""/>List of Employees</a></li>
	<ul>
	</ul>
	<li><a href="ps_xls_import.php" target="content" id="importMenu"><img src="ps_theme/images/import-icon.png" alt=""/>Import</a></li>
	<ul>
	</ul>
	<li>
	<a href="ps_admin_profile.php" target="content" id="profileMenu"><img src="ps_theme/images/admin-icon.png" alt=""/>Settings</a></li>
	<ul>
		<li><a href="#">Admin Profile</a></li>
		<li><a href="#">Add New User</a></li>
	</ul>
	<li><a href="#" id="logout"><img src="ps_theme/images/logout-icon.png" alt=""/>Logout</a></li>
	<ul>
	</ul>
	<li><a href="#" id="homeMenu"><img src="ps_theme/images/home-icon.png" alt=""/>Home</a></li>
	<ul>
	</ul>
	<li><a href="#" id="searchMenu"><img src="ps_theme/images/search-icon.png" alt=""/>Search</a></li>
	<ul>
	</ul>
	<!--conflict-->
	<li>
	<a href="ps_list_employees_ren.php" target="content" id="listMenu"><img src="ps_theme/images/listemployee-icon.png" alt=""/>List of Employees</a></li>
	<ul>
	</ul>
	<li><a href="ps_xls_import.php" target="content" id="importMenu"><img src="ps_theme/images/import-icon.png" alt=""/>Import</a></li>
	<ul>
	</ul>
	<li>
	<a href="ps_admin_profile.php" target="content" id="profileMenu"><img src="ps_theme/images/admin-icon.png" alt=""/>Settings</a></li>
	<ul>
		<li><a href="#">Admin Profile</a></li>
		<li><a href="#">Add New User</a></li>
	</ul>
	<li><a href="#" id="logout"><img src="ps_theme/images/logout-icon.png" alt=""/>Logout</a></li>
	<ul>
	</ul>
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
/*$("#accordion > li").click(function(){
	if(false == $(this).next().is(':visible')) {
		$('#accordion > ul').slideUp(300);
	}
	$(this).next().slideToggle(300);
});*/
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