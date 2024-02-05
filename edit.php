<?php
include('conn.php');
include('header.php');
include('left_sidebar.php');
$getID = $_GET['id'];
 $users = "SELECT * FROM users where id= $getID";
$exeUsers = $conn->query($users);
$result = mysqli_fetch_assoc($exeUsers);
//var_dump($result);
?>
<style>
	.form-group .error {
		color: red;
	}
</style>
<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Forms <?php echo $getID;?></h4>
						<div class="row">
                            <div class="col-md-2"></div>
							<div class="col-md-8">
								
									<div class="card">
                                        <form action="update_user.php" method="post" id="editForm">
											<input type="hidden" name="user_id" value="<?php echo $result['id']; ?>" />
										<div class="card-header">
											<div class="card-title"> UserForm </div>
											<input type="hidden" name="user_id" value="<?php echo $result['id']; ?>" />
										</div>
										<div class="card-body">
											<div class="form-group">
												<label for="First Name">First Name</label>
												<input type="text" name="first_name" class="form-control form-control-lg" id="First Name" value="<?php echo $result['firstname']; ?>">
											</div>
											<div class="form-group">
												<label for="last name">Last name</label>
												<input type="text" name="last_name" class="form-control form-control" id="lastname" value="<?php echo $result['lastname']; ?>">

											</div>
											<div class="form-group">
												<label for="email">Email</label>
												<input type="text" name="email" class="form-control form-control-sm" id="email" value="<?php echo $result['email']; ?>">

											</div>
                                            <div class="form-group">
												<label for="password">Password</label>
												<input type="text" name="password" class="form-control form-control-sm" id="Password" value="<?php echo $result['password']; ?>">

											</div>
											<div class="form-group">
												<label for="contact_no">Contact No</label>
                                                <input type="text" name="contact_no" class="form-control form-control-sm" id="contact_no" value="<?php echo $result['contact_no']; ?>">
										
											</div> 
											<div class="form-group">
												<label for="status">Status</label>
												<select name="status" class="form-control form-control" id="defaultSelect">
                                                    <option value="">-- Select Status --</option>
													<option value="active" <?php if($result['status'] == 'active') { ?> selected="selected"<?php } ?>>Active</option>
													<option value="inactive" <?php if($result['status'] == 'inactive') { ?> selected="selected"<?php } ?>>Inactive</option>
													</select>
											</div>
										</div>
										<div class="card-action">
											<input type="submit" name="submit" class="btn btn-success" value="Update">
											<a href="index.php" class="btn btn-danger">Back</a>

										</div>
										</div>
                                        </form>
									</div>
								</div>
							</div>
                            <div class="col-md-2"></div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
</body>
                           
<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/validate.js"></script>
				<script>
						$(document).ready(function() {$('#contact_no').keyup(function() {
				if ($(this).val().length > 10) {
					$(this).val($(this).val().slice(0, 10));
						}
				});
							

	$("#editForm").validate({
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





