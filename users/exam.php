<?php
include('include/header.php');

$e_id = $_REQUEST['id'];
$c_id = $_REQUEST['id'];

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
          <h1 class="m-0 text-dark"> <?php echo $type; ?></h1>
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

      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Folders</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <?php
                $sql2 = "SELECT * FROM category JOIN exam_category ON category.cat_id = exam_category.catID WHERE examID='$e_id' ORDER by cat_seq ASC";
                $result1 = $conn->query($sql2);

                if ($result1->num_rows > 0) {
                  while ($row1 = $result1->fetch_assoc()) {
                    $cat_name = $row1['cat_name'];
                    $cat_instruct = $row1['cat_instruct'];
                ?>
                    <li class="nav-item active">
                      <a href="#" class="nav-link">
                        <i class="fas fa-inbox"></i> <?php echo $cat_name; ?>
                        <span class="badge bg-primary float-right">12</span>
                      </a>
                    </li>
                <?php
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