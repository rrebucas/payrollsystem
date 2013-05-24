<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<title>Payroll System | SegWorks Technologies Corporation</title>
<link href="http://fonts.googleapis.com/css?family=Mouse+Memoirs" rel="stylesheet" type="text/css"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/login.css"/>
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
</head>
<body>
<div id="psLoginContainer">
	<h1><a href="main.php">Payroll Management <span>System</span></a></h1>
	<form action="#" method="post" class="form-horizontal" enctype="multipart/form-data">
		<div class="control-group">
			<label class="control-label" for="inputEmail">Username:</label>
			<div class="controls">
				<input type="text" id="inputEmail" name="psUsername" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputPassword">Password:</label>
			<div class="controls">
				<input type="password" id="inputPassword" name="psPassword" />
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input type="submit" class="btn btn-info submit-reset" value="Log In"/>
				<input type="reset" class="btn  submit-reset" value="Reset"/>
			</div>
		</div>
	</form>
	<div id="psAccountContainer">
		<p id="lostPword"><a href="#" title="Password Lost and Found">Lost your password?</a></p>
		<p id="newAccnt"><a href="ps_add_newuser.php">Create New Account</a></p>
	</div>
</div>
</body>
</html>