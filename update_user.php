<?php
session_start();
include('conn.php');
if (isset($_POST['submit']) && $_POST['submit'] == "Update") {
    $getId = $_POST['user_id'];
    $FirstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lastname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // check duplicate value
    $users = "SELECT * FROM users WHERE id=$getId";
    $exeUsers = $conn->query($users);
    $countRows = mysqli_num_rows($exeUsers);

    if ($countRows > 0) {
        $duplicateContactNo = "SELECT * FROM users WHERE contact_no=$contact_no AND id!=$getId";
        $exeDuplicate = $conn->query($duplicateContactNo);
        $countDuplicateRows = mysqli_num_rows($exeDuplicate);
        if ($countDuplicateRows > 0) {
            unset($_SESSION['error_message']);
            $_SESSION['error_message'] = 'Contact Number already exists';
            header('Location: edit.php?id=' . $getId);
        } else {
            // Set the values for each column in the UPDATE query
            $sql = "UPDATE users SET 
            firstname = '$FirstName',
            lastname = '$lastname',
            email = '$email',
            password = '$password',
            contact_no = '$contact_no',
            status = '$status'
            WHERE id = $getId";

            if (mysqli_query($conn, $sql)) {
                $status = "Record updated successfully";
                header('Location: index.php?msg=' . $status);
            } else {
                echo "Error in Update: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Invalid User ID";
    }
}
?>
<style>
    
.form-group .error {
    color: red;
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
			<script src="assets/js/validate.js"></script>
				<script>
						$(document).ready(function() {$('#contact_no').keyup(function() {
				if ($(this).val().length > 10) {
					$(this).val($(this).val().slice(0, 10));
						}
				});
           	$("#userForm").validate({
			rules: {
				first_name: "required",
				status: "required",
				email: {
					required: true,
					email: true
				},
                contact_no: {
					required: true,
					number: true,
					maxlength: 10
                    
				},
			},
		messages: {	
				first_name: "Please enter your firstname",
				email: "Please enter a valid email address",
				contact_no: "Please enter a valid Number",
			}
            
		});
     	// Set max length for number input
								
});

</script>