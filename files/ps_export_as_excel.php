<?php


$getname = $_POST['employee_name'];
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2012 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2012 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.8, 2012-10-12
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

//include the following 2 files
require_once 'ps_includes/phpexcel/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

$objPHPExcel->getDefaultStyle()->getFont()
    ->setName('Arial Narrow')
    ->setSize(10);


$objPHPExcel->getActiveSheet()
			->mergeCells('C1:AB1')
			->mergeCells('B2:B3')

			->mergeCells('B5:B6')
			->mergeCells('C5:E5')
			->mergeCells('F5:I5')
			->mergeCells('M5:P5')

			->mergeCells('F6:G6')
			->mergeCells('H6:I6')

			->mergeCells('M6:N6')
			->mergeCells('O6:P6')

			->mergeCells('D2:I2')
			->mergeCells('D3:I3');
			//->removeRow(,2);

$objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(12.57);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5.57);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(5.71);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(3.71);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(3.57);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(3.57);

$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C3')->getFont()->setBold(true);

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('B1', 'Name')
			->setCellValue('B2', 'Cut off Dates')
			->setCellValue('B5', 'Date')
			->setCellValue('B25', 'Total')

            ->setCellValue('C1', $getname)
            ->setCellValue('C2', 'From')
            ->setCellValue('C3', 'To')

            ->setCellValue('C6', 'Night?')
            ->setCellValue('D6', 'Holiday?')
            ->setCellValue('E6', 'OT?')
            ->setCellValue('F6', 'IN')
            ->setCellValue('H6', 'OUT')

            ->setCellValue('M6', 'IN')
            ->setCellValue('O6', 'OUT')

            ->setCellValue('F5', 'AM')
            ->setCellValue('M5', 'PM')

            ->setCellValue('AD2', 'From') //rate table
			->setCellValue('AD3', 'To')
			->setCellValue('AD4', 'Holiday Rate')
			->setCellValue('AD5', 'OT Rate')
			->setCellValue('AD6', 'Night Premium')
			->setCellValue('AD4', 'Creditable Hours');	



// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Record');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="ps_record.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
