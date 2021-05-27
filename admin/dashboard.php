<?php
include('include/header.php');
include('include/sidebar.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <?php
  $sqluser = "SELECT * FROM student_info WHERE status = 'Active'";
  $resultuser = $conn->query($sqluser);
  $t_students = $resultuser->num_rows;

  $sqlexam = "SELECT* FROM exams WHERE exam_status = 'Active'";
  $resultexam = $conn->query($sqlexam);
  $t_exams = $resultexam->num_rows;

  $sqlcat = "SELECT* FROM category";
  $resultcat = $conn->query($sqlcat);
  $t_cat = $resultcat->num_rows;



  $c_1 = 0;
  $c_2 = 0;
  $c_3 = 0;
  $c_4 = 0;
  $c_5 = 0;
  $c_6 = 0;
  $c_7 = 0;
  $c_8 = 0;
  $c_9 = 0;
  $c_10 = 0;

  $comp_count = 0;

  $sql = "SELECT * FROM strands ORDER BY strand_id";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row_s = $result->fetch_assoc()) {

      $strand_name = $row_s['strand_name'];
      $strand_abr = $row_s['strand_abr'];
      $strand_id = $row_s['strand_id'];

      extract($row_s);
      $json[] = $strand_abr;

      $sql_1 = "SELECT * FROM strand_formula WHERE strand_id = '$strand_id'";
      $result_1 = $conn->query($sql_1);
      if ($result_1->num_rows > 0) {
        while ($rowsf = $result_1->fetch_assoc()) {
          $s_id = $rowsf['strand_id'];
          $total_category = $rowsf['total_category'];
          $c1 = $rowsf['category1'];
          $c2 = $rowsf['category2'];
          $c3 = $rowsf['category3'];
          $c4 = $rowsf['category4'];
          $c5 = $rowsf['category5'];
          $c6 = $rowsf['category6'];
          $c7 = $rowsf['category7'];
          $c8 = $rowsf['category8'];
          $c9 = $rowsf['category9'];
          $c10 = $rowsf['category10'];

          $sql_2 = "SELECT * FROM exam_answers ORDER by category_id ASC";
          $result_2 = $conn->query($sql_2);

          if ($result_2->num_rows > 0) {
            while ($row_2 = $result_2->fetch_assoc()) {

              $c_id = $row_2['category_id'];
              $c_value = $row_2['value'];


              if ($c_id == $c1) {
                $c_1 = $c_value;
              } else if ($c_id == $c2) {
                $c_2 = $c_value;
              } else if ($c_id == $c3) {
                $c_3 = $c_value;
              } else if ($c_id == $c4) {
                $c_4 = $c_value;
              } else if ($c_id == $c5) {
                $c_5 = $c_value;
              } else if ($c_id == $c6) {
                $c_6 = $c_value;
              } else if ($c_id == $c7) {
                $c_7 = $c_value;
              } else if ($c_id == $c8) {
                $c_8 = $c_value;
              } else if ($c_id == $c9) {
                $c_9 = $c_value;
              } else if ($c_id == $c10) {
                $c_10 = $c_value;
              }

              // echo $c_id;
            }
          }
          // echo '<br/>';
          // echo $c1 . $c2 . $c3 . $c4 . $c5 . $c6 . $c7 . $c8 . $c9 . $c10;
          // echo '<br/>';

          // echo '<br/>';
          // echo '<br/>';
          // $c1 = 1;
          // $c2 = 2;
          // $c3 = 3;
          // $c4 = 4;
          // $c5 = 5;
          // $c6 = 6;
          // $c7 = 7;
          // $c8 = 8;
          // $c9 = 9;
          // $c10 = 0;


          // $c_1 = 8;
          // $c_2 = 8;
          // $c_3 = 8;
          // $c_4 = 8;
          // $c_5 = 8;
          // $c_6 = 8;
          // $c_7 = 8;
          // $c_8 = 8;
          // $c_9 = 8;
          // $c_10 = 0;

          // $total = 72;

          $total = $total_category * 8;

          $c_sum = ($c_1 + $c_2 + $c_3 + $c_4 + $c_5 + $c_6 + $c_7 + $c_8 + $c_9 + $c_10);

          $strand_f = ($c_sum / $total) * 100;

          if ($c1 == 0) {
            $category1_1 = '';
            $category1_2 = '';
            $category1_3 = '';
          } else {
            $category1_1 = ($c_1 == 0 || $c_1 <= 2);
            $category1_2 = ($c_1 == 3 || $c_1 <= 5);
            $category1_3 = ($c_1 == 6 || $c_1 <= 8);
          }

          if ($c2 == 0) {
            $category2_1 = '';
            $category2_2 = '';
            $category2_3 = '';
          } else {
            $category2_1 = ($c_2 == 0 || $c_2 <= 2);
            $category2_2 = ($c_2 == 3 || $c_2 <= 5);
            $category2_3 = ($c_2 == 6 || $c_2 <= 8);
          }

          if ($c3 == 0) {
            $category3_1 = '';
            $category3_2 = '';
            $category3_3 = '';
          } else {
            $category3_1 = ($c_3 == 0 || $c_3 <= 2);
            $category3_2 = ($c_3 == 3 || $c_3 <= 5);
            $category3_3 = ($c_3 == 6 || $c_3 <= 8);
          }

          if ($c4 == 0) {
            $category4_1 = '';
            $category4_2 = '';
            $category4_3 = '';
          } else {
            $category4_1 = ($c_4 == 0 || $c_4 <= 2);
            $category4_2 = ($c_4 == 3 || $c_4 <= 5);
            $category4_3 = ($c_4 == 6 || $c_4 <= 8);
          }

          if ($c5 == 0) {
            $category5_1 = '';
            $category5_2 = '';
            $category5_3 = '';
          } else {
            $category5_1 = ($c_5 == 0 || $c_5 <= 2);
            $category5_2 = ($c_5 == 3 || $c_5 <= 5);
            $category5_3 = ($c_5 == 6 || $c_5 <= 8);
          }

          if ($c6 == 0) {
            $category6_1 = '';
            $category6_2 = '';
            $category6_3 = '';
          } else {
            $category6_1 = ($c_6 == 0 || $c_6 <= 2);
            $category6_2 = ($c_6 == 3 || $c_6 <= 5);
            $category6_3 = ($c_6 == 6 || $c_6 <= 8);
          }

          if ($c7 == 0) {
            $category7_1 = '';
            $category7_2 = '';
            $category7_3 = '';
          } else {
            $category7_1 = ($c_7 == 0 || $c_7 <= 2);
            $category7_2 = ($c_7 == 3 || $c_7 <= 5);
            $category7_3 = ($c_7 == 6 || $c_7 <= 8);
          }

          if ($c8 == 0) {
            $category8_1 = '';
            $category8_2 = '';
            $category8_3 = '';
          } else {
            $category8_1 = ($c_8 == 0 || $c_8 <= 2);
            $category8_2 = ($c_8 == 3 || $c_8 <= 5);
            $category8_3 = ($c_8 == 6 || $c_8 <= 8);
          }


          if ($c9 == 0) {
            $category9_1 = '';
            $category9_2 = '';
            $category9_3 = '';
          } else {
            $category9_1 = ($c_9 == 0 || $c_9 <= 2);
            $category9_2 = ($c_9 == 3 || $c_9 <= 5);
            $category9_3 = ($c_9 == 6 || $c_9 <= 8);
          }

          if ($c10 == 0) {
            $category10_1 = '';
            $category10_2 = '';
            $category10_3 = '';
          } else {
            $category10_1 = ($c_10 == 0 || $c_10 <= 2);
            $category10_2 = ($c_10 == 3 || $c_10 <= 5);
            $category10_3 = ($c_10 == 6 || $c_10 <= 8);
          }


          if ($category1_1 || $category2_1 || $category3_1 || $category4_1 || $category5_1 || $category6_1 || $category7_1 || $category8_1 || $category9_1 || $category10_1) {
            $strand_r = 'Not compatible';
          } elseif ($category1_2 || $category2_2 || $category3_2 || $category4_2 || $category5_2 || $category6_2 || $category7_2 || $category8_2 || $category9_2 || $category10_2) {
            $strand_r = 'Average';
          } elseif ($category1_3 || $category2_3 || $category3_3 || $category4_3 || $category5_3 || $category6_3 || $category7_3 || $category8_3 || $category9_3 || $category10_3) {
            $strand_r = 'Compatible';
            $comp_count = 1;
          }

          //end
          $strand_t[] = array($comp_count);
        }
      }
      // echo $strand_id;
      // echo '<br/>';
      // echo $strand_r;
      // echo '<br/>';
      // print_r($strand_t);
      // echo '<br/>';
      // echo $strand_t += $comp_count;

    }
  }


  ?>

  <section class="content">
    <div class="container-fluid">

      <!-- Info boxes -->
      <div class="row">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">
                <?php echo $t_students; ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-clipboard"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Exams</span>
              <span class="info-box-number"><?php echo $t_exams; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-clipboard-list"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Categories</span>
              <span class="info-box-number"><?php echo $t_exams; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <!-- DONUT CHART -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Strands</h3>
            </div>
            <div class="card-body">
              <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Categories</th>
                      <th class="text-center">Progress</th>
                      <th class="text-center">Questions</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    if ($resultcat->num_rows > 0) {
                      while ($rowc = $resultcat->fetch_assoc()) {

                        $cat_id = $rowc['cat_id'];
                        $cat_name = $rowc['cat_name'];
                        $cat_item = $rowc['cat_items'];

                        $sqlq = "SELECT * FROM questions WHERE q_cat = '$cat_id' ";
                        $resq = $conn->query($sqlq);
                        $q_count = $resq->num_rows;

                        $progress = ($q_count / $cat_item) * 100;

                        if (($progress == 0) || ($progress <= 30)) {
                          $color = 'danger';
                        } else if (($progress == 31) || ($progress <= 50)) {
                          $color = 'warning';
                        } else if (($progress == 51) || ($progress <= 99)) {
                          $color = 'primary';
                        } else if ($progress == 100) {
                          $color = 'success';
                        }


                    ?>
                        <tr>
                          <td><?php echo $cat_name; ?></td>
                          <td class="text-center">
                            <div class="progress progress-xs">
                              <div class="progress-bar bg-<?php echo $color; ?>" style="width: <?php echo $progress; ?>%"></div>
                            </div>
                          </td>
                          <td class="text-center"><?php echo $q_count . ' / ' . $cat_item; ?></td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="col-md-6">
              <div class="card">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Student Name</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $sql_es = "SELECT * FROM examinee_student ORDER BY date_taken";
                    $res_es = $conn->query($sql_es);

                    if ($res_es->num_rows > 0) {
                      while ($row_es = $res_es->fetch_assoc()) {

                        $student_id = $row_es['student_id'];
                        $exam_id = $row_es['exam_id'];
                        $exam_status = $row_es['exam_status'];
                        $date_taken = $row_es['date_taken'];

                        $sqlu = "SELECT * FROM student_info WHERE user_id = '$student_id' ";
                        $resu = $conn->query($sqlu);

                        if ($resu->num_rows > 0) {
                          while ($rowu = $resu->fetch_assoc()) {

                            $fullname = $rowu['firstname'] . ' ' . $rowu['middlename'] . ' ' . $rowu['lastname'] . ' ' . $rowu['allias'];

                    ?>
                            <tr>
                              <td><?php echo $fullname; ?></td>
                              <td class="text-center"><?php echo $exam_status; ?></td>
                              <td class="text-center"><?php echo $date_taken; ?></td>
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

            <!-- /.paste here -->

          </div><!-- /.col -->
        </div><!-- /. row -->
      </div><!-- /.container-fluid -->
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
  //-------------
  //- DONUT CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  var donutData = {
    labels: <?php echo json_encode($json); ?>,
    datasets: [{
      data: <?php echo json_encode($strand_t); ?>,
      backgroundColor: ['#f55454', '#00a669', '#f3cd12', '#00c0ef', '#4b3cbc', '#ded2d9', '#AC33FF', '#33FF8E'],
    }]
  }
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true,
  }
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  var donutChart = new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  })
</script>
<?php
include('include/footer.php');
?>