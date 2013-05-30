<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/settings.css"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
<script type="text/javascript" src="ps_includes/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<div id="settings" class="container-fluid">
     <h1>Settings</h1>
     <div id="user_settings" class="container-fluid">
          <form>
               <a href="ps_add_newuser.php" class="btn btn-primary btn-large">
                    New User
               </a>
          <div class="clear"></div>
               <a href="ps_admin_profile.php" class="btn btn-primary btn-large pro">
                    Admin Profile
               </a>
          </form>



     </div>


<div class="clear"></div>
<!--Page Generated-->
<?php $start_time = microtime(true);
$time_gen = number_format(microtime(true) - $start_time, 9);
?>

<pre class="prettyprint" id="page=generated" style="width: 90%; clear: both; margin: 0 auto; margin-bottom: 20px;">
 This page was generated in <span class="atv"><?php echo"$time_gen"; ?>
</span> seconds.
</pre>


</body>

</html>