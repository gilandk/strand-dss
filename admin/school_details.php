<?php
include('include/header.php');
include('include/sidebar.php');

$sql = "SELECT * FROM school_info";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $s_id = $row['school_id'];
    $school = $row['school_name'];
    $address = $row['school_address'];
    $strands = $row['strands'];
    $email = $row['email'];
    $contact = $row['contact'];

    $strands = $row['strands'];
    $strands = explode(', ', $strands);
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
          <h1 class="m-0 text-dark"> Details</h1>
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
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="../dist/img/user4-128x128.jpg" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?php echo $school; ?></h3>

              <p class="text-muted text-center">Junior - Senior High</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Students</b> <a class="float-right">1000</a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Strand Offered</strong>

              <p class="text-muted">
                <?php
                foreach ($strands as $value) {
                  echo  $value . ' <br/>';
                }
                ?>
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted"><?php echo $address; ?></p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Contact Information</strong>
              <p class="text-muted"><strong>Email: </strong><?php echo $email; ?></p>

              <p class="text-muted"><strong>Contact: </strong><?php echo $contact; ?></p>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-7">
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['updateSchoolSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              School Info Successfully Updated!
            </div>
          <?php
            unset($_SESSION['updateSchoolSuccess']);
          }
          ?>

          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['updateSchoolFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              School Info Failed to Update!
            </div>
          <?php
            unset($_SESSION['updateSchoolFailed']);
          }
          ?>
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">

              <div class="tab-content">

                <div class="active tab-pane" id="settings">

                  <form class="form-horizontal" method="POST" action="update_schoolinfo.php" enctype="multipart/form-data">
                    <div class="form-group row">
                      <input type="hidden" name="s_id" value="<?php echo $s_id; ?>" />
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="school_name" class="form-control" id="inputName" placeholder="Name" value="<?php echo $school; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">Strand Offered</label>
                      <div class="col-sm-10 select2-purple">
                        <select class="select2" multiple="multiple" size="5" data-placeholder="Select Strands" autocomplete="false" name="strands[]" style="width: 100%;">

                          <?php
                          foreach ($strands as $value) {
                          ?>
                            <option <?php if ($value == $abm) echo 'selected' ?>><?php echo $abm; ?></option>
                            <option <?php if ($value == $ict) echo 'selected' ?>><?php echo $ict; ?></option>
                            <option <?php if ($value == $humss) echo 'selected' ?>><?php echo $humss; ?></option>
                            <option <?php if ($value == $stem) echo 'selected' ?>><?php echo $stem; ?></option>
                            <option <?php if ($value == $he) echo 'selected' ?>><?php echo $he; ?></option>
                            <option <?php if ($value == $ia) echo 'selected' ?>><?php echo $ia; ?></option>
                            <option <?php if ($value == $afa) echo 'selected' ?>><?php echo $afa; ?></option>
                            <option <?php if ($value == $ad) echo 'selected' ?>><?php echo $ad; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputLocation" class="col-sm-2 col-form-label">Location</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="school_address" id="inputName2" placeholder="Location" value="<?php echo $address; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" value="<?php echo $email; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputContact" class="col-sm-2 col-form-label">Contact</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="contact" id="inputEmail" placeholder="Contact" value="<?php echo $contact; ?>">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?php
include('include/footer.php');
?>