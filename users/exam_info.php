<?php
include('include/header.php');

$e_id = $_REQUEST['id'];
$u_id = $_SESSION['id'];

$sql = "SELECT * FROM exams WHERE exam_id='$e_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $exam_id = $row['exam_id'];
    $guide = $row['exam_guide'];
    $type = $row['exam_type'];
    $date_s = $row['exam_date_s'];
    $date_e = $row['exam_date_e'];
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
          <h1 class="m-0 text-dark"> <?php echo $type; ?> </h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


  <!-- Main content -->
  <div class="content">
    <div class="container">
      <?php

      if (isset($_SESSION['submitExamSuccess'])) {
      ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Success!</h5>
          Examination Successfully Submit!
        </div>
      <?php
        unset($_SESSION['submitExamSuccess']);
      }
      ?>

      <?php

      if (isset($_SESSION['submitExamFailed'])) {
      ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-ban"></i> Alert!</h5>
          Examination Failed to Submit!
        </div>
      <?php
        unset($_SESSION['submitExamFailed']);
      }
      ?>

      <div class="row">

        <div class="col-md-8">
          <?php
          $sqlea = "SELECT * FROM exam_answers WHERE examinee_id = '$u_id' AND exam_id = $e_id";
          $resultea = $conn->query($sqlea);
          $countea = $resultea->num_rows;

          $sqlc = "SELECT * FROM category";
          $resultc = $conn->query($sqlc);
          $countc = $resultc->num_rows;

          if ($countea == $countc) {
            echo ' <div class="callout callout-success">
                  <p>Exam Completed!</p>
                </div>
              ';
          }
          ?>

          <div class="card">
            <div class="card-body">

              <p class="card-text">
                <i class="far fa-calendar-alt"></i> <?php echo date('F d, Y', strtotime($date_s)) . ' to ' .  date('F d, Y', strtotime($date_e)); ?>
              </p>

              <p class="card-text">
                <?php echo $guide; ?>
              </p>

              <a href="index.php" class="card-link">Back</a>
            </div>
          </div>

        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Categories</h3>

            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <?php
                $sql2 = "SELECT * FROM category JOIN exam_category ON category.cat_id = exam_category.catID WHERE examID='$e_id' ORDER by cat_seq ASC";
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                  while ($row2 = $result2->fetch_assoc()) {
                    $c_id = $row2['cat_id'];
                    $cat_name = $row2['cat_name'];
                    $cat_instruct = $row2['cat_instruct'];

                    $sql3 = "SELECT * FROM exam_answers WHERE examinee_id = '$u_id' AND category_id = $c_id";
                    $result3 = $conn->query($sql3);

                    if ($result3->num_rows > 0) {
                      while ($row3 = $result3->fetch_assoc()) {
                        $exam_status = $row3['status'];
                      }
                    } else {
                      $exam_status = 0;
                    }

                    if ($exam_status == 0) {

                ?>
                      <li class="nav-item">
                        <a href="exam.php?id=<?php echo $e_id; ?>&cid=<?php echo $c_id; ?>" class="nav-link text-primary">
                          <i class="fas fa-inbox"></i> <?php echo $cat_name; ?>
                          <span class="far fa-circle text-info float-right"></span>
                        </a>
                      </li>
                    <?php
                    } else {
                    ?>
                      <li class="nav-item">
                        <a href="exam.php?id=<?php echo $e_id; ?>&cid=<?php echo $c_id; ?>" class="nav-link disabled">
                          <i class="fas fa-inbox"></i> <?php echo $cat_name; ?>
                          <span class="far fa-check-circle text-info float-right"></span>
                        </a>
                      </li>
                <?php
                    }
                  }
                }
                ?>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php
include('include/footer.php');
?>