<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="ps_theme/css/view.css"/>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style type="text/css">
body {
	font-family:verdana,arial,sans-serif;
	font-size:10pt;
	margin:30px;
	background-color:#fff;
	}
</style>
</head>
<body>
<div id="content-view-profile">
	<h1>Employee's Profile</h1>
	<img src="http://placehold.it/150x150" class="img-rounded" alt="image"/>
</div>
<div class="information">
	<form action="#" method="post">
		<table>
		<tr style="font-weight:bold; size:15px;">
			<td>
				 Name:
			</td>
			<td>
			</td>
			<td>
				 Arnel Moso
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
				 Holiday Rate:
			</td>
			<td>
				<i class="icon-edit"></i>
			</td>
			<td contenteditable id="hourly_rate">
				 2
			</td>
		</tr>
		<tr>
			<td>
				 O.T Rate:
			</td>
			<td>
				<i class="icon-edit"></i>
			</td>
			<td contenteditable id="ot_rate">
				 1.2
			</td>
		</tr>
		<tr>
			<td>
				 Night Premium:
			</td>
			<td>
				<i class="icon-edit"></i>
			</td>
			<td contenteditable id="night_premium">
				 0
			</td>
		</tr>
		<tr>
			<td>
				 Creditable Hours:
			</td>
			<td>
				<i class="icon-edit"></i>
			</td>
			<td contenteditable id="credit">
				 0
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td>
			</td>
		</tr>
		<tr>
			<td>
				<i class="icon-edit"></i><span style="font-style:italic;">(editable)</span>
			</td>
			<td>
			</td>
		</tr>
		</table>
		<input type="submit" value="update" name="update_btn" class="btn">
	</form>
</div>
</body>
</html>