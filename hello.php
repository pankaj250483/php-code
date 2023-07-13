<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;

$x = new Spreadsheet();
$w = $x->getActiveSheet();
$w->setCellValue('A1', 'Hello PANKAJ !');

$x
    ->getActiveSheet()
    ->getStyle('A1:A5')
    ->getBorders()
    ->getInside()
    ->setBorderStyle(Border::BORDER_THICK)
    ->setColor(new Color('FFFF0000'));

$writer = new Xlsx($x);
$writer->save('hello world.xlsx');

?>
  