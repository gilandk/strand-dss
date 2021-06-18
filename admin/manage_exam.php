<?php
include('include/header.php');
include('include/sidebar.php');

$e_id = $_REQUEST['id'];

function first_char($str)
{
  if ($str)
    return strtolower(substr($str, 0, 1));

  return false;
}

$sql = "SELECT * FROM exams WHERE exam_id = '$e_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $exam_id = $row['exam_id'];
    $exam_type = $row['exam_type'];
    $exam_guide = $row['exam_guide'];
    $exam_date_s = $row['exam_date_s'];
    $exam_date_e = $row['exam_date_e'];
    $exam_status = $row['exam_status'];
    $qs_id = $row['qs_id'];
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
          <h1 class="m-0 text-dark">Manage Examination</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Manage Exam</li>
            <li class="breadcrumb-item active"><a href="exam_examination.php">Examination</a></li>
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
          <div class="card card-primary card-outline">
            <!-- Custom Tabs -->

            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">Examination Info</h3>
              <ul class="nav nav-pills ml-auto p-2" id="myTab">
                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Info</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Students</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <?php
                  //If User already registered with this email then show error message.
                  if (isset($_SESSION['UpdateExamSuccess'])) {
                  ?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-check"></i> Success!</h5>
                      Examination Info Successfully Updated!
                    </div>
                  <?php
                    unset($_SESSION['UpdateExamSuccess']);
                  }
                  ?>

                  <?php
                  //If User already registered with this email then show error message.
                  if (isset($_SESSION['UpdateExamFailed'])) {
                  ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                      Examination Info Failed to Update!
                    </div>
                  <?php
                    unset($_SESSION['UpdateExamFailed']);
                  }
                  ?>
                  <div class="row">
                    <div class="col-md-12">

                      <form action="update_examinfo.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">

                        <div class="form-group ml-2 mr-2">
                          <label>Type</label>
                          <input type="text" class="form-control" placeholder="Examination Type" name="exam_type" value="<?php echo $exam_type; ?>" />
                        </div>

                        <div class="form-group ml-2 mr-2">
                          <label>Schedule:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="text" class="form-control" id="exam_sched" name="exam_sched" value="<?php echo date("m/d/Y H:i A", strtotime($exam_date_s)) . ' - ' . date("m/d/Y H:i A", strtotime($exam_date_e)); ?>">
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->

                        <div class="form-group ml-2 mr-2">
                          <label>Examination Guide:</label>
                          <textarea class="textarea" name="guide" id="guide"><?php echo stripcslashes($exam_guide) ?></textarea>
                          <script>
                            CKEDITOR.replace('guide', {
                              height: 200,
                              filebrowserUploadUrl: "upload.php",
                            });
                          </script>
                        </div>

                        <div class="form-group ml-2 mr-2">
                          <div class="col-md-6">
                            <label>Examination Status:</label>
                            <select name="status" class="form-control">
                              <option <?php if ($exam_status == 'Active') echo 'selected'; ?>>Active</option>
                              <option <?php if ($exam_status == 'Inactive') echo 'selected'; ?>>Inactive</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group ml-2 mr-2">
                          <div class="col-md-6">
                            <label>Question Set:</label>
                            <select name="qs_id" class="form-control">
                              <?php
                              $qs = "SELECT * FROM question_set ORDER BY date_created";
                              $qsres = $conn->query($qs);
                              while ($qsr = $qsres->fetch_assoc()) {

                                if ($qs_id == $qsr['qs_id']) {
                                  $sel = 'selected';
                                } else {
                                  $sel = '';
                                }
                              ?>

                                <option <?php if ($qs_id == $qsr['qs_id']) echo 'selected'; ?> value="<?php echo $qsr['qs_id']; ?>"><?php echo $qsr['qs_title']; ?></option>

                              <?php
                              }
                              ?>

                            </select>
                          </div>
                        </div>
                        <div class="form-group ml-2 mr-2">
                          <button type="submit" name="save" class="btn btn-primary">Save</button>
                        </div>
                      </form>

                    </div>

                  </div>
                </div>


                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <div class="row">

                    <div class="col-md-9">
                      <div class="card">
                        <div class="card-body table-responsive p-0">
                          <table class="table table-hover text-nowrap">
                            <thead>
                              <tr>
                                <th hidden>ID</th>
                                <th class="text-center"></th>
                                <th class="text-center">Category</th>
                                <th class=" text-center">Hours</th>
                                <th class=" text-center">Minutes</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                              $sql1 = "SELECT * FROM category JOIN exam_category ON category.cat_id = exam_category.catID WHERE examID='$e_id' AND qs_id='$qs_id' ORDER by cat_seq ASC";
                              $result1 = $conn->query($sql1);

                              if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                              ?>
                                  <tr>
                                    <td class="text-center"><a class="confirmation" href="unset_category.php?id=<?php echo $row1['ec_id']; ?>&eid=<?php echo $exam_id; ?>"><i class=" fas fa-minus text-danger"></i></a></td>
                                    <td class="text-center"><?php echo $row1['cat_name']; ?></td>
                                    <td class="text-center edit" id="cHour_<?php echo $row1['ec_id']; ?>" contenteditable>
                                      <?php
                                      echo $row1['cHour'];
                                      ?>
                                    </td>
                                    <td class="text-center edit" id="cMin_<?php echo $row1['ec_id']; ?>" contenteditable>
                                      <?php
                                      echo $row1['cMin'];
                                      ?>
                                  </tr>
                              <?php
                                }
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div><!-- /.col-md-8 -->

                    <div class="col-md-3">
                      <div class="card">
                        <div class="card-body table-responsive p-0">
                          <table class="table table-hover text-nowrap">
                            <thead>
                              <tr>
                                <th class="text-center">Add</th>
                                <th>Category</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sql1 = "SELECT * FROM category LEFT JOIN exam_category ON category.cat_id = exam_category.catID AND exam_category.examID='$e_id' WHERE category.qs_id='$qs_id' AND exam_category.catID IS NULL ";
                              $result1 = $conn->query($sql1);

                              if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                              ?>
                                  <tr>
                                    <td class="text-center"><a class="confirmation" href="set_category.php?eid=<?php echo $exam_id; ?>&cid=<?php echo $row1['cat_id']; ?>"><i class=" fas fa-plus"></i></a></td>
                                    <td><?php echo $row1['cat_name']; ?></td>
                                  </tr>
                              <?php
                                }
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                  <div class="card">
                    <div class="card-body table-responsive p-0">
                      <table class="table table-hover text-nowrap">
                        <thead>
                          <tr>
                            <th>Full name</th>
                            <th>School</th>
                            <th>Strand Opt. 1</th>
                            <th>Strand Opt. 2</th>
                            <th>Results</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql4 = "SELECT * FROM examinee_student WHERE exam_id='$e_id'";
                          $result4 = $conn->query($sql4);

                          if ($result4->num_rows > 0) {
                            while ($row4 = $result4->fetch_assoc()) {
                              $student_id = $row4['student_id'];

                              $sql5 = "SELECT * FROM student_info WHERE user_id='$student_id'";
                              $result5 = $conn->query($sql5);
                              if ($result5->num_rows > 0) {
                                while ($row5 = $result5->fetch_assoc()) {
                          ?>
                                  <tr>
                                    <td><?php echo $row5['firstname'] . ' ' . strtoupper(first_char($row5['middlename'])) . '. ' . $row5['lastname'] . ' ' . $row5['allias']; ?></td>
                                    <td><?php echo $row5['school']; ?></td>
                                    <td><?php echo $row5['strand_opt1']; ?></td>
                                    <td><?php echo $row5['strand_opt2']; ?></td>
                                    <td><a href="exam_student_result.php?id=<?php echo $row5['user_id']; ?>&eid=<?php echo $e_id; ?>" class="btn btn-block btn-outline-primary btn-xs">Result</a></td>
                                  </tr>
                          <?php
                                }
                              }
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
              </div><!-- /.card-body -->
            </div><!-- /.card-outline -->
          </div><!-- /.col -->
        </div><!-- /. row -->
      </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>