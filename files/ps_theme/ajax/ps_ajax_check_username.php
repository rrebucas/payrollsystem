
<?php

require_once '../../ps_connect_db.php';

$val_username = mysql_real_escape_string(trim($_POST["username"]));
$val_username_query = mysqli_query($con,"SELECT * FROM  seg_ps_users WHERE username='$val_username' ");
$val_username_find=mysqli_num_rows($val_username_query);

echo "$val_username_find";


mysqli_close($con);
?>