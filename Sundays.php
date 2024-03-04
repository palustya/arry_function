<?php
function getSunday($year, $month) {
    $sundays = [];
        $firstDayOfMonth = new DateTime("$year-$month-02");
        $dayOfWeek = $firstDayOfMonth->format('w');
     $daysToFirstSunday = (7 - $dayOfWeek) % 7;
         $firstSunday = $firstDayOfMonth->modify("+$daysToFirstSunday days");
       while ($firstSunday->format('m') == $month) {
        $sundays[] = $firstSunday->format('d-m-Y');
        $firstSunday->modify('+7 days');
    }
  return $sundays;
}
        $year = 2024;
        $month = 2;
        $sundaysInMonth = getSunday($year, $month);
        // Output the results
        echo "Sundays in $year-$month:.<br>";
        foreach ($sundaysInMonth as $sunday) {
            echo $sunday . ".<br>";
        }
?>
