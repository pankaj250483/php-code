<?php

require "vendor/PHPExcel/Classes/PHPExcel.php";
// require "vendor/PHPExcel/Classes/PHPExcel/Writer/Excel5.php"; 

$objPHPExcel = new PHPExcel();
// write data to first sheet
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id')
            ->setCellValue('A2', 1)
            ->setCellValue('B1', 'name')
            ->setCellValue('B2', 'John');
// add new sheet to the same excel 
$objPHPExcel->createSheet();
// write data to second sheet in the same workbook
$objPHPExcel->setActiveSheetIndex(1)
            ->setCellValue('A1', 'id')
            ->setCellValue('A2', 1)
            ->setCellValue('B1', 'name')
            ->setCellValue('B2', 'Alexa');
// set focus to first sheet of the workbook
$objPHPExcel->setActiveSheetIndex(0);
// write data to defined excel sheet
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('studentInformation.xlsx');
echo "<a href='studentInformation.xlsx'>Download Excel File</a>";

?>