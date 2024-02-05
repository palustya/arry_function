<?php

include('conn.php');


    $getId = $_GET['id'];
    
    if (isset($_GET['id']) && !empty($getId)) {
        $users = "SELECT * FROM users WHERE id=$getId";
        $exeUsers = $conn->query($users);
        if ($exeUsers->num_rows > 0) {
            // If the user exists, perform the deletion
            $sqlDelete = "DELETE FROM users WHERE id = $getId";
    
            if ($conn->query($sqlDelete) === TRUE) {
                $response = array('id' => 'success', 'message' => 'Record deleted successfully');
                echo json_encode($response);
                header("Location: index.php? delete=yes");
                
            } else {
                $response = array('id' => 'error', 'message' => 'Error in Delete: ' . $conn->error);
                echo json_encode($response);
            }
        } else {
            $response = array('id' => 'error', 'message' => 'Invalid User ID');
            echo json_encode($response);
        }





    }
?>