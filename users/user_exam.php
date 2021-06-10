<?php
include('include/header.php');
$userid = $_SESSION['id'];

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> My Exams</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">

      <?php

      if (isset($_SESSION['RegisterSuccess'])) {
      ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Success!</h5>
          Welcome! Please Complete you're Profile before taking the exam. <a href="profile.php">Here</a>
        </div>
      <?php
        unset($_SESSION['RegisterSuccess']);
      }
      ?>

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

          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-2"><?php echo $type; ?></h5>

              <p class="card-text">
                <i class="far fa-calendar-alt"></i> <?php echo date('F d, Y', strtotime($date_s)) . ' to ' .  date('F d, Y', strtotime($date_e)); ?>
              </p>
<<<<<<< HEAD
              <a href="exam_result.php?id=<?php echo $exam_id; ?>" class="card-link confirmation">Result</a>
=======
              <a href="exam_result.php?id=<?php echo $exam_id; ?>" class="card-link">View Results</a>
>>>>>>> develop
            </div>
          </div>

      <?php
        }
      } else {
        echo 'No Exams Taken';
      }
      ?>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include('include/footer.php');
?>