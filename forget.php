<?php
$validEmail = 'user@example.com';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredEmail = $_POST['email'];

    if ($enteredEmail === $validEmail) {
        $resetLink = 'reset_password.php?token=unique_token'; 
        echo "A password reset link has been sent to your email. Click <a href='$resetLink'>here</a> to reset your password.";
        exit();
    } else {
        $error = 'Invalid email address';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <form method="post" action="">
        <h2>Forgot Password</h2>
        <?php
        // Display error message if email is invalid
        if (isset($error)) {
            echo "<p style='color: red;'>$error</p>";
        }
        ?>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
