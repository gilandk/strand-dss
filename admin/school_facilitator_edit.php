<?php
include('include/header.php');
include('include/sidebar.php');

$f_id = $_REQUEST['id'];

$sql = "SELECT * FROM school_admin WHERE sa_id='$f_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {

		$sa_uid = $row['sa_uid'];
		$sa_email = $row['sa_email'];
		$sa_pass = $row['sa_pass'];
		$fullname = $row['sa_fullname'];
		$contact = $row['sa_contact'];
		$position = $row['sa_position'];
		$status = $row['sa_status'];
	}
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Student Info</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item active">Students</li>
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
					if (isset($_SESSION['updateFacilitatorSuccess'])) {
					?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-check"></i> Success!</h5>
							Facilitator Successfully Update!
						</div>
					<?php
						unset($_SESSION['updateFacilitatorSuccess']);
					}
					?>

					<?php
					//If User already registered with this email then show error message.
					if (isset($_SESSION['updateFacilitatorFailed'])) {
					?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-ban"></i> Alert!</h5>
							Email Already Exist!
						</div>
					<?php
						unset($_SESSION['updateFacilitatorFailed']);
					}
					?>
					<div class="card card-primary card-outline">
						<div class="mt-3 ml-3 mr-3 mb-3">
							<form action="update_sa_admin.php" id="students" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="sa_id" value="<?php echo $f_id; ?>">
								<!-- Default box -->

								<div class="form-group">
									<label>Facilitator ID</label>
									<input type="text" class="form-control" placeholder="Facilitator ID" name="sa_uid" value="<?php echo $sa_uid; ?>" />
								</div>

								<div class="form-group">
									<label>Fullname</label>
									<input type="text" class="form-control" placeholder="Fullname" name="fname" value="<?php echo $fullname; ?>" />
								</div>

								<div class="form-group">
									<label>Contact #</label>
									<input type="text" class="form-control" id="contactno" name="contact" minlength="11" maxlength="11" onkeypress="return validatePhone(event);" placeholder="Ex: 09171234567" value="<?php echo $contact; ?>">
								</div>

								<div class="form-group">
									<label>Position</label>
									<input type="text" class="form-control" placeholder="Position" name="position" value="<?php echo $position; ?>" />
								</div>

								<!-- Default box -->
								<div class="card collapsed-card">
									<div class="card-header">
										<h3 class="card-title">Account Info</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
												<i class="fas fa-plus"></i></button>
										</div>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label>Email:</label>
											<input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $sa_email; ?>" />
											<input type="hidden" class="form-control" name="emailcomp" value="<?php echo $sa_email; ?>" />
										</div>

										<label>Password</label>
										<div class="form-group">
											<input class="form-control hide-me" type="password" name="oldpassword" value="<?php echo $sa_pass; ?>">
											<input class="form-control" type="password" id="password" name="newpassword" placeholder="*********">
										</div>
										<div class="form-group">
											<label>Confirm Password</label>
											<input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="*********">
										</div>
										<div id="passwordError" class="btn btn-flat btn-danger hide-me">
											Password Mismatch!!
										</div>
									</div>
									<!-- /.card-body -->
								</div>
								<!-- /.card -->

								<button type="submit" name="save" class="btn btn-primary">Save</button>
							</form>
						</div>

					</div><!-- /.card-outline -->
				</div><!-- /.col -->
			</div><!-- /. row -->
		</div><!-- /.container-fluid -->
	</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>