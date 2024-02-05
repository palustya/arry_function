<?php
include('conn.php');
include('header.php');
include('left_sidebar.php');
$users = "SELECT * FROM users ORDER BY id DESC";
$exeUsers = $conn->query($users);
if (isset($_GET['delete'])=='yes') {
    $delMessage='The employee data has been removed';
}
?>		
<div class="main-panel">
				<div class="content">
					<div class="container-fluid"><?php if(@$delMessage) echo $delMessage;  ?>
						<h4 class="page-title">Tables</h4>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Form Data </div>
									</div>
									<div class="card-body">
										<div class="card-sub">		
											<?php
											if(isset($_GET['msg'])) {
												echo "<p class='c-success'>".$_GET['msg']."</p>";
											}
											?>							
											<a href="create_user.php" class="btn btn-success">
                                                Create User
                                            </a>
										</div>
										<table class="table mt-3">
											<thead>
												<tr>
													<th scope="col">ID</th> 
													<th scope="col">First Name</th>
													<th scope="col">Last Name</th>
													<th scope="col">Email</th>
                                                    <th scope="col">Contact No</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Created at</th>
                                                    <th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                $i=1;
                                                foreach($exeUsers as $row) {
                                                ?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $row['firstname']; ?></td>
													<td><?php echo $row['lastname']; ?></td>
													<td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['contact_no']; ?></td>
                                                    <td><?php echo $row['status']; ?></td>
                                                    <td><?php echo $row['created_at']; ?></td>
                                                    <td>
                                                     <a class="" href="edit.php?id=<?php echo $row['id']; ?>">
													 <i class="la la-pencil-square"></i> </a>
                                                        </td>
                                                    <td>
                                                        <a class="" href="view.php?id=<?php echo $row['id']; ?>">
														<i class="la la-eye"></i> </a>
                                                
                                                    </td>
													<td>
                                                        <a class="cDelete" href="delete.php?id=<?php echo $row['id']; ?>">
														<i class="la la-trash"></i> </a>
													
                                                    </td>
                                                <?php
                                                $i++;
                                                }	
                                            ?>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
				
                                <footer class="footer">
					<div class="container-fluid">
						<nav class="pull-left">
							<ul class="nav">
							</ul>
						</nav>
						<div class="card-body">
						<div class="copyright ml-auto">
							2024, HAPPY  DAY <i class="la la-heart heart text-danger"></i>INDIA
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
$('.cDelete').click(function(){
var checkstr =  confirm('are you sure you want to delete this?');
if(checkstr == true){
// alert('delete');
return true;
}else{

return false;
}
});
</script>