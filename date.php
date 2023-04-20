<!DOCTYPE html>
<html>
<body>

<?php

$d=mktime(8, 12, 2014);
echo "Created date is " . date("d-m-Y", $d);
echo "The time is " . date("h:i:sa");
$d=strtotime("10:30pm April 15 2014");
echo "Created date is " . date("Y-m-d h:i:sa", $d);

?>

</body>
</html>
