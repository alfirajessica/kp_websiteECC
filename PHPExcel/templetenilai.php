<?php

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="file.xlsx"');
header('Cache-Control: max-age=0');
$writer->save('php://output');

require('Classes/PHPExcel.php');

$phpExcel = new PHPExcel;
// Setting font to Arial Black
$phpExcel->getDefaultStyle()->getFont()->setName('Arial Black');
// Setting font size to 14
$phpExcel->getDefaultStyle()->getFont()->setSize(14);
//Setting description, creator and title
$phpExcel ->getProperties()->setTitle("Vendor list");
$phpExcel ->getProperties()->setCreator("Robert");
$phpExcel ->getProperties()->setDescription("Excel SpreadSheet in PHP");
// Creating PHPExcel spreadsheet writer object
// We will create xlsx file (Excel 2007 and above)
$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
// When creating the writer object, the first sheet is also created
// We will get the already created sheet
$sheet = $phpExcel ->getActiveSheet();
// Setting title of the sheet
$sheet->setTitle('My product list');
// Creating spreadsheet header
$sheet ->getCell('A1')->setValue('Vendor');
$sheet ->getCell('B1')->setValue('Amount');
$sheet ->getCell('C1')->setValue('Cost');
// Making headers text bold and larger
$sheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(14);
// Insert product data
// Autosize the columns
$sheet->getColumnDimension('A')->setAutoSize(true);
$sheet->getColumnDimension('B')->setAutoSize(true);
$sheet->getColumnDimension('C')->setAutoSize(true);
// Save the spreadsheet
$writer->save('products.xlsx');

?>