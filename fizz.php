<?php
// displaying number divion by 3 
//for ($i = 1; $i <= 50; $i++) 
// {      if ($i % 3 == 0)
//         if($i %5 == 0)
//      {
//       echo "Fizz ";
//       echo "buzz";
//   } else {
//      echo $i ." ";  }
// }

?>

<?php
// print numbers using loop
for ($i = 1; $i <= 100; $i++) {
    echo $i . "\n";
}
?><br>

<?php
// print numbers without loop 
function printNos($n)
{
	if($n > 0)
	{
    printNos($n - 1);
		echo $n, "<br> ";
	}
	return;
}
printNos(100)
?>
