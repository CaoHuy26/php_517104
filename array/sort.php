<?php
  $names = array("Vân", "Hà", "Bình", "Điệp");

  echo "<h3>Mảng ban đầu:</h3>";
  foreach($names as $name){
    echo $name;
    echo "<br>";
  }
  
  echo "<h3>Mảng sắp xếp tăng dần:</h3>";
  sort($names);
  foreach($names as $name){
    echo $name;
    echo "<br>";
  }

  echo "<h3>Mảng sắp xếp giảm dần:</h3>";
  rsort($names);
  foreach($names as $name){
    echo $name;
    echo "<br>";
  }

  echo "<hr>";

  $age = array("Vân" => 32, "Hà" => 22, "Bình" => 25, "Điệp" => 40);
  echo "<h3>Mảng ban đầu:</h3>";
  foreach($age as $x => $x_value) {
    echo "Key: $x, Value: $x_value";
    echo "<br>";
  }

  echo "<h3>Mảng đã sắp xếp:</h3>";
  ksort($age);
  foreach($age as $x => $x_value) {
    echo "Key: $x, Value: $x_value";
    echo "<br>";
  }
?>