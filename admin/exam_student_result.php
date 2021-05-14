<?php
include('include/header.php');
include('include/sidebar.php');

$user_id = $_REQUEST['id'];

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
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Exam Results</h1>
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

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-text-width"></i>
                Student Info
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <dl class="row">
                <div class="col-md-6">
                  <table class='table borderless'>
                    <tbody>
                      <tr>
                        <td><strong>Name:</strong></td>
                        <td><?php echo $fullname; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Email:</strong> </td>
                        <td><?php echo $user_email; ?></td>
                      </tr>
                      <tr>
                        <td><strong>Contact:</strong> </td>
                        <td><?php echo $contact; ?></td>
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
              </dl>
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
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                  $exam_id = $row['exam_id'];

                  $sql1 = "SELECT * FROM exams WHERE exam_id = '$exam_id'";
                  $result1 = $conn->query($sql1);

                  if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                      $exam_type = $row1['exam_type'];
                      $exam_date_s = $row1['exam_date_s'];
                      $exam_date_e = $row1['exam_date_e'];
                      $exam_status = $row1['exam_status'];
                      $exam_handler = $row1['exam_handler'];

                      $sql4 = "SELECT * FROM school_admin WHERE sa_id = '$exam_handler'";
                      $result4 = $conn->query($sql4);

                      if ($result4->num_rows > 0) {
                        while ($row4 = $result4->fetch_assoc()) {
                          $proctor = $row4['sa_fullname'];
                        }
                      }
              ?>
                      <dl class="row">
                        <div class="col-md-6">
                          <table class='table borderless'>
                            <tbody>
                              <tr>
                                <td><strong>Exam Type:</strong></td>
                                <td><?php echo $exam_type; ?></td>
                              </tr>
                              <tr>
                                <td><strong>Exam Date:</strong></td>
                                <td><?php echo $exam_date_s . ' - ' . $exam_date_e; ?></td>
                              </tr>

                            </tbody>
                          </table>
                        </div>
                        <div class="col-md-6">
                          <table class='table borderless'>
                            <tbody>
                              <tr>
                                <td><strong>Exam Proctor:</strong></td>
                                <td><?php echo $proctor; ?></td>

                              </tr>
                              <tr>
                                <td><strong>Exam Status:</strong></td>
                                <td><?php echo $exam_status; ?></td>

                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </dl>
                      <table class="table table-bordered table-striped cat">
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

                          $rc = 0;
                          $ca = 0;
                          $ma = 0;
                          $ms = 0;
                          $va = 0;
                          $sa = 0;
                          $lr = 0;
                          $nvr = 0;
                          $ea = 0;

                          $abm_score = 0;
                          $stem_score = 0;
                          $humss_score = 0;
                          $he_score = 0;
                          $ict_score = 0;
                          $afa_score = 0;
                          $ia_score = 0;
                          $ad_score = 0;

                          $sql2 = "SELECT * FROM exam_answers WHERE exam_id='$exam_id' AND examinee_id='$user_id'";
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

                              if ($category_id == 1) {
                                $rc = $value;
                              } else if ($category_id == 2) {
                                $ca = $value;
                              } else if ($category_id == 3) {
                                $ma = $value;
                              } else if ($category_id == 4) {
                                $ms = $value;
                              } else if ($category_id == 5) {
                                $va = $value;
                              } else if ($category_id == 6) {
                                $sa = $value;
                              } else if ($category_id == 7) {
                                $lr = $value;
                              } else if ($category_id == 8) {
                                $nvr = $value;
                              } else if ($category_id == 9) {
                                $ea = $value;
                              }

                              //abm
                              if (($ca == 0 || $ca <= 2) || ($ea == 0 || $ea <= 2) || ($rc == 0 || $rc <= 2)) {
                                $c_abm = 'Not Compatible';
                              } else if (($ca == 3 || $ca <= 5) || ($ea == 3 || $ea <= 5) || ($rc == 3 || $rc <= 5)) {
                                $c_abm = 'Average';
                              } else if (($ca == 6 || $ca <= 8) || ($ea == 6 || $ea <= 8) || ($rc == 6 || $rc <= 8)) {
                                $c_abm = 'Compatible';
                              }

                              //stem
                              if (($ma == 0 || $ma <= 2) || ($ms == 0 || $ms <= 2) || ($lr == 0 || $lr <= 2) || ($rc == 0 || $rc <= 2)) {
                                $c_stem = 'Not Compatible';
                              } else if (($ma == 3 || $ma <= 5) || ($ms == 3 || $ms <= 5) || ($lr == 3 || $lr <= 5) || ($rc == 3 || $rc <= 5)) {
                                $c_stem = 'Average';
                              } else if (($ma == 6 || $ma <= 8) || ($ms == 6 || $ms <= 8) || ($lr == 6 || $lr <= 8) || ($rc == 6 || $rc <= 8)) {
                                $c_stem = 'Compatible';
                              }

                              //humss
                              if (($va == 0 || $va <= 2) || ($nvr == 0 || $nvr <= 2) || ($ea == 0 || $ea <= 2) || ($rc == 0 || $rc <= 2)) {
                                $c_humss = 'Not Compatible';
                              } else if (($va == 3 || $va <= 5) || ($nvr == 3 || $nvr <= 5) || ($ea == 3 || $ea <= 5) || ($rc == 3 || $rc <= 5)) {
                                $c_humss = 'Average';
                              } else if (($va == 6 || $va <= 8) || ($nvr == 6 || $nvr <= 8) || ($ea == 6 || $ea <= 8) || ($rc == 6 || $rc <= 8)) {
                                $c_humss = 'Compatible';
                              }

                              //he
                              if (($va == 0 || $va <= 2) || ($nvr == 0 || $nvr <= 2) || ($ea == 0 || $ea <= 2) || ($lr == 0 || $lr <= 2) || ($rc == 0 || $rc <= 2)) {
                                $c_he = 'Not Compatible';
                              } else if (($va == 3 || $va <= 5) || ($nvr == 3 || $nvr <= 5) || ($ea == 3 || $ea <= 5) || ($lr == 3 || $lr <= 5) || ($rc == 3 || $rc <= 5)) {
                                $c_he = 'Average';
                              } else if (($va == 6 || $va <= 8) || ($nvr == 6 || $nvr <= 8) || ($ea == 6 || $ea <= 8) || ($lr == 6 || $lr <= 8) || ($rc == 6 || $rc <= 8)) {
                                $c_he = 'Compatible';
                              }

                              //ict
                              if (($va == 0 || $va <= 2) || ($nvr == 0 || $nvr <= 2) || ($ma == 0 || $ma <= 2) || ($ms == 0 || $ms <= 2) || ($rc == 0 || $rc <= 2)) {
                                $c_ict = 'Not Compatible';
                              } else if (($va == 3 || $va <= 5) || ($nvr == 3 || $nvr <= 5) || ($ma == 3 || $ma <= 5) || ($ms == 3 || $ms <= 5) || ($rc == 3 || $rc <= 5)) {
                                $c_ict = 'Average';
                              } else if (($va == 6 || $va <= 8) || ($nvr == 6 || $nvr <= 8) || ($ma == 6 || $ma <= 8) || ($ms == 6 || $ms <= 8) || ($rc == 6 || $rc <= 8)) {
                                $c_ict = 'Compatible';
                              }

                              //afa
                              if (($ms == 0 || $ms <= 2) || ($rc == 0 || $rc <= 2)) {
                                $c_afa = 'Not Compatible';
                              } else if (($ms == 3 || $ms <= 5) || ($rc == 3 || $rc <= 5)) {
                                $c_afa = 'Average';
                              } else if (($ms == 6 || $ms <= 8) || ($rc == 6 || $rc <= 8)) {
                                $c_afa = 'Compatible';
                              }

                              //ia
                              if (($ms == 0 || $ms <= 2) || ($lr == 0 || $lr <= 2) || ($rc == 0 || $rc <= 2)) {
                                $c_ia = 'Not Compatible';
                              } else if (($ms == 3 || $ms <= 5) || ($lr == 3 || $lr <= 5) || ($rc == 3 || $rc <= 5)) {
                                $c_ia = 'Average';
                              } else if (($ms == 6 || $ms <= 8) || ($lr == 6 || $lr <= 8) || ($rc == 6 || $rc <= 8)) {
                                $c_ia = 'Compatible';
                              }

                              //ad
                              if (($va == 0 || $va <= 2) || ($nvr == 0 || $nvr <= 2) || ($rc == 0 || $rc <= 2)) {
                                $c_ad = 'Not Compatible';
                              } else if (($va == 3 || $va <= 5) || ($nvr == 3 || $nvr <= 5) || ($rc == 3 || $rc <= 5)) {
                                $c_ad = 'Average';
                              } else if (($va == 6 || $va <= 8) || ($nvr == 6 || $nvr <= 8) || ($rc == 6 || $rc <= 8)) {
                                $c_ad = 'Compatible';
                              }


                              $abm_score = (($rc + $ca + $ea) / 24) * 100;
                              $stem_score = (($ma + $ms + $lr + $rc) / 32) * 100;
                              $humss_score = (($va + $nvr + $ea + $rc) / 32) * 100;
                              $he_score = (($va + $nvr + $ea + $lr + $rc) / 40) * 100;
                              $ict_score = (($va + $nvr + $ma + $ms + $rc) / 40) * 100;
                              $afa_score = (($ms + $rc) / 16) * 100;
                              $ia_score = (($ms + $lr + $rc) / 24) * 100;
                              $ad_score = (($va + $nvr + $rc) / 24) * 100;

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
                                    <td><?php echo $score . ' / ' . $cat_items; ?></td>
                                    <td><?php echo $percentile; ?> %</td>
                                    <td><?php echo $apt; ?></td>
                                  </tr>
                          <?php
                                }
                              }
                            }
                          }
                          ?>
                        </tbody>
                      </table>
              <?php
                    }
                  }
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
              <dl class="row">

                <table class='table borderless'>
                  <tbody>
                    <tr>
                      <th></th>
                      <th class="text-center">Compatibility Score</th>
                      <th class="text-center">Remark</th>
                    </tr>
                    <tr>
                      <td class="tdresize"><strong><?php echo $abm; ?></strong></td>
                      <td class="text-center"><?php echo number_format($abm_score, 2) . ' %'; ?></td>
                      <td class="text-center"><?php echo $c_abm; ?></td>
                    </tr>
                    <tr>
                      <td class="tdresize"><strong><?php echo $stem; ?></strong></td>
                      <td class="text-center"><?php echo number_format($stem_score, 2) . ' %'; ?></td>
                      <td class="text-center"><?php echo $c_stem; ?></td>
                    </tr>
                    <tr>
                      <td class="tdresize"><strong><?php echo $humss; ?></strong></td>
                      <td class="text-center"><?php echo number_format($humss_score, 2) . ' %'; ?></td>
                      <td class="text-center"><?php echo $c_humss; ?></td>
                    </tr>
                    <tr>
                      <td class="tdresize"><strong><?php echo $he; ?></strong></td>
                      <td class="text-center"><?php echo number_format($he_score, 2) . ' %'; ?></td>
                      <td class="text-center"><?php echo $c_he; ?></td>
                    </tr>
                    <tr>
                      <td class="tdresize"><strong><?php echo $ict; ?></strong></td>
                      <td class="text-center"><?php echo number_format($ict_score, 2) . ' %'; ?></td>
                      <td class="text-center"><?php echo $c_ict; ?></td>
                    </tr>
                    <tr>
                      <td class="tdresize"><strong><?php echo $afa; ?></strong></td>
                      <td class="text-center"><?php echo number_format($afa_score, 2) . ' %'; ?></td>
                      <td class="text-center"><?php echo $c_afa; ?></td>
                    </tr>
                    <tr>
                      <td class="tdresize"><strong><?php echo $ia; ?></strong></td>
                      <td class="text-center"><?php echo number_format($ia_score, 2) . ' %'; ?></td>
                      <td class="text-center"><?php echo $c_ia; ?></td>
                    </tr>
                    <tr>
                      <td class="tdresize"><strong><?php echo $ad; ?></strong></td>
                      <td class="text-center"><?php echo number_format($ad_score, 2) . ' %'; ?></td>
                      <td class="text-center"><?php echo $c_ad; ?></td>
                    </tr>

                  </tbody>
                </table>
              </dl>
            </div>
          </div>


        </div><!-- /. row -->
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