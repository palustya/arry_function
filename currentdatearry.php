<?php
$currentDate = new DateTime();
// store the next 7 dates
$next7Dates = array();
for ($i = 0; $i < 7; $i++) {
     $nextDate = clone $currentDate;
    $nextDate->modify("+$i day");
     $next7Dates[] = $nextDate->format('d-m-Y')."<br>";
}
echo "Current Date: " . $currentDate->format('d-m-Y') . "<br>";
echo "Next 7 Dates: " . implode(', ', $next7Dates);
?>
