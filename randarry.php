<?php
$a=array("red","green","blue","yellow","brown","black","grey","orange");
$random_keys=array_rand($a,6);
echo $a[$random_keys[0]]."<br>";
echo $a[$random_keys[1]]."<br>";
echo $a[$random_keys[2]]."<br>";
echo $a[$random_keys[3]]."<br>";
echo $a[$random_keys[4]]."<br>";
echo $a[$random_keys[5]]."<br>";
echo $a[$random_keys[6]];
?>