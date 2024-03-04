<?php
function myFamily($lastname, ...$firstname) 
{
  $txt = "";
  $len = count($firstname);
  for($i = 0; $i < $len; $i++) {
    $txt = $txt."Hi, $firstname[$i] $lastname.<br>";
  }
  return $txt;
}
$a = myFamily("kumar", "dixit", "rohn", "patiyal");
echo $a;

//The variadic function argument becomes an array.
function sumMyNumbers(...$x) 
{
    $n = 0;
    $len = count($x);
    for($i = 0; $i < $len; $i++) {
      $n += $x[$i];
    }
    return $n;
  }
  
  $a = sumMyNumbers(5, 2, 6, 2, 7, 7);
  echo $a;
?>
