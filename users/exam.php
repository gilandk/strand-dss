<?php
include('include/header.php');

$e_id = $_REQUEST['id'];

$sql = "SELECT * FROM exams WHERE exam_id='$e_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $exam_id = $row['exam_id'];
    $guide = $row['exam_guide'];
    $type = $row['exam_type'];
    $date_s = $row['exam_date_s'];
    $date_e = $row['exam_date_e'];
    $handler_id = $row['exam_handler'];

    $sql1 = "SELECT * FROM school_admin WHERE sa_id = '$handler_id'";
    $res1 = $conn->query($sql1);
    if ($res1->num_rows > 0) {
      while ($sa = $res1->fetch_assoc()) {

        $handler = $sa['sa_fullname'];
      }
    } else {
      $handler = 'None';
    }
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
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Layout</a></li>
            <li class="breadcrumb-item active">Top Navigation</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->


  <!-- Main content -->
  <div class="content">
    <div class="container">

      <div class="card">
        <div class="card-body">

          <p class="card-text">
            <i class="far fa-calendar-alt"></i> <?php echo date('F d, Y', strtotime($date_s)) . ' to ' .  date('F d, Y', strtotime($date_e)); ?> &nbsp; | &nbsp; <i class="fas fa-user-edit"></i> <?php echo $handler; ?>


          <p class="card-text">
            <?php echo $guide; ?>
          </p>
          <a href="exam.php?id=<?php echo $exam_id; ?>" class="card-link">Start Examination</a>
          <a href="index.php" class="card-link">Back</a>
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