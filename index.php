<?php
include('conn.php');
include('header.php');
include('left_sidebar.php');


if(isset($_REQUEST['search']) && $_REQUEST['search'] == 'Search'){

	$f_name =  trim($_REQUEST['f_name']);
	$lastname =  trim($_REQUEST['lastname']);
	$email =  trim($_REQUEST['email']);
	$contact_no =  trim($_REQUEST['contact_no']);
	$status	 =  ($_REQUEST['status']);
	$conditions = array();

		if(isset($f_name) && !empty($f_name)){
			$conditions[] = "firstname like '%$f_name%'";
		}
		if(isset($lastname) && !empty($lastname)){
			$conditions[] = "lastname like '%$lastname%'";
		}
		if(isset($email) && !empty($email)){
			$conditions[] = "email like '%$email%'";
		}
		if(isset($contact_no) && !empty($contact_no)){
			$conditions[] = "contact_no like '%$contact_no%'";
		}
		if(isset($status) && !empty($status)){
			$conditions[] = "status = '$status'";
			
		}

		// Build the WHERE clause if any conditions are set
		$whereClause = (!empty($conditions)) ? "WHERE " . implode(' AND ', $conditions) : '';

		$users = "SELECT * FROM users $whereClause ORDER BY id DESC";

}else{
	$users = "SELECT * FROM users ORDER BY id DESC";
}
$exeUsers = $conn->query($users);
if(isset($Request['search']) &&$_REQUEST['search'] == 'search')
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
								        	<form class="navbar-left navbar-form nav-search mr-md-3" action="index.php" method="post">
									<!-- <div class="col-md-3"> -->
										<div class="row">
										<div class="col-md-3">
										<div class="form-group">
											<input type="text" name="f_name" value="<?php if(isset($_REQUEST['f_name']) && !empty($_REQUEST['f_name'])) { echo  $_REQUEST['f_name']; } ?>" class="form-control" placeholder="First name" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" name="lastname" value="<?php if(isset($_REQUEST['lastname']) && !empty($_REQUEST['lastname'])) { echo  $_REQUEST['lastname']; } ?>" class="form-control" placeholder="lastname" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" name="email" value="<?php if(isset($_REQUEST['email']) && !empty($_REQUEST['email'])) { echo  $_REQUEST['email']; } ?>" class="form-control" placeholder="email" />
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="text" name="contact_no" value="<?php if(isset($_REQUEST['contact_no']) && !empty($_REQUEST['contact_no'])) { echo  $_REQUEST['contact_no']; } ?>" class="form-control" placeholder="contact_no" />
										</div>
										
										</div>
										<div class="col-md-3">
											<!-- Add the select search active and inactive button here -->
											<div class="form-group">
												  	<select name="status" id="status" class="form-control">
													 <option value="">Select Status</option>
													 <option value="active">Acitive</option>
													 <option value="inactive">InAcitive</option>
												  	</select>
												</div>
												</div>
										</div>
										<div class="row">

										<div class="col-md-3">
											<!-- Add the search button here -->
											<div class="form-group">
												<input type="submit" name ="search"  value ="Search" class="btn btn-primary" />
												</div>
												</div>
										</div>
										
								</form>
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
                                                       | 
                                                        <a class="" href="view.php?id=<?php echo $row['id']; ?>">
														<i class="la la-eye"></i> </a>
														|
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
									
<!-- Your existing body content -->

<footer class="footer">
    <!-- Your existing footer content -->
</footer>
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


