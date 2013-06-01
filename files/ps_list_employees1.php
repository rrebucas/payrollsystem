<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/list.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/floating_img.css"/>
<script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<header>
	<h1>List of Employees</h1>
</header>
<div id="content-list-employee">
	<div id="search">
		<form action="#" method="post">
			<p>
				Enter <strong>Employee's Name</strong><em>(i.e. Abc,def)</em>
			</p>
			<input class="search-here" type="text" value="" name="search_list" size="45"/>
			<input class="btn" type="submit" value="search" name="search_btn"/>
		</form>
	</div>
	<table border="1" width="550" class="table-striped">
	<thead>
	<tr>
		<th>
			ID No.
		</th>
		<th>
			Employee's Name
		</th>
		<th>
			Action
		</th>
	</tr>
	</thead>
	<tr>
		<td>
			1
		</td>
		<td>
			Arnel Moso
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			15
		</td>
		<td>
			Vanessa Saren
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			38
		</td>
		<td>
			Aloysius Torres
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			39
		</td>
		<td>
			Shandy Mar Tabanao
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			38
		</td>
		<td>
			Aloysius Torres
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			39
		</td>
		<td>
			Shandy Mar Tabanao
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			1
		</td>
		<td>
			Arnel Moso
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			15
		</td>
		<td>
			Vanessa Saren
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			38
		</td>
		<td>
			Aloysius Torres
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			39
		</td>
		<td>
			Shandy Mar Tabanao
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			38
		</td>
		<td>
			Aloysius Torres
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			1
		</td>
		<td>
			Arnel Moso
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			15
		</td>
		<td>
			Vanessa Saren
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			38
		</td>
		<td>
			Aloysius Torres
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			39
		</td>
		<td>
			Shandy Mar Tabanao
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	<tr>
		<td>
			38
		</td>
		<td>
			Aloysius Torres
		</td>
		<td>
			<center><a href="ps_view_profile.php" class="btn btn-info btn-mini">view</a></center>
		</td>
	</tr>
	</table>
	<div class="pagination pagination-small pagination-centered">
		<ul>
			<li class="disabled"><a href="#">Prev</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">Next</a></li>
		</ul>
	</div>
</div>
<div id="divBottomRight">
	<a href="#"><img src="ps_theme/images/seglogo.png" alt="" title="Segworks Technologies Corporation" class="masterTooltip" /></a>
</div>
	<!--Page Generated-->
	<?php $start_time = microtime(true); 

$time_gen = number_format(microtime(true) - $start_time, 9);
?>
<pre class="prettyprint" id="page=generated" style="width: 90%; ">
	 This page was generated in <span class="atv"><?php echo"$time_gen"; ?>
	</span> seconds.
</pre>
<script type="text/javascript" src="ps_theme/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="ps_theme/js/floating_image.js"></script>
<script type="text/javascript" src="ps_theme/js/float_image.js"></script>
</body>
</html>