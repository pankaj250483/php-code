<?php
class Fruit {
  public $name;
  public $color;
  public $weight;

  function set_name($n,$k,$w) {  // a public function (default)
    $this->name = $n;
    $this->set_color($k); // ERROR
    $this->set_weight($w); // ERROR
  }
  protected function set_color($n) { // a protected function
    $this->color = $n;
  }
  private function set_weight($n) { // a private function
    $this->weight = $n;
  }

  function __destruct() {
    echo "The fruit is {$this->name}, color {$this->color} and weight is {$this->weight}  .";
  }

}

$mango = new Fruit();
$mango->set_name('Mango','red',200); // OK

//$mango->set_weight('300'); // ERROR
?>