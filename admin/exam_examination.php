<?php

include('include/header.php');
include('include/sidebar.php');

$sql = "SELECT * FROM exams ORDER by exam_date_s ASC";
$result = $conn->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Examination</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Examination</li>
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

          if (isset($_SESSION['addExamSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Examination Successfully Added!
            </div>
          <?php
            unset($_SESSION['addExamSuccess']);
          }
          ?>

          <?php

          if (isset($_SESSION['addExamFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Examination Failed to Add!
            </div>
          <?php
            unset($_SESSION['addExamFailed']);
          }
          ?>

          <?php

          if (isset($_SESSION['deleteExam'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Exam Deleted!
            </div>
          <?php
            unset($_SESSION['deleteExam']);
          }
          ?>
          <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-header">
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                Add Examination
              </button>
            </div>

            <div class="card-body">

              <table class="table table-bordered table-striped cat">
                <thead>
                  <tr>
                    <th>Type</th>
                    <th class="text-center">Exam Start</th>
                    <th class="text-center">Exam End</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php


                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                      $exam_id = $row['exam_id'];
                      $type = $row['exam_type'];
                      $date_s = $row['exam_date_s'];
                      $date_e = $row['exam_date_e'];
                      $status = $row['exam_status'];

                  ?>
                      <tr>
                        <td><?php echo $type; ?></td>

                        <td class="text-center"><?php echo $date_s; ?></td>
                        <td class="text-center"><?php echo $date_e; ?></td>

                        <td class="text-center">
                          <?php
                          if ($status == 'Active') {
                            $class = 'text-success';
                          } else {
                            $class = 'text-danger';
                          }
                          ?> <span class="<?php echo $class; ?>"><?php echo $status; ?></span>
                        </td>
                        <td class="text-center">
                          <a href="manage_exam.php?id=<?php echo $exam_id; ?>" class="btn btn-block btn-outline-info btn-xs">Manage</a>
                          <a href="delete_exam.php?id=<?php echo $exam_id; ?>" class="btn btn-block btn-outline-danger btn-xs">Delete</a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card-outline -->
        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Examination</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="add_exam.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label>Type</label>
            <input type="text" class="form-control" placeholder="Examination Type" name="exam_type" />
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Schedule:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                  </div>
                  <input type="text" class="form-control" id="exam_sched" name="exam_sched">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
          </div>

          <div class="form-group">
            <label>Guide:</label>
            <textarea class="textarea" name="guide" id="guide"></textarea>
            <script>
              CKEDITOR.replace('guide', {
                height: 200,
                filebrowserUploadUrl: "upload.php",
              });
            </script>
          </div>

          <div class="form-group">
          <label>Question Set:</label>
          <select name="qset" class="form-control">
          <?php 

            $sql1 = "SELECT * FROM question_set";
            $res1 = $conn->query($sql1);
   
              while($rows = $res1->fetch_assoc()){

                $qs_id = $rows['qs_id'];
                $qs_name = $rows['title'];

                ?>
                    <option value="<?php echo $qs_id; ?>"><?php echo $qs_name; ?></option>
             <?php
              }
          ?>
          </select>
          </div>


      </div><!-- /.modal-body -->

      <div class="modal-footer justify-content-between">
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
<?php
include('include/footer.php');
?>