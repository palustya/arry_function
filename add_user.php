<?php

//die;

error_reporting(E_ALL);
error_reporting(-1);

// Same as error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

include('conn.php');

$errors = []; // Array to store validation errors

// ... rest of your code ...

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $contact_no = $_POST["contact_no"];
    $status = $_POST["status"];

    // Check if phone number already exists
    $sql_1 = "SELECT * FROM users WHERE contact_no = '$contact_no'";
    $res = $conn->query($sql_1);
    $count = $res->num_rows;

    if ($count == 0) {
        // Insert data into the database
        $sql = "INSERT INTO users (firstname,lastname,email,password,contact_no,status) VALUES ('$first_name', '$last_name', '$email', '$password','$contact_no','$status')";
       
        if (mysqli_query($conn, $sql)) {
            $status= "Record Added successfully";
            header('Location: index.php?msg='.$status);
        } else {
            echo "Error in Added";
        }
    } else{
    
session_start();
        $_SESSION['error_message'] = 'Contact Number already exists';
       
        header('Location: create_user.php');
        
        die;
    }
}
// Close the database connection
$conn->close();
?>
