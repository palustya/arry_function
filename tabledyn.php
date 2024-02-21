<!DOCTYPE html>
<html>

<head>
    <title>Add Dynamic Table Data</title>
</head>

<body>
    <form method="post">
        <input type="text" name="name" placeholder="Enter your name">
        <input type="text" name="lastname" placeholder="Enter your lastname">
        <input type="text" name="address" placeholder="Enter your address">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="number" name="mobileNo" placeholder="Enter your mobileNo">
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
        $insert = array(
            'name' => $_POST['name'],
            'lastname' => $_POST['lastname'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
            'mobileNo' => $_POST['mobileNo'],
        );

        insert('demo', $insert);
        echo displayData('demo', $conn);
    }

    // Delete or Edit button is clicked
    if (isset($_POST['delete']) || isset($_POST['edit'])) {
        if (isset($_POST['id'])) {
            $id = mysqli_real_escape_string($conn, $_POST['id']);
            if (isset($_POST['delete'])) {
                delete('demo', $id);
                echo displayData('demo', $conn);
            } elseif (isset($_POST['edit'])) {
                // You can implement the edit logic here
                // For example, redirect to an edit page with the selected ID
                header("Location: tabledyn
                .php?id=$id");
                exit();
            }
        } else {
            echo "Error: Missing identifier.";
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
        $columns = implode(', ', array_keys($escapedData));
        $values = "'" . implode("', '", $escapedData) . "'";
        $query = "INSERT INTO $tableName ($columns) VALUES ($values)";

        if (mysqli_query($conn, $query)) {
            echo "Data inserted successfully into $tableName.";
        } else {
            echo "Error inserting data:" . mysqli_error($conn);
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

    function displayData($tableName, $conn)
    {
        $result = mysqli_query($conn, "SELECT * FROM $tableName");
        $html =  "<table border='1'>
                <tr>
                     <th>Name</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>mobileNo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $html .=  "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['lastname']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['mobileNo']}</td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' name='edit'>Edit</button>
                        </form>
                    </td>
                    <td>
                        <form method='post'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit' name='delete'>Delete</button>
                        </form>
                    </td>
                </tr>";
        }
        $html .=  "</table>";
        return $html;
    }
    ?>
</body>

</html>
