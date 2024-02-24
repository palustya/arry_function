<!DOCTYPE html>
<html>

<head>
    <title>Add Dynamic Table Data</title>
    <style>
        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 40px;
        }

        button {
            background-color: #4adf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }
    </style>
</head>

<body>
    <form method="post">
        <input type="text" name="name" placeholder="Enter your name" required>
        <input type="text" name="lastname" placeholder="Enter your lastname" required>
        <input type="text" name="address" placeholder="Enter your address" required>
        <input type="text" name="email" placeholder="Enter your email" required>
        <input type="number" name="mobileno" placeholder="Enter your mobileno" required>
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "tabledata";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Form is submitted
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $mobileno = $_POST['mobileno'];

        // Check if any of the fields are empty
        if (empty($name) || empty($lastname) || empty($address) || empty($email) || empty($mobileno)) {
            echo "Please fill in all fields.";
        } else {
            $insert = array(
                'name' => $name,
                'lastname' => $lastname,
                'address' => $address,
                'email' => $email,
                'mobileno' => $mobileno,
            );
            insert('demo', $insert);

            // Display the data in the table
            echo displayData('demo', $conn);
        }
    }

    // Edit button is clicked
    if (isset($_GET['edit'])) {
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            // Retrieve the existing data for the selected ID
            $result = mysqli_query($conn, "SELECT * FROM demo WHERE id = $id");
            if ($row = mysqli_fetch_assoc($result)) {
                echo "<h2>Edit Form</h2>";
                echo "<form method='post'>";
                echo "<input type='text' name='name' placeholder='Enter your name' value='{$row['name']}' required>";
                echo "<input type='text' name='lastname' placeholder='Enter your lastname' value='{$row['lastname']}' required>";
                echo "<input type='text' name='address' placeholder='Enter your address' value='{$row['address']}' required>";
                echo "<input type='text' name='email' placeholder='Enter your email' value='{$row['email']}' required>";
                echo "<input type='number' name='mobileno' placeholder='Enter your mobileno' value='{$row['mobileno']}' required>";
                echo "<button type='submit' name='update' value='{$row['id']}'>Update</button>";
                echo "</form>";
            } else {
                echo "Error: Record not found.";
            }
        }
    }

    // Form is submitted for update
    if (isset($_POST['update'])) {
        $id = mysqli_real_escape_string($conn, $_POST['update']);
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $mobileno = $_POST['mobileno'];

        // Check if any of the fields are empty
        if (empty($name) || empty($lastname) || empty($address) || empty($email) || empty($mobileno)) {
            echo "Please fill in all fields.";
        } else {
            $updateData = array(
                'name' => $name,
                'lastname' => $lastname,
                'address' => $address,
                'email' => $email,
                'mobileno' => $mobileno,
            );

            update('demo', $updateData, $id);
            // Display the data in the table
            echo displayData('demo', $conn);
        }
    }

    // Delete button is clicked
    if (isset($_GET['delete'])) {
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            delete('demo', $id);
            // Display the data in the table
            echo displayData('demo', $conn);
        }
    }

    // Close the connection
    mysqli_close($conn);

    function insert($tableName, $data)
    {
        global $conn;
        $escapedData = array_map(function ($value) use ($conn) {
            return mysqli_real_escape_string($conn, $value);
        }, $data);
        unset($escapedData['id']);
        $columns = implode(', ', array_keys($escapedData));
        $values = "'" . implode("', '", $escapedData) . "'";
        $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
        if (mysqli_query($conn, $query)) {
            echo "Data inserted successfully into $tableName.";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }

    function delete($tableName, $id)
    {
        global $conn;
        $query = "DELETE FROM $tableName WHERE id = $id";
        if (mysqli_query($conn, $query)) {
            echo "Data deleted successfully from $tableName.";
        } else {
            echo "Error deleting data: " . mysqli_error($conn);
        }
    }

    function update($tableName, $data, $id)
    {
        global $conn;
        $escapedData = array_map(function ($value) use ($conn) {
            return mysqli_real_escape_string($conn, $value);
        }, $data);
               $setClause = implode(', ', array_map(function ($key, $value) {
            return "$key = '$value'";
        }, array_keys($escapedData), $escapedData));

        $query = "UPDATE $tableName SET $setClause WHERE id = $id";

        if (mysqli_query($conn, $query)) {
            echo "Data updated successfully in $tableName.";
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }

    function displayData($tableName, $conn)
    {
        $result = mysqli_query($conn, "SELECT * FROM $tableName");
        $html =  "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Mobileno</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $html .=  "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['mobileno']}</td>
                    <td>
                        <a href='?edit&id={$row['id']}'>Edit</a>
                    </td>
                    <td>
                        <a href='?delete&id={$row['id']}'>Delete</a>
                    </td>
                </tr>";
        }
        $html .=  "</table>";
        return $html;
    }
    ?>
    <script>
        function myFunction(action, id) {
            var confirmMessage = "Are you sure you want to " + action + " this entry?";
            if (confirm(confirmMessage)) {
                window.location.href = '?action=' + action + '&id=' + id;
            }
        }
    </script>
</body>

</html>
