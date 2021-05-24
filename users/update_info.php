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
    $firstname = $row['firstname'];
    $middlename = $row['middlename'];
    $lastname = $row['lastname'];
    $allias = $row['allias'];
    $birthdate = $row['birthdate'];
    $contact = $row['contact'];
    $school = $row['school'];
    $age = $row['age'];
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
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Student Info</h1>
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
              Student Info Successfully Update!
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
              <form action="update_sinfo.php" id="students" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?php echo $u_id; ?>">
                <!-- Default box -->
                <div class="card card-info collapse-card">
                  <div class="card-header">
                    <h3 class="card-title">Student Info</h3>
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
                <div class="card card-info collapse-card">
                  <div class="card-header">
                    <h3 class="card-title">Educational Info</h3>
                  </div>
                  <div class="card-body">

                    <div class="form-group">
                      <label>Student number</label>
                      <input type="text" class="form-control" placeholder="School/Academy/University" name="school" value="<?php echo $school; ?>" />
                    </div>

                    <div class="form-group">
                      <label>Student number</label>
                      <input type="number" class="form-control" placeholder="Student Number" name="st_id" value="<?php echo $student_id; ?>" />
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
                        <?php
                        $sql1 = "SELECT * FROM strands ORDER BY strand_id ASC";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                          while ($rows = $result1->fetch_assoc()) {

                            $strand_name = $rows['strand_name'];
                        ?>
                            <option <?php if ($strand_opt1 == $strand_name) echo 'selected' ?> value="<?php echo $strand_name; ?>"><?php echo $strand_name; ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Strand 2nd Option</label>
                      <select class="form-control" name="strand2">
                        <?php
                        $sql1 = "SELECT * FROM strands ORDER BY strand_id ASC";
                        $result1 = $conn->query($sql1);
                        if ($result1->num_rows > 0) {
                          while ($rows = $result1->fetch_assoc()) {

                            $strand_name = $rows['strand_name'];
                        ?>
                            <option <?php if ($strand_opt2 == $strand_name) echo 'selected' ?> value="<?php echo $strand_name; ?>"><?php echo $strand_name; ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                    </div>


                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="row ml-2 mb-2">
                  <button type="submit" name="save" class="btn btn-primary">Save</button>
                </div>
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