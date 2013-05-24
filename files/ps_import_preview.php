<!DOCTYPE html>
<html>
<head lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>HTML Frames Example - Content</title>
<!--ps css-->

<link rel="stylesheet" type="text/css" href="ps_theme/css/reset.css"/>
<link rel="stylesheet" type="text/css" href="ps_theme/css/style.css"/>
<link href="ps_includes/bootstrap/css/prettify.css" rel="stylesheet" media="screen">
<link href="ps_includes/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">

<!--ps js-->
 <script src="ps_theme/js/jquery-1.9.1.min.js"></script>

 <script src="ps_includes/bootstrap/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="ps_theme/js/modernizr.custom.58301.js"></script>

 <script>

$(document).ready(function(){

    $(window).load(function() {

        $("#loading").fadeOut('fast', function () {
    $("#body-wrapper").fadeIn(3000);
  });
        

         })


});
</script>

<style type="text/css">
#body-wrapper {
    font-family:verdana,arial,sans-serif;
    font-size:10pt;
    margin:30px;
    background-color:#fff;
    
    }
#loading {

position: fixed;
width: 100%;
height: 100%;
padding-top: 15%;
background: #fff;
z-index: 100;
overflow: hidden;
text-align: center;
}
</style>
</head>
<body>

<div id="loading"><img src="ps_theme/images/ajax-loader_page.gif" /></div>
<div id="body-wrapper">

<?php




$file_loc =$_GET['preview_loc'];

$check_file_exists = file_exists("$file_loc");



if ($check_file_exists == 0) {
   ?>

    <h4 class="text-error">Oops! There has been an error.</h4>
    <p class="text-error">File does not exist.</p>

   <?php 
die();

}
else {



$path = $file_loc;

//include the following 2 files
require_once 'ps_includes/phpexcel/Classes/PHPExcel.php';
require_once 'ps_includes/phpexcel/Classes/PHPExcel/IOFactory.php';


$objPHPExcel = PHPExcel_IOFactory::load($path);

foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle     = $worksheet->getTitle();
    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    $nrColumns = ord($highestColumn) - 64;

    echo '<br>Data: <table width="100%" cellpadding="3" cellspacing="0">';
    for ($row = 1; $row <= $highestRow; ++ $row) {

        echo '<tr>';
        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val = $cell->getValue();
            if($row === 1)
            echo '<td style="background:#000; color:#fff;">' . $val . '</td>';
            else
                echo '<td>' . $val . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

} //end else
?>

</div>
</body>
</html>