<?php
// Create connection
require_once 'ps_connect_db.php'
?> 



<?php

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$psUsername=$_POST['psUsername'];
$psPassword=$_POST['psPassword'];

// To protect MySQL injection (more detail about MySQL injection)
$psUsername = stripslashes($psUsername);
$psPassword = stripslashes($psPassword);
$psUsername = mysql_real_escape_string($psUsername);
$psPassword = mysql_real_escape_string($psPassword);

$sql="SELECT * FROM $tbl_name WHERE username='$psUsername' and password='$psPassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("psUsername");
session_register("psPassword");
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>