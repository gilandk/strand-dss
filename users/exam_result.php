<?php
include('include/header.php');

$user_id = $_SESSION['id'];
$e_id = $_REQUEST['id'];

$sql = "SELECT * FROM examinee_student WHERE student_id = '$user_id'";
$result = $conn->query($sql);

$sqluser = "SELECT * FROM student_info WHERE user_id = '$user_id'";
$resultuser = $conn->query($sqluser);

if ($resultuser->num_rows > 0) {
  while ($rowuser = $resultuser->fetch_assoc()) {
    $student_id = $rowuser['student_id'];
    $fullname = $rowuser['firstname'] . ' ' . $rowuser['middlename'] . ' ' . $rowuser['lastname'] . ' ' . $rowuser['allias'];
    $birthdate = $rowuser['birthdate'];
    $age = $rowuser['age'];
    $contact = $rowuser['contact'];
    $user_email = $rowuser['user_email'];
    $school = $rowuser['school'];
    $grade = $rowuser['grade'];
    $section = $rowuser['section'];
    $s_year = $rowuser['s_year'];
    $strand_opt1 = $rowuser['strand_opt1'];
    $strand_opt2 = $rowuser['strand_opt2'];
    $status = $rowuser['status'];
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
          <h1 class="m-0 text-dark"> Exam Result</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-text-width"></i>
                Student Info
              </h3>
              <button class="btn btn-outline-info btn-xs float-right screen" onclick="printResult()">Print as PDF</button>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <table class='table borderless'>
                    <tbody>
                      <tr>
                        <td><strong>Name:</strong></td>
                        <td><?php echo $fullname; ?></td>
                      </tr>
                      <tr>
                        <td class="screen"><strong>Email:</strong> </td>
                        <td class="screen"><?php echo $user_email; ?></td>
                      </tr>
                      <tr>
                        <td class="screen"><strong>Contact:</strong> </td>
                        <td class="screen"><?php echo $contact; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Birthdate:</strong> </td>
                        <td><?php echo $birthdate; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Age:</strong> </td>
                        <td><?php echo $age; ?></td>
                      </tr>
                      <tr>
                        <td><strong>School:</strong> </td>
                        <td><?php echo $school; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Grade & Section:</strong> </td>
                        <td><?php echo $grade . ' - ' . $section; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Strand Option #1 </strong> </td>
                        <td><?php echo $strand_opt1; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Strand Option #2</strong></td>
                        <td><?php echo $strand_opt2; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <canvas id="donutChart" class="graph-card"></canvas>
                  </div>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div> <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-text-width"></i>
                Examination Info
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body pad table-responsive">
              <?php

              $sql1 = "SELECT * FROM exams WHERE exam_id = '$e_id'";
              $result1 = $conn->query($sql1);

              if ($result1->num_rows > 0) {
                while ($row1 = $result1->fetch_assoc()) {
                  $exam_type = $row1['exam_type'];
                  $exam_date_s = $row1['exam_date_s'];
                  $exam_date_e = $row1['exam_date_e'];
                  $exam_status = $row1['exam_status'];
              ?>
                  <div class="row">
                    <div class="col-md-6">
                      <table class='table borderless'>
                        <tbody>
                          <tr>
                            <td><strong>Exam Type:</strong></td>
                            <td><?php echo $exam_type; ?></td>
                          </tr>

                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-6">
                      <table class='table borderless'>
                        <tbody>
                          <tr>
                            <td><strong>Exam Date:</strong></td>
                            <td><?php echo $exam_date_s . ' - ' . $exam_date_e; ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-12">
                      <table class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th class="text-center">Category</th>
                            <th class="text-center">Score</th>
                            <th class="text-center">Percentile</th>
                            <th class="text-center">Aptitude</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql2 = "SELECT * FROM exam_answers WHERE exam_id='$e_id' AND examinee_id='$user_id' ORDER BY percentile DESC";
                          $result2 = $conn->query($sql2);

                          if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {

                              $category_id = $row2['category_id'];
                              $score = $row2['score'];
                              $percentile = $row2['percentile'];
                              $apt = $row2['aptitude'];
                              $value = $row2['value'];

                              extract($row2);
                              $json[] = $percentile;


                              $sql3 = "SELECT * FROM category WHERE cat_id = '$category_id'";
                              $result3 = $conn->query($sql3);

                              if ($result2->num_rows > 0) {
                                while ($row3 = $result3->fetch_assoc()) {

                                  $cat_name = $row3['cat_name'];
                                  $cat_items = $row3['cat_items'];

                                  extract($row3);
                                  $json2[] = $cat_name;
                          ?>
                                  <tr>
                                    <td><?php echo $cat_name; ?></td>
                                    <td class="text-center"><?php echo $score . ' / ' . $cat_items; ?></td>
                                    <td class="text-center"><?php echo $percentile; ?> %</td>
                                    <td class="text-center"><?php echo $apt; ?></td>
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
              <?php
                }
              }
              ?>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-text-width"></i>
                Strands
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <table class='table borderless'>
                  <tbody>
                    <tr>
                      <th></th>
                      <th class="text-center">Compatibility Score</th>
                      <th class="text-center">Remark</th>
                    </tr>

                    <?php

                    $strand = "SELECT * FROM strands ORDER BY strand_id";
                    $rs = $conn->query($strand);
                    if ($rs->num_rows > 0) {
                      while ($rowrs = $rs->fetch_assoc()) {


                        $str_id = $rowrs['strand_id'];
                    ?>

                        <?php
                        include('include/result.php');
                        ?>
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
    </div>
  </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
  // Get context with jQuery - using jQuery's .get() method.
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  var donutData = {
    labels: <?php echo json_encode($json2) ?>,
    datasets: [{
      data: <?php echo json_encode($json) ?>,
      backgroundColor: ['#f55454', '#00a669', '#f3cd12', '#00c0ef', '#4b3cbc', '#ded2d9', '#AC33FF', '#33FF8E', '#FF7F50', '#FF00FF'],
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