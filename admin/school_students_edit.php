<?php
include('include/header.php');
include('include/sidebar.php');

$u_id = $_REQUEST['id'];

$sql = "SELECT * FROM student_info WHERE user_id='$u_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {

		$student_id = $row['student_id'];
		$user_email = $row['user_email'];
		$user_pass = $row['user_pass'];
		$firstname = $row['firstname'];
		$middlename = $row['middlename'];
		$lastname = $row['lastname'];
		$allias = $row['allias'];
		$birthdate = $row['birthdate'];
		$contact = $row['contact'];
		$age = $row['age'];
		$school = $row['school'];
		$grade = $row['grade'];
		$section = $row['section'];
		$s_year = $row['s_year'];
		$strand_opt1 = $row['strand_opt1'];
		$strand_opt2 = $row['strand_opt2'];
		$status = $row['status'];
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
					if (isset($_SESSION['updateStudentSuccess'])) {
					?>
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-check"></i> Success!</h5>
							Student Successfully Update!
						</div>
					<?php
						unset($_SESSION['updateStudentSuccess']);
					}
					?>

					<?php
					//If User already registered with this email then show error message.
					if (isset($_SESSION['updateStudentFailed'])) {
					?>
						<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h5><i class="icon fas fa-ban"></i> Alert!</h5>
							Email Already Exist!
						</div>
					<?php
						unset($_SESSION['updateStudentFailed']);
					}
					?>
					<div class="card card-primary card-outline">
						<div class="mt-3 ml-3 mr-3 mb-3">
							<form action="update_student.php" id="students" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="user_id" value="<?php echo $u_id; ?>">
								<!-- Default box -->
								<div class="card collapsed-card">
									<div class="card-header">
										<h3 class="card-title">Student Info</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
												<i class="fas fa-plus"></i></button>
										</div>
									</div>
									<div class="card-body">


										<div class="row">
											<!-- fullname -->
											<div class="col-sm-3">
												<div class="form-group">
													<label>First name</label>
													<input type="text" class="form-control" placeholder="First name" name="fname" value="<?php echo $firstname; ?>" />
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Middle name</label>
													<input type="text" class="form-control" placeholder="Middle name" name="mname" value="<?php echo $middlename; ?>" />
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Last name</label>
													<input type="text" class="form-control" placeholder="Last name" name="lname" value="<?php echo $lastname; ?>" />
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<label>Allias</label>
													<input type="text" class="form-control" placeholder="Allias" name="allias" value="<?php echo $allias; ?>" />
												</div>
											</div>

										</div> <!-- fullname -->

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Birthdate</label>
													<input type="date" class="form-control" id="birthdate" min="1960-01-01" name="birthdate" value="<?php echo $birthdate; ?>">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Age</label>
													<input type="number" class="form-control" placeholder="Age" name="age" id="age" value="<?php echo $age; ?>" readonly />
												</div>
											</div>
										</div>

										<div class="form-group">
											<label>Contact #</label>
											<input type="text" class="form-control" id="contactno" name="contact" minlength="11" maxlength="11" onkeypress="return validatePhone(event);" placeholder="Ex: 09171234567" value="<?php echo $contact; ?>">
										</div>

									</div>
									<!-- /.card-body -->
								</div>
								<!-- /.card -->

								<!-- Default box card-primary collapsed-card -->
								<div class="card collapsed-card">
									<div class="card-header">
										<h3 class="card-title">Educational Info</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
												<i class="fas fa-plus"></i></button>
										</div>
									</div>
									<div class="card-body">

										<div class="form-group">
											<label>Student number</label>
											<input type="number" class="form-control" placeholder="Student Number" name="st_id" value="<?php echo $student_id; ?>" />
										</div>

										<div class="form-group">
											<label>School</label>
											<input type="text" class="form-control" placeholder="School" name="school" value="<?php echo $school; ?>" />
										</div>

										<div class="row">
											<div class="col-md-4">
												<div class="form-group">
													<label>Grade</label>
													<input type="text" class="form-control" placeholder="Grade" name="grade" value="<?php echo $grade; ?>" />
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label>Section</label>
													<input type="text" class="form-control" placeholder="Section" name="section" value="<?php echo $section; ?>" />
												</div>
											</div>

											<div class="col-md-4">
												<div class="form-group">
													<label>School Year</label>
													<select class="form-control" name="s_year">
														<?php
														$date2 = date('Y', strtotime('+1 Years'));
														for ($i = date('Y'); $i < $date2 + 10; $i++) {
															$opt_syear = $i . ' - ' . ($i + 1);
														?>
															<option <?php if ($s_year == $opt_syear) echo "selected" ?>><?php echo $opt_syear; ?></option>
														<?php
														}
														?>
													</select>
												</div>
											</div>

										</div>


										<div class=" form-group">
											<label>Strand 1st Option</label>
											<select class="form-control" name="strand1">
												<option <?php if ($strand_opt1 == $abm) echo "selected" ?>>Accountancy, Business and Management (ABM)</option>
												<option <?php if ($strand_opt1 == $stem) echo "selected" ?>>Science Technology Engineering and Mathematics (STEM)</option>
												<option <?php if ($strand_opt1 == $he) echo "selected" ?>>Home Economics</option>
												<option <?php if ($strand_opt1 == $ict) echo "selected" ?>>Information and Communication Technology (ICT)</option>
												<option <?php if ($strand_opt1 == $afa) echo "selected" ?>>Agri-Fishery Arts</option>
												<option <?php if ($strand_opt1 == $ia) echo "selected" ?>>Industrial Arts</option>
												<option <?php if ($strand_opt1 == $ad) echo "selected" ?>>Arts and Design</option>
											</select>
										</div>

										<div class="form-group">
											<label>Strand 2nd Option</label>
											<select class="form-control" name="strand2">
												<option <?php if ($strand_opt2 == $abm) echo "selected" ?>>Accountancy, Business and Management (ABM)</option>
												<option <?php if ($strand_opt2 == $stem) echo "selected" ?>>Science Technology Engineering and Mathematics (STEM)</option>
												<option <?php if ($strand_opt2 == $he) echo "selected" ?>>Home Economics</option>
												<option <?php if ($strand_opt2 == $ict) echo "selected" ?>>Information and Communication Technology (ICT)</option>
												<option <?php if ($strand_opt2 == $afa) echo "selected" ?>>Agri-Fishery Arts</option>
												<option <?php if ($strand_opt2 == $ia) echo "selected" ?>>Industrial Arts</option>
												<option <?php if ($strand_opt2 == $ad) echo "selected" ?>>Arts and Design</option>
											</select>
										</div>


									</div>
									<!-- /.card-body -->
								</div>
								<!-- /.card -->

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
											<input type="email" class="form-control" placeholder="Email Address" name="email" value="<?php echo $user_email; ?>" />
											<input type="hidden" class="form-control" name="emailcomp" value="<?php echo $user_email; ?>" />
										</div>

										<label>Password</label>
										<div class="form-group">
											<input class="form-control hide-me" type="password" name="oldpassword" value="<?php echo $user_pass; ?>">
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