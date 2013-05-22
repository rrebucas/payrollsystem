<?php

//include the following 2 files
require_once 'ps_includes/phpexcel/Classes/PHPExcel.php';
require_once 'ps_includes/phpexcel/Classes/PHPExcel/IOFactory.php';

$allowedExts = array("gif", "jpeg", "jpg", "png");
$extension_file = $_FILES["file"]["name"];
$extension_value = explode(".", $extension_file);
$extension = end($extension_value);

echo "$extension";
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
    }
  }
else
  {
  echo "Invalid file";
  }





/*
$file_loc = $_FILES["file"]["tmp_name"];

$path = $file_loc;



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

*/
?>