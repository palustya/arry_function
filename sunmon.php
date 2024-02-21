<?php
    function getSunday($m, $y)
{
    return new DatePeriod(
        new DateTime("first sunday $m-$y"),
        DateInterval::createFromDateString('next sunday'),
        new DateTime("last day of $m-$y")
    );
}
foreach (getSunday(2024, 2) as $sunday) {
    echo $sunday->format("l, d-m-y")."<br>";
}
?>


















