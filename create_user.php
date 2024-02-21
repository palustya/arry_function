<?php 
session_start();
include('header.php'); 
include('left_sidebar.php');
// print_r($_SESSION);
// die;

?>
<style>
	.form-group .error {
		color: red;
	}
</style>

			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Forms</h4>
						
						<div class="row">
                            <div class="col-md-2"></div>
							<div class="col-md-8">
								
									<div class="card">
									<?php
										if(isset($_SESSION['error_message'])) { ?>
											<p class="mt-3" style="color:red; text-align:center;">
												<?php echo $_SESSION['error_message'];
													  unset($_SESSION['error_message']);
												?>
											</p>
										<?php
										 }
										?>         
										  <form action="add_user.php" method="post" id="userForm">
										<div class="card-header">
											<div class="card-title"> UserForm </div>
										</div>
										<div class="card-body">
											<div class="form-group">
												<label for="First Name">First Name</label>
												<input type="text" name="first_name" class="form-control form-control-lg" id="First Name" placeholder="First Name">
											</div>
											<div class="form-group">
												<label for="last name">Last name</label>
												<input type="text" name="last_name" class="form-control form-control" id="lastname" placeholder="lastname" >
											</div>
											<div class="form-group">
												<label for="email">Email</label>
												<input type="Email" name="email" class="form-control form-control-sm" id="email" placeholder="email">
												
											</div>
											<div class="form-group">
												<label for="password">Password</label>
												<input type="password" name="password" class="form-control form-control-sm" id="pwd" placeholder="password" name="pwd" minlength="8">
											</div>
												

												<div class="form-group">
													<label for="contact_no" unique="contact_no">Contact No</label>
												 	<input type="Number" name="contact_no" class="form-control form-control-sm" id="contact_no" placeholder="contact_no">  
												</div>

												<div class="form-group">
												<label for="status">Status</label>
												<select name="status" class="form-control form-control" id="defaultSelect">
                                                <option value="">-- Select Status --</option>
												<option value="active">Active</option>
												<option value="inactive">Inactive</option>
												</select>
											</div>
										</div>
										<div class="card-action">
											<button type="submit" class="btn btn-success">Submit</button>
											<a href="index.php" class="btn btn-danger">Back</a>											
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
</html>
			<script src="assets/js/jquery.min.js"></script>
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