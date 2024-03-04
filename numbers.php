<?php

function find_max_value($numbers) {
  if (empty($numbers)) {
      return null; // Handle empty array case
  }
  return max($numbers);
}
$numbers = array("7", "48", "4", "9", "21", "16");


echo "Maximum value: " . $result;
 $clength = count($numbers);
for ($x = 0; $x < $clength; $x++) {
  $result = find_max_value($numbers);
  echo $numbers[$x];
  echo "<br>";
}
?>
