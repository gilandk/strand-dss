<?php
include('include/header.php');
include('include/sidebar.php');

$sql = "SELECT * FROM school_admin";
$result = $conn->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> Facilitator</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">School</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<?php
					//If User already registered with this email then show error message.
					if (isset($_SESSION['addFacilitatorSuccess'])) {
					?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-check"></i> Success!</h5>
							Facilitator Successfully Added!
						</div>
					<?php
						unset($_SESSION['addFacilitatorSuccess']);
					}
					?>

					<?php
					//If User already registered with this email then show error message.
					if (isset($_SESSION['addFacilitatorFailed'])) {
					?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-ban"></i> Alert!</h5>
							Email Already Exist!
						</div>
					<?php
						unset($_SESSION['addFacilitatorFailed']);
					}
					?>
					<div class="card card-primary card-outline">
						<!-- /.card-header -->
						<div class="card-header">
							<button class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
								Add Facilitator
							</button>
						</div>
						<div class="card-body">
							<table id="school_facilitator" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Facilitator ID</th>
										<th>Fullname</th>
										<th>Email</th>
										<th>Position</th>
										<th>Contact</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if ($result->num_rows > 0) {
										while ($rows = $result->fetch_assoc()) {
									?>
											<tr>
												<td><?php echo $rows['sa_uid']; ?></td>
												<td><?php echo $rows['sa_fullname']; ?></td>
												<td><?php echo $rows['sa_email']; ?></td>
												<td><?php echo $rows['sa_position']; ?></td>
												<td><?php echo $rows['sa_contact']; ?></td>
												<td><span class="text-success"><?php echo $rows['sa_status']; ?></td>
												<td><a href="school_facilitator_edit.php?id=<?php echo $rows['sa_id']; ?>" class="btn btn-block btn-outline-warning btn-xs">Update</a>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>Facilitator ID</th>
										<th>Fullname</th>
										<th>Email</th>
										<th>Position</th>
										<th>Contact</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /. row -->
		</div><!-- /.container-fluid -->

		<div class=" modal fade" id="modal-lg">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Facilitator (Users)</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="add_school_admin.php" id="facilitator" method="POST" enctype="multipart/form-data">

							<div class="form-group">
								<label>Facilitator ID</label>
								<input type="number" class="form-control" placeholder="Student Number" name="f_id" />
							</div>

							<div class="form-group">
								<label>Fullname:</label>
								<input type="text" class="form-control" placeholder="Fullname" name="fname" />
							</div>

							<div class="form-group">
								<label>Email:</label>
								<input type="email" class="form-control" placeholder="Email Address" name="email" />
							</div>

							<label>Password</label>
							<div class="form-group">
								<input class="form-control" type="password" id="password" name="password" placeholder="*********" required>
							</div>

							<div class="form-group">
								<label>Confirm Password</label>
								<input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="*********" required>
							</div>
							<div id="passwordError" class="btn btn-flat btn-danger hide-me">
								Password Mismatch!!
							</div>
							<div class="form-group">
								<label>Position</label>
								<input type="text" class="form-control" placeholder="Position" name="position" required />
							</div>

							<div class="form-group">
								<label>Contact #</label>
								<input type="text" class="form-control" id="contactno" name="contact" minlength="11" maxlength="11" onkeypress="return validatePhone(event);" placeholder="Ex: 09171234567" />
							</div>

					</div>
					<div class=" modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" name="save" class="btn btn-primary">Save</button>
					</div>
					</form>

				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!-- /.modal -->


	</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php
include('include/footer.php');
?>