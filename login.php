<?php
// Sample username and password for demonstration purposes
$validUsername = 'pankaj';
$validPassword = '2211';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and password from the form
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];
    // Validate username and password
    if ($enteredUsername === $validUsername && $enteredPassword === $validPassword) {
        // Login successful
        $_SESSION['username'] = $enteredUsername;
        header('Location: index.php'); // Redirect to a welcome page or dashboard
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
// Check if the user is logged in
if (isset($_SESSION['username'])) {
    echo '<a href="logout.php">Logout</a>';
}

?>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form method="post" action="">
        <h2>Login Form</h2>


    <?php
    // Display error message if login fails
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <br>
        <button type="submit">Login</button>
        <br> <p><a href="forgot_password.php">Forgot Password?</a></p>
    </form>
</body>















