<!DOCTYPE html>
<html>
<body>
<pre>

<?php
//indexed array
$cars = array("Volvo", "BMW", "Toyota"); 
var_dump($cars);

//Change value
$cars = array("Volvo", "BMW", "Toyota"); 
echo $cars[0];

//Loop Through an Indexed Array
$cars = array("Volvo", "BMW", "Toyota"); 
foreach ($cars as $x) {
  echo "$x <br>";
}
//indexed number
$cars[0] = "Volvo";
$cars[1] = "BMW";
$cars[2] = "Toyota";

array_push($cars, "Ford");
var_dump($cars);

//PHP array_column() Function

// An array that represents a possible record set returned from a database
$a = array(
     array(
      'id' => 5401698,
      'first_name' => 'Griffin',
      'last_name' => 'Peter',
    ),
    array(
      'id' => 4410767,
      'first_name' => 'Ben',
      'last_name' => 'Smith',
    ),
    array(
      'id' => 3800119,
      'first_name' => 'Joe',
      'last_name' => 'Doe',
    )
  );
  //php array chunk function
  $age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43","Harry"=>"50");
  print_r(array_chunk($age,2,true));

  $first_name = array_column($a,'first_name');
  print_r($first_name);

///
function myfunction($a,$b)
{
if ($a===$b)
  {
  return 0;
  }
  return ($a>$b)?1:-1;
}
$a1=array("a"=>"green","b"=>"red","c"=>"blue");
$a2=array("a"=> "red","b"=>"green","d"=>"blue");
$a3=array("e"=>"yellow","a"=>"red","d"=>"blue");

$result=array_intersect_uassoc($a1,$a2,$a3,"myfunction");
print_r($result);
  //php arry rand function
$a=array("red","green","blue","yellow","brown");
$random_keys=array_rand($a,3);
echo $a[$random_keys[0]]."<br>";
echo $a[$random_keys[1]]."<br>";
echo $a[$random_keys[2]];

$a=array("syntex","vovlc",array("syntex","vovlc"));
$reverse=array_reverse($a);
$preserve=array_reverse($a,true);

print_r($a);
print_r($reverse);
print_r($preserve);

$a=array("a"=>"red","b"=>"green","c"=>"blue");
echo array_shift($a)."<br>";
print_r ($a);

// addsslash function
$str = "Who's Peter Griffin?";
echo $str . " This is not safe in a database query.<br>";
echo addslashes($str) . " This is safe in a database query.";
//chop() Function

$str = "LENOVO\n\n";
echo $str;
echo chop($str)."<br>";

//chunk split function
$str = "PANKAJ-SHARMA";
echo chunk_split($str,1 ,".")."<br>";

//Chr value
echo chr(52) . "<br>"; // Decimal value
echo chr(052) . "<br>"; // Octal value
echo chr(0x47) . "<br>"; // Hex value

//explode function
?>

</pre>
</body>
</html>
