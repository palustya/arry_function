
<?php
function myMessage() {
    echo "call function !";
  } 
  
  $cars=array("erq","wer","oiuy");
  $arrlength=count($cars);
    for($x=0;$x<$arrlength;$x++)
    {
    echo $cars[$x];
    echo "<br>";
    }
    myMessage();



?>

