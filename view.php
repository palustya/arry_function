<?php
include('conn.php');
include('header.php');
include('left_sidebar.php');
$getID = $_GET['id'];
 $users = "SELECT * FROM users where id= $getID";
$exeUsers = $conn->query($users);
$row = mysqli_fetch_assoc($exeUsers);
?>

			<div class="main-panel">
				<div class="content">
					<div class="container-fluid">
						<h4 class="page-title">Tables</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Form Data </div>
									</div>
									 
										<table class="table mt-3">
											<tbody>
												<tr>
													<td>First Name</td>
                                                    <td><?php echo $row['firstname']; ?></td>
                                                </tr>
                                                <tr>
													<td>Last Name</td>
                                                    <td><?php echo $row['lastname']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo $row['email']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Contact No</td>
                                                    <td><?php echo $row['contact_no']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Status</td>
                                                    <td><?php echo $row['status']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>Created at</td>
                                                    <td><?php echo $row['created_at']; ?></td>
                                                </tr>

											</tbody>
										</table>
                                        <div class="card-action">
											<a href="index.php" class="btn btn-danger">Back</a>
										</div>
									</div>
								</div>
				
                                <footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
							<ul class="nav">
							</ul>
						</nav>
						<div class="copyright ml-auto">
							2024, HAPPY DAY <i class="la la-heart heart text-danger"></i>INDIA
						</div>				
					</div>
				</footer>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-center">									
				<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
				<p>
				<b>We'll let you know when it's done</b></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</body>

</html>
