<!DOCTYPE html>
<html>
<body>

<?php
class students{
  public $name;
  public $rollno;
  public $hindi;
   public $math;
    public $science;

 
  function __construct($name,$rollno,$hindi,$math,$science) {
    $this->name = $name;
     $this->rollno = $rollno;
      $this->hindi = $hindi;
       $this->math = $math;
        $this->science = $science;
    
  }
 function total() 
 {
    return $this->hindi+$this->math+$this->science;
  }

  function get_name() {
    return $this->name;
  }

}

echo "hello";

$st[0] = new students("dheeraj",10,45,49,52);
$st[0]->total();
echo $st[0]->get_name();
?>
 
</body>
</html>