<?php
include('include/header.php');
include('include/sidebar.php');

$c_id = $_REQUEST['id'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Analytics</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Category</li>
            <li class="breadcrumb-item active"><a href="analytics_c.php?">Analytics (Category)</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">

      <?php
      $category = "SELECT * FROM category WHERE cat_id = '$c_id'";
      $cat_result = $conn->query($category);
      if ($cat_result->num_rows > 0) {
        while ($cat_row = $cat_result->fetch_assoc()) {
          $cat_id = $cat_row['cat_id'];
          $cat_name = $cat_row['cat_name'];
          $cat_item = $cat_row['cat_items'];
      ?>

          <div class="card">
            <div class="card-header">
              <button class="btn btn-success btn-sm" id="dlexcel"><i class="fas fa-file-export"></i> Export</button>
              <button class="btn btn-info btn-sm" onClick="window.location.reload()"><i class="fas fa-sync"></i> Refresh</button>
            </div>

            <div class="card-body">
              <table id="reportcategory" class="table table-bordered">
                <thead>
                  <tr>
                    <th colspan="5" class="text-center">
                      <?php echo $cat_name; ?>
                    </th>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <th>Exam</th>
                    <th>Percentile</th>
                    <th>Aptitude</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $very_low = 0;
                  $low = 0;
                  $below_ave = 0;
                  $low_ave = 0;
                  $ave = 0;
                  $above_ave = 0;
                  $very_high = 0;
                  $excellent = 0;

                  $students = "SELECT * FROM exam_answers WHERE category_id ='$cat_id' ORDER BY value DESC";
                  $stud_result = $conn->query($students);
                  if ($stud_result->num_rows > 0) {
                    while ($stud_row = $stud_result->fetch_assoc()) {

                      $student_id = $stud_row['examinee_id'];
                      $score = $stud_row['score'];
                      $percentile = $stud_row['percentile'];
                      $aptitude = $stud_row['aptitude'];
                      $value = $stud_row['value'];
                      $date = $stud_row['date'];
                      $exam_id = $stud_row['exam_id'];

                      if ($value == 0) {
                        $very_low++;
                      } else if ($value == 1) {
                        $low++;
                      } else if ($value == 2) {
                        $below_ave++;
                      } else if ($value == 3) {
                        $low_ave++;
                      } else if ($value == 4) {
                        $ave++;
                      } else if ($value == 5) {
                        $above_ave++;
                      } else if ($value == 6) {
                        $very_high++;
                      } else if ($value == 7) {
                        $excellent++;
                      }

                      $exam = "SELECT * FROM exams WHERE exam_id = '$exam_id'";
                      $exam_result = $conn->query($exam);

                      while ($exam_row = $exam_result->fetch_assoc()) {

                        $exam_name = $exam_row['exam_type'];


                        $name = "SELECT * FROM student_info WHERE user_id = '$student_id'";
                        $name_result = $conn->query($name);

                        while ($name_row = $name_result->fetch_assoc()) {
                          $fullname = $name_row['firstname'] . ' ' . $name_row['middlename'] . ' ' . $name_row['lastname'] . ' ' . $name_row['allias'];

                  ?>
                          <tr>
                            <td><a href="exam_student_result.php?id=<?php echo $student_id; ?>&eid=<?php echo $exam_id; ?>"><?php echo $fullname; ?> </a></td>
                            <td><?php echo $exam_name; ?></td>
                            <td><?php echo $percentile; ?></td>
                            <td><?php echo $aptitude; ?></td>
                            <td><?php echo date("d-F-Y - h:i:s A", strtotime($date)); ?></td>

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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

      <?php
        }
      }
      ?>
      <!-- /.paste here -->


    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>