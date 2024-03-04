<?php
$str = "rohuyuuuuuuuit";  // Removed space at the beginning
$encodeString = convert_uuencode($str);
echo $encodeString . "<br>";
$countString = strlen($encodeString);  // Corrected variable name
$str = "sharma!";
// Encode the string
$encodeString = convert_uuencode($str);
echo $encodeString . "<br>";
// Decode the string
$decodeString = convert_uudecode($encodeString);
echo $decodeString;
?><br>

crc32()function
<?php
// Example Usage
$string = "Hello, Desi World!";
$checksum = crc32($string);
echo "Checksum for '$string' is: $checksum";
?><br>
<?php
// hashed Usage
$password = "Secret@123";
$hashedPassword = hash("sha256",$password);
echo "Hashed Password: $hashedPassword";
?><br>
//explode function
<?php
$str = '1,2,3,four';
// zero limit
print_r(explode(',',$str,0));
print "<br>";
// positive limit
print_r(explode(',',$str,2));
print "<br>";
// negative limit 
print_r(explode(',',$str,-1));
?>  
<?php
//html translation table
// Create a sample string with special characters
$inputString = "This is a simple <b>HTML</b> example & it's awesome!";
// Get the HTML translation table
$htmlTranslationTable = get_html_translation_table(HTML_ENTITIES);
// Encode the input string using the translation table
$encodedString = strtr($inputString, $htmlTranslationTable);
// Display the original and encoded strings
echo "Original String: $inputString<br>";
echo "Encoded String: $encodedString";
?><br>
//substr function
<?php
$text = "   Hello, World!   ";
$trimmedText = ltrim($text);
echo $trimmedText;

?>