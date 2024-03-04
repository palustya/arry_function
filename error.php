<?php
// error hndling
function divide($a, $b) {
    if ($b == 0) {
        throw new Exception("Cannot divide by zero");
    }
    return $a / $b;
}

try {
    echo divide(10, 2);
    echo divide(5, 0);  // This will throw an exception
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?><br><th>
Handling Dates and Times:
<?php
// Getting the current date and time
$currentDate = date('d-m-Y');
$currentTime = date('H:i:s');

// Formatting a specific date
$formattedDate = date('F j, Y', strtotime('04-03-2022'));
?>
