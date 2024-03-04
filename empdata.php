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
        <input type="text" name="designation" placeholder="Enter your designation" required>
       <input type="number" name="empcode" placeholder="Enter your empcode" required>
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
        $designation = $_POST['designation'];
         $empcode = $_POST['empcode'];

        // Check if any of the fields are empty
        if (empty($name) || empty($designation) || empty($empcode)) {
            echo "Please fill in all fields.";
        } else {
            $insert = array(
                'name' => $name,
                'designation' => $designation,
              'empcode' => $empcode,
            );
            insert('empl_data', $insert);

            // Display the data in the table
            echo displayData('empl_data', $conn);
        }
    }

    // Edit button is clicked
    if (isset($_GET['edit'])) {
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            // Retrieve the existing data for the selected ID
            $result = mysqli_query($conn, "SELECT * FROM empl_data WHERE id = $id");
            if ($row = mysqli_fetch_assoc($result)) {
                echo "<h2>Edit Form</h2>";
                echo "<form method='post'>";
                echo "<input type='text' name='name' placeholder='Enter your name' value='{$row['name']}' required>";
                echo "<input type='text' name='designation' placeholder='Enter your designation' value='{$row['designation']}' required>";
                 echo "<input type='number' name='empcode' placeholder='Enter your empcode' value='{$row['empcode']}' required>";
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
        $designation = $_POST['designation'];
      $empcode = $_POST['empcode'];

        // Check if any of the fields are empty
        if (empty($name) || empty($designation) ||  empty($empcode)) {
            echo "Please fill in all fields.";
        } else {
            $updateData = array(
                'name' => $name,
                'designation' => $designation,
                'empcode' => $empcode,
            );

          }
    }

    // Delete button is clicked
    if (isset($_GET['delete'])) {
        if (isset($_GET['id'])) {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            delete('empl_data', $id);
            // Display the data in the table
            echo displayData('empl_data', $conn);
        }
    }

    // Close the connection
    mysqli_close($conn);

    function insert($tableName, $data)
    {
        global $conn;
    
        // Escape values and prepare columns and values
        $escapedData = array_map(function ($value) use ($conn) {
            return mysqli_real_escape_string($conn, $value);
        }, $data);
    
        $columns = implode(', ', array_keys($escapedData));
        $values = "'" . implode("', '", $escapedData) . "'";
    
        // Build and execute the SQL query
        $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
    
        if (mysqli_query($conn, $query)) {
            echo "Data inserted successfully into $tableName.";
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
    
            function displayData($tableName, $conn)
    {
        $result = mysqli_query($conn, "SELECT * FROM $tableName");
        $html =  "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>designation</th>
                  <th>empcode</th>
                    
                    
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            $html .=  "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['designation']}</td>
                     <td>{$row['empcode']}</td>
             </tr>";
        }
        $html .=  "</table>";
        return $html;
    }
    ?>
   
  </body>

</html>
