<?php
require 'vendor/autoload.php';
require 'connect.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$objPHPExcel = new Spreadsheet();
$sql = "SELECT * FROM computers";
$result = $conn->query($sql);



$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, 1, "PANKAJ COMPUTERS, ANUPGARH")
 ->setCellValueByColumnAndRow(3, 2, "STUDENT MARKSHEET")
 ->setCellValueByColumnAndRow(0, 3, "ROLL NO.")
 ->setCellValueByColumnAndRow(1, 3, "name")
 ->setCellValueByColumnAndRow(2, 3, "english")
 ->setCellValueByColumnAndRow(3, 3, "math")
 ->setCellValueByColumnAndRow(4, 3, "hindi")
 ->setCellValueByColumnAndRow(5, 3, "science")
 ->setCellValueByColumnAndRow(6, 3, "punjabi")
 ->setCellValueByColumnAndRow(7, 3, "gk")
 ->setCellValueByColumnAndRow(7, 3, "total");
$row = 4; // 1-based index
while($row_data = $result->fetch_assoc()) {
    $col = 0;
    foreach($row_data as $key=>$value) {
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
        $col++;
    }
    $row++;
}
$objWriter = new Xlsx($objPHPExcel);
$objWriter->save('computers.xlsx');
echo "<a href='computers.xlsx'>Download Excel File</a>";




?>
