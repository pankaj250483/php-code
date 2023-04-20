<?php
$myfile = fopen("pcs.txt", "a") or die("Unable to open file!");
$txt = "Dheeraj\n";
fwrite($myfile, $txt);
$txt = "Rajasthant\n";
fwrite($myfile, $txt);
$txt = "vicky";
fwrite($myfile, $txt);
fclose($myfile);
echo "work done. please check file.";
?>