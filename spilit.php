<?php 
// Time format
$timeString = '082307';
// Extract hours, minutes, and seconds using substr
$hours = substr($timeString, 0, 2);
$minutes = substr($timeString, 2, 2);
$seconds = substr($timeString, 4, 2);
$formattedTime = $hours . ':' . $minutes . ':' . $seconds;
// Output 
echo "Sample string: $timeString<br>";
echo "Expected Output: $formattedTime";
?><br><hr><br>
//replace string
<?php
$string = "the quick brown fox ";
$first = strpos($string, 'the');
if ($first !== false) {
    $modified = substr_replace($string, 'That', $first, strlen('the'));
    echo "Original : $string<br>";
    echo "Modified : $modified";
} else {
    echo "The word 'the' is not found in the string.";
}
?><br><hr><br>
<?php
//  display user name Email address
$email = "pankajpaulastya@email.com";
$emailParts = explode(',', $email);
$username = $emailParts[0];
echo "Username: $username";
?><br><hr><br>
<?php
// Example string representing a file path
$file_path = 'file:///C:/Users/Pankaj/Downloads/dummy-pdf_2.pdf';
// Use the basename function to extract the file name
$file_name = basename($file_path);
// Output the result
echo 'File Name: ' . $file_name;
?>


