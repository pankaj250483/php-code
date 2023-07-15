<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



$x = new Spreadsheet();
// write data to first sheet
$x->setActiveSheetIndex(0)
            ->setCellValue('A1', 'id')
            ->setCellValue('A2', 1)
            ->setCellValue('B1', 'name')
            ->setCellValue('B2', 'John')
            ->setCellValue('C1', 'fatherName')
            ->setCellValue('C2', 'Denny')
            ->setCellValue('D1', 'MobNo')
            ->setCellValue('D2', '9610816477');


// add new sheet to the same excel 
$x->createSheet();
// write data to second sheet in the same workbook
$x->setActiveSheetIndex(1)
            ->setCellValue('A1', 'id')
            ->setCellValue('A2', 1)
            ->setCellValue('B1', 'name')
            ->setCellValue('B2', 'Alexa');

$x->createSheet();
    // write data to second sheet in the same workbook
    $x->setActiveSheetIndex(2)
            ->setCellValue('A1', 'id')
            ->setCellValue('A2', 1)
            ->setCellValue('A3', 2)
            ->setCellValue('A4', 3)

            ->setCellValue('B1', 'fruitname')
            ->setCellValue('B2', 'apple')
            ->setCellValue('B3', 'mango')
            ->setCellValue('B2', 'orange')

            ->setCellValue('C1', 'price')
            ->setCellValue('C2', '70')
            ->setCellValue('C3', '80')
            ->setCellValue('C4', '50');      

// set focus to first sheet of the workbook
$x->setActiveSheetIndex(0);
// write data to defined excel sheet
$objWriter = new Xlsx($x);
$objWriter->save('infolist.xlsx');
echo "<a href='infolist.xlsx'>Download Excel File</a>";

?>