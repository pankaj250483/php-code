<?php
require 'vendor/autoload.php';
require 'family/rg/connect.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$y = new Spreadsheet();
$sql = "SELECT * FROM employee";
$result = $conn->query($sql);`

$y->getActiveSheet()->setCellValueByColumnAndRow(3, 1, "PANKAJ COMPUTERS, ANUPGARH")
 ->setCellValueByColumnAndRow(3, 2, "EMPLOYEE INFORMATION")
 ->setCellValueByColumnAndRow(0, 3, "Sr No")
 ->setCellValueByColumnAndRow(1, 3, "Employee Name")
 ->setCellValueByColumnAndRow(2, 3, "Dob")
 ->setCellValueByColumnAndRow(3, 3, "Salary")
 ->setCellValueByColumnAndRow(4, 3, "Mobile No")
 
$row = 4; // 1-based index
while($row_data = $result->fetch_assoc()) {
    $col = 0;
    foreach($row_data as $key=>$value) {
        $y->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
        $col++;
    }
    $row++;
}
$objWriter = new Xlsx($y);
$objWriter->save('employee.xlsx');
echo "<a href='employee.xlsx'>Download Excel File</a>";




?>
