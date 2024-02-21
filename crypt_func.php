// crypt function use for password or private message  
<?php
$password = "my_secure_password";
// Generate a random salt
$salt = md5(uniqid(rand(), true));

// Combine the password and salt, and hash them
$hashed_password = crypt($password, $salt);

echo "Original Password: " . $password . "<br>";
echo "Hashed Password: " . $hashed_password;
?>

//close crypt function
