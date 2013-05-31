<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link href="ps_includes/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/settings.css"/>
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
 <link rel="stylesheet" type="text/css" href="ps_theme/css/floating_img.css"/>
</head>
<body>
<div id="settings">
<header>
     <h1>Settings</h1>
      <div id="top-btn">
      
      <a id="refresh-btn" data-toggle="tooltip" data-placement="bottom" class="tip-title" title="Refresh">Refresh</a>
      <a id="close-btn" href="calendar.php" data-toggle="tooltip" data-placement="bottom" class="tip-title" title="Close">Close</a>
    </div>
</header>
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
</div>

     <div id="divBottomRight">
     <a><img src="ps_theme/images/seglogo.png" alt="" title="Segworks Technologies Corporation"/></a>
</div>
<!--Page Generated-->
<?php $start_time = microtime(true);
$time_gen = number_format(microtime(true) - $start_time, 9);
?>

<pre class="prettyprint" id="page=generated" style="width: 90%; clear: both; margin: 0 auto; margin-bottom: 20px;">
 This page was generated in <span class="atv"><?php echo"$time_gen"; ?>
</span> seconds.
</pre>

<script type="text/javascript"src="ps_theme/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="ps_theme/js/floating_image.js"></script>
<script type="text/javascript" src="ps_theme/js/float_image.js"></script>
<script type="text/javascript" src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
     $(document).ready(function(){
          jQuery('#refresh-btn').click(function(){
               location.reload();
           });
           jQuery('#close-btn').click(function(){
               window.close();
         });
     });
</script>
</body>
</html>