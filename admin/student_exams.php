<?php
include('include/header.php');
include('include/sidebar.php');

$userid = $_REQUEST['id'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Student Exams</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Student Exams</li>
            <li class="breadcrumb-item active"><a href="school_students.php">Students</a></li>
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
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>
                      Exam
                    </th>
                    <th>
                      Date
                    </th>
                    <th>

                    </th>
                  </tr>
                </thead>
                <tr>
                  <?php
                  $sql = "SELECT * FROM exams JOIN examinee_student ON exams.exam_id = examinee_student.exam_id WHERE examinee_student.student_id = '$userid'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                      $exam_id = $row['exam_id'];
                      $type = $row['exam_type'];
                      $date_s = $row['exam_date_s'];
                      $date_e = $row['exam_date_e'];

                  ?>
                      <td>
                        <?php echo $type; ?>
                      </td>
                      <td>
                        <?php echo $date_s; ?> - <?php echo $date_e; ?>
                      </td>
                      <td>
                        <a href="exam_result.php?id=<?php echo $userid; ?>&eid=<?php echo $exam_id; ?>" class="btn btn-block btn-outline-primary btn-xs">Result</a>
                      </td>
                  <?php
                    }
                  }
                  ?>
                </tr>
              </table>
            </div>
            <!-- /.paste here -->


          </div><!-- /.card-outline -->
        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>