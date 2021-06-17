<?php
include('include/header.php');
include('include/sidebar.php');

$e_id = $_REQUEST['id'];

$exam = "SELECT * FROM exams WHERE exam_id ='$e_id'";
$exam_result = $conn->query($exam);

if ($exam_result->num_rows > 0) {
  while ($exam_row = $exam_result->fetch_assoc()) {
    $exam_type = $exam_row['exam_type'];
    $exam_date_s = $exam_row['exam_date_s'];
    $exam_date_e = $exam_row['exam_date_e'];
    $exam_status = $exam_row['exam_status'];
  }
}

function first_char($str)
{
  if ($str)
    return strtolower(substr($str, 0, 1));

  return false;
}

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
            <li class="breadcrumb-item active">Exam</li>
            <li class="breadcrumb-item active"><a href="analytics_c.php?">Analytics (Exam)</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-header">
          <h5 class="card-title">
            Exam
          </h5>
        </div>

        <div class="card-body">
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
                  <tr>
                    <td><strong>Exam Status:</strong></td>
                    <td><?php echo $exam_status; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-md-6">

            </div>
          </dl>
        </div>
      </div>


      <div class="row">
        <?php
        $strand = "SELECT * FROM strands ORDER BY strand_id";
        $strand_res = $conn->query($strand);

        if ($strand_res->num_rows > 0) {
          while ($rows = $strand_res->fetch_assoc()) {

            $strand_id = $rows['strand_id'];
            $strand_name = $rows['strand_name'];
            $strand_abr = $rows['strand_abr'];

        ?>
            <div class="col-md-3">
              <!-- DONUT CHART -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><strong><?php echo $strand_abr; ?></strong></h3>
                </div>
                <div class="card-body">
                  <canvas id="donutChart<?php echo $strand_id; ?>" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <?php

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

              $comp = 0;
              $notcomp = 0;
              $avecomp = 0;

              $examinee = "SELECT * FROM examinee_student WHERE exam_id='$e_id'";
              $e_result = $conn->query($examinee);
              if ($e_result->num_rows > 0) {
                while ($e_rows = $e_result->fetch_assoc()) {

                  $student_id = $e_rows['student_id'];
                  $exam_id = $e_rows['exam_id'];

                  $name = "SELECT * FROM student_info WHERE user_id = '$student_id'";
                  $name_result = $conn->query($name);

                  while ($name_row = $name_result->fetch_assoc()) {
                    $fullname = $name_row['firstname'] . ' ' . $name_row['middlename'] . ' ' . $name_row['lastname'] . ' ' . $name_row['allias'];

                    $sql = "SELECT * FROM strands WHERE strand_id = '$strand_id'";
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

                            $sql_2 = "SELECT * FROM exam_answers WHERE examinee_id='$student_id' ORDER BY category_id ASC";
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

                            // $c_1 = 5;
                            // $c_2 = 5;
                            // $c_3 = 5;
                            // $c_4 = 5;
                            // $c_5 = 5;
                            // $c_6 = 5;
                            // $c_7 = 5;
                            // $c_8 = 5;
                            // $c_9 = 5;
                            // $c_10 = 0;

                            // $total = 72;

                            $total = $total_category * 7;

                            $c_sum = ($c_1 + $c_2 + $c_3 + $c_4 + $c_5 + $c_6 + $c_7 + $c_8 + $c_9 + $c_10);

                            $strand_f = ($c_sum / $total) * 100;

                            if ($c1 == 0) {
                              $category1_1 = '';
                              $category1_2 = '';
                              $category1_3 = '';
                            } else {
                              $category1_1 = ($c_1 == 0 || $c_1 <= 2);
                              $category1_2 = ($c_1 == 3 || $c_1 <= 5);
                              $category1_3 = ($c_1 == 6 || $c_1 <= 7);
                            }

                            if ($c2 == 0) {
                              $category2_1 = '';
                              $category2_2 = '';
                              $category2_3 = '';
                            } else {
                              $category2_1 = ($c_2 == 0 || $c_2 <= 2);
                              $category2_2 = ($c_2 == 3 || $c_2 <= 5);
                              $category2_3 = ($c_2 == 6 || $c_2 <= 7);
                            }

                            if ($c3 == 0) {
                              $category3_1 = '';
                              $category3_2 = '';
                              $category3_3 = '';
                            } else {
                              $category3_1 = ($c_3 == 0 || $c_3 <= 2);
                              $category3_2 = ($c_3 == 3 || $c_3 <= 5);
                              $category3_3 = ($c_3 == 6 || $c_3 <= 7);
                            }

                            if ($c4 == 0) {
                              $category4_1 = '';
                              $category4_2 = '';
                              $category4_3 = '';
                            } else {
                              $category4_1 = ($c_4 == 0 || $c_4 <= 2);
                              $category4_2 = ($c_4 == 3 || $c_4 <= 5);
                              $category4_3 = ($c_4 == 6 || $c_4 <= 7);
                            }

                            if ($c5 == 0) {
                              $category5_1 = '';
                              $category5_2 = '';
                              $category5_3 = '';
                            } else {
                              $category5_1 = ($c_5 == 0 || $c_5 <= 2);
                              $category5_2 = ($c_5 == 3 || $c_5 <= 5);
                              $category5_3 = ($c_5 == 6 || $c_5 <= 7);
                            }

                            if ($c6 == 0) {
                              $category6_1 = '';
                              $category6_2 = '';
                              $category6_3 = '';
                            } else {
                              $category6_1 = ($c_6 == 0 || $c_6 <= 2);
                              $category6_2 = ($c_6 == 3 || $c_6 <= 5);
                              $category6_3 = ($c_6 == 6 || $c_6 <= 7);
                            }

                            if ($c7 == 0) {
                              $category7_1 = '';
                              $category7_2 = '';
                              $category7_3 = '';
                            } else {
                              $category7_1 = ($c_7 == 0 || $c_7 <= 2);
                              $category7_2 = ($c_7 == 3 || $c_7 <= 5);
                              $category7_3 = ($c_7 == 6 || $c_7 <= 7);
                            }

                            if ($c8 == 0) {
                              $category8_1 = '';
                              $category8_2 = '';
                              $category8_3 = '';
                            } else {
                              $category8_1 = ($c_8 == 0 || $c_8 <= 2);
                              $category8_2 = ($c_8 == 3 || $c_8 <= 5);
                              $category8_3 = ($c_8 == 6 || $c_8 <= 7);
                            }


                            if ($c9 == 0) {
                              $category9_1 = '';
                              $category9_2 = '';
                              $category9_3 = '';
                            } else {
                              $category9_1 = ($c_9 == 0 || $c_9 <= 2);
                              $category9_2 = ($c_9 == 3 || $c_9 <= 5);
                              $category9_3 = ($c_9 == 6 || $c_9 <= 7);
                            }

                            if ($c10 == 0) {
                              $category10_1 = '';
                              $category10_2 = '';
                              $category10_3 = '';
                            } else {
                              $category10_1 = ($c_10 == 0 || $c_10 <= 2);
                              $category10_2 = ($c_10 == 3 || $c_10 <= 5);
                              $category10_3 = ($c_10 == 6 || $c_10 <= 7);
                            }


                            if ($category1_1 || $category2_1 || $category3_1 || $category4_1 || $category5_1 || $category6_1 || $category7_1 || $category8_1 || $category9_1 || $category10_1) {
                              $strand_r = 'Not compatible';
                              $notcomp = $notcomp + 1;
                            } elseif ($category1_2 || $category2_2 || $category3_2 || $category4_2 || $category5_2 || $category6_2 || $category7_2 || $category8_2 || $category9_2 || $category10_2) {
                              $strand_r = 'Average';
                              $avecomp = $avecomp + 1;
                            } elseif ($category1_3 || $category2_3 || $category3_3 || $category4_3 || $category5_3 || $category6_3 || $category7_3 || $category8_3 || $category9_3 || $category10_3) {
                              $strand_r = 'Compatible';
                              $comp = $comp + 1;
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }

              ?>
            </div><!-- /.col -->
            <script>
              //-------------
              //- DONUT CHART -
              //-------------
              // Get context with jQuery - using jQuery's .get() method.
              var donutChartCanvas = $('#donutChart<?php echo $strand_id; ?>').get(0).getContext('2d')
              var donutData = {
                labels: ['Not Compatible', 'Average', 'Compatible'],
                datasets: [{
                  data: [<?php echo $notcomp . ', ' . $avecomp . ', ' . $comp; ?>],
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
          }
        }
        ?>
      </div><!-- /. row -->
      <div class="card">
        <div class="card-header">
          <button class="btn btn-success btn-sm" id="dlexcel"><i class="fas fa-file-export"></i> Export</button>
          <button class="btn btn-info btn-sm" onClick="window.location.reload()"><i class="fas fa-sync"></i> Refresh</button>
        </div>
        <div class="card-body">
          <div class="row">

            <div class="col-md-12">
              <table id="reportexam" class="table table-bordered">
                <thead>
                  <tr>
                    <th></th>
                    <?php
                    $strand = "SELECT * FROM strands ORDER BY strand_id";
                    $strandr = $conn->query($strand);

                    if ($strandr->num_rows > 0) {
                      while ($s_row = $strandr->fetch_assoc()) {
                        echo '<th class="text-center" colspan="2">' . $s_row['strand_abr'] . '</th>';
                      }
                    }
                    ?>
                  </tr>
                  <tr>
                    <th>Fullname</th>
                    <?php
                    $strand = "SELECT * FROM strands ORDER BY strand_id";
                    $strandr = $conn->query($strand);

                    if ($strandr->num_rows > 0) {
                      while ($s_row = $strandr->fetch_assoc()) {
                        // echo '<th class="text-center" colspan="2">' . $s_row['strand_abr'] . '</th>';
                        echo '<th class="text-center">Percentile</th>';
                        echo '<th class="text-center">Compatibility</th>';
                      }
                    }
                    ?>
                  </tr>

                </thead>
                <tbody>
                  <?php
                  $sql4 = "SELECT * FROM examinee_student WHERE exam_id='$e_id'";
                  $result4 = $conn->query($sql4);

                  if ($result4->num_rows > 0) {
                    while ($row4 = $result4->fetch_assoc()) {
                      $student_id = $row4['student_id'];

                      $sql5 = "SELECT * FROM student_info WHERE user_id='$student_id'";
                      $result5 = $conn->query($sql5);
                      if ($result5->num_rows > 0) {
                        while ($row5 = $result5->fetch_assoc()) {
                  ?>
                          <tr>
                            <td><a href="exam_student_result.php?id=<?php echo $row5['user_id']; ?>&eid=<?php echo $e_id; ?>">
                                <?php echo $row5['firstname'] . ' ' . strtoupper(first_char($row5['middlename'])) . '. ' . $row5['lastname'] . ' ' . $row5['allias']; ?>
                              </a>
                            </td>
                            <?php

                            $strand = "SELECT * FROM strands ORDER BY strand_id";
                            $rs = $conn->query($strand);
                            if (
                              $rs->num_rows > 0
                            ) {
                              while ($rowrs = $rs->fetch_assoc()) {
                                $str_id = $rowrs['strand_id'];

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

                                $comp = 0;
                                $notcomp = 0;
                                $avecomp = 0;

                                $sql = "SELECT * FROM strands WHERE strand_id='$str_id' ORDER BY strand_id";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                  while ($row_s = $result->fetch_assoc()) {

                                    $strand_name = $row_s['strand_name'];
                                    $strand_abr = $row_s['strand_abr'];
                                    $strand_id = $row_s['strand_id'];


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

                                        $sql_2 = "SELECT * FROM exam_answers WHERE exam_id='$e_id' AND examinee_id='$student_id' ORDER BY category_id ASC";
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

                                        // $c_1 = 5;
                                        // $c_2 = 5;
                                        // $c_3 = 5;
                                        // $c_4 = 5;
                                        // $c_5 = 5;
                                        // $c_6 = 5;
                                        // $c_7 = 5;
                                        // $c_8 = 5;
                                        // $c_9 = 5;
                                        // $c_10 = 0;

                                        // $total = 72;

                                        $total = $total_category * 7;

                                        $c_sum = ($c_1 + $c_2 + $c_3 + $c_4 + $c_5 + $c_6 + $c_7 + $c_8 + $c_9 + $c_10);

                                        $strand_f = ($c_sum / $total) * 100;

                                        if ($c1 == 0) {
                                          $category1_1 = '';
                                          $category1_2 = '';
                                          $category1_3 = '';
                                        } else {
                                          $category1_1 = ($c_1 == 0 || $c_1 <= 2);
                                          $category1_2 = ($c_1 == 3 || $c_1 <= 5);
                                          $category1_3 = ($c_1 == 6 || $c_1 <= 7);
                                        }

                                        if ($c2 == 0) {
                                          $category2_1 = '';
                                          $category2_2 = '';
                                          $category2_3 = '';
                                        } else {
                                          $category2_1 = ($c_2 == 0 || $c_2 <= 2);
                                          $category2_2 = ($c_2 == 3 || $c_2 <= 5);
                                          $category2_3 = ($c_2 == 6 || $c_2 <= 7);
                                        }

                                        if ($c3 == 0) {
                                          $category3_1 = '';
                                          $category3_2 = '';
                                          $category3_3 = '';
                                        } else {
                                          $category3_1 = ($c_3 == 0 || $c_3 <= 2);
                                          $category3_2 = ($c_3 == 3 || $c_3 <= 5);
                                          $category3_3 = ($c_3 == 6 || $c_3 <= 7);
                                        }

                                        if ($c4 == 0) {
                                          $category4_1 = '';
                                          $category4_2 = '';
                                          $category4_3 = '';
                                        } else {
                                          $category4_1 = ($c_4 == 0 || $c_4 <= 2);
                                          $category4_2 = ($c_4 == 3 || $c_4 <= 5);
                                          $category4_3 = ($c_4 == 6 || $c_4 <= 7);
                                        }

                                        if ($c5 == 0) {
                                          $category5_1 = '';
                                          $category5_2 = '';
                                          $category5_3 = '';
                                        } else {
                                          $category5_1 = ($c_5 == 0 || $c_5 <= 2);
                                          $category5_2 = ($c_5 == 3 || $c_5 <= 5);
                                          $category5_3 = ($c_5 == 6 || $c_5 <= 7);
                                        }

                                        if ($c6 == 0) {
                                          $category6_1 = '';
                                          $category6_2 = '';
                                          $category6_3 = '';
                                        } else {
                                          $category6_1 = ($c_6 == 0 || $c_6 <= 2);
                                          $category6_2 = ($c_6 == 3 || $c_6 <= 5);
                                          $category6_3 = ($c_6 == 6 || $c_6 <= 7);
                                        }

                                        if ($c7 == 0) {
                                          $category7_1 = '';
                                          $category7_2 = '';
                                          $category7_3 = '';
                                        } else {
                                          $category7_1 = ($c_7 == 0 || $c_7 <= 2);
                                          $category7_2 = ($c_7 == 3 || $c_7 <= 5);
                                          $category7_3 = ($c_7 == 6 || $c_7 <= 7);
                                        }

                                        if ($c8 == 0) {
                                          $category8_1 = '';
                                          $category8_2 = '';
                                          $category8_3 = '';
                                        } else {
                                          $category8_1 = ($c_8 == 0 || $c_8 <= 2);
                                          $category8_2 = ($c_8 == 3 || $c_8 <= 5);
                                          $category8_3 = ($c_8 == 6 || $c_8 <= 7);
                                        }


                                        if ($c9 == 0) {
                                          $category9_1 = '';
                                          $category9_2 = '';
                                          $category9_3 = '';
                                        } else {
                                          $category9_1 = ($c_9 == 0 || $c_9 <= 2);
                                          $category9_2 = ($c_9 == 3 || $c_9 <= 5);
                                          $category9_3 = ($c_9 == 6 || $c_9 <= 7);
                                        }

                                        if ($c10 == 0) {
                                          $category10_1 = '';
                                          $category10_2 = '';
                                          $category10_3 = '';
                                        } else {
                                          $category10_1 = ($c_10 == 0 || $c_10 <= 2);
                                          $category10_2 = ($c_10 == 3 || $c_10 <= 5);
                                          $category10_3 = ($c_10 == 6 || $c_10 <= 7);
                                        }


                                        if ($category1_1 || $category2_1 || $category3_1 || $category4_1 || $category5_1 || $category6_1 || $category7_1 || $category8_1 || $category9_1 || $category10_1) {
                                          $strand_r = 'Not compatible';
                                          $notcomp = $notcomp + 1;
                                        } elseif ($category1_2 || $category2_2 || $category3_2 || $category4_2 || $category5_2 || $category6_2 || $category7_2 || $category8_2 || $category9_2 || $category10_2) {
                                          $strand_r = 'Average';
                                          $avecomp = $avecomp + 1;
                                        } elseif ($category1_3 || $category2_3 || $category3_3 || $category4_3 || $category5_3 || $category6_3 || $category7_3 || $category8_3 || $category9_3 || $category10_3) {
                                          $strand_r = 'Compatible';
                                          $comp = $comp + 1;
                                        }
                                      }
                                    }
                            ?>
                                    <td class="text-center"><?php echo number_format($strand_f, 2) . ' %' ?> </td>
                                    <td class="text-center"><?php echo $strand_r; ?></td>

                            <?php

                                  }
                                }
                              }
                            }
                            ?>
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
        </div>
      </div>




    </div><!-- /.container-fluid -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>