<?php
include('include/header.php');

$u_id = $_SESSION['id'];

$sql = "SELECT * FROM student_info WHERE user_id='$u_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $student_id = $row['student_id'];
    $user_email = $row['user_email'];
    $user_pass = $row['user_pass'];
  }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Student Account</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['updateStudentSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Student Account Successfully Update!
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

          <!-- Main content -->
          <div class="content">
            <div class="container">
              <form action="update_saccount.php" id="students" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo $u_id; ?>">
                <!-- Default box -->
                <div class="card card-info collapse-card">
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
          </div>
          <!-- /.row -->
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include('include/footer.php');
?>