<?php
require 'vendor/autoload.php';
 
use PhpOffice\PHPExcel\Spreadsheet;
use PhpOffice\PHPExcel\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
 
$sheet = $spreadsheet->getActiveSheet(); 
   
// Set the value of cell A1 
$sheet->setCellValue('A1', 'A1 Cell Data Here'); 
$sheet->setCellValue('B1', 'B1 Cell Data Here'); 
    
// Write an .xlsx file  
$writer = new Xlsx($spreadsheet); 
   
// Save .xlsx file to the current directory 
$writer->save('lcw.xlsx'); 

?>
