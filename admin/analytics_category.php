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
            <li class="breadcrumb-item active">Analytics</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <?php
              $sql = "SELECT * FROM exam_answers WHERE score = (SELECT MAX(score) FROM exam_answers WHERE category_id = '$c_id') ORDER BY date ASC LIMIT 1";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                  $high_student_id = $row['examinee_id'];
                  $high_score = $row['score'];
                  $high_aptitude = $row['aptitude'];
                  $high_percentile = $row['percentile'];
                  $high_value = $row['value'];

                  $sqln = "SELECT * FROM student_info WHERE user_id = '$high_student_id'";
                  $resn = $conn->query($sqln);

                  while ($rown = $resn->fetch_assoc()) {

                    $high_fullname = $rown['firstname'] . ' ' . $rown['middlename'] . ' ' . $rown['lastname'] . ' ' . $rown['allias'];
                    $school = $rown['school'];
                    $grade = $rown['grade'];
                    $section = $rown['section'];


              ?>
                    <table class='table borderless'>
                      <tbody>
                        <tr>
                          <td><strong>Student Highest Score</strong></td>
                        </tr>
                        <tr>
                          <td><strong>Name:</strong></td>
                          <td><?php echo $high_fullname; ?></td>
                        </tr>
                        <tr>
                          <td><strong>School:</strong></td>
                          <td><?php echo $school; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Grade & Section:</strong></td>
                          <td><?php echo $grade . ' - ' . $section; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Score:</strong></td>
                          <td><?php echo $high_score; ?></td>
                        </tr>
                        <tr>
                          <td><strong>Percentile:</strong></td>
                          <td><?php echo $high_percentile; ?> %</td>
                        </tr>
                        <tr>
                          <td><strong>Aptitude:</strong></td>
                          <td><?php echo $high_aptitude; ?></td>
                        </tr>
                      </tbody>
                    </table>
              <?php

                  }
                }
              }
              ?>
            </div>
            <div class="col-md-6">
              <!-- BAR CHART -->
              <div class="chart">
                <div class="card-body">
                  <canvas id="barChart<?php echo $c_id; ?>" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

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
              <h5 class="card-title"><?php echo $cat_name; ?></h5>
            </div>

            <div class="card-body">
              <table id="analytics_categories<?php echo $cat_id; ?>" class="table">
                <thead>
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
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $exam_name; ?></td>
                            <td><?php echo $percentile; ?></td>
                            <td><?php echo $aptitude; ?></td>
                            <td><?php echo $date; ?></td>
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



          <script>
            var areaChartData = {
              labels: ['Very Low', 'Low', 'Below Average', 'Low Average', 'Average', 'Above Average', 'Very High', 'Excellent'],
              datasets: [{
                label: '<?php echo $cat_name; ?>',
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',


                data: [<?php echo $very_low . ', ' . $low . ', ' . $below_ave . ', ' . $low_ave . ', ' . $ave . ', ' . $above_ave . ', ' . $very_high . ', ' . $excellent; ?>]
              }]
            }
            //-------------
            //- BAR CHART -
            //-------------
            var barChartCanvas = $('#barChart<?php echo $cat_id; ?>').get(0).getContext('2d')
            var barChartData = jQuery.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]



            var barChartOptions = {
              responsive: true,
              maintainAspectRatio: false,
              datasetFill: false
            }

            var barChart = new Chart(barChartCanvas, {
              type: 'bar',
              data: barChartData,
              options: barChartOptions
            })
          </script>
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