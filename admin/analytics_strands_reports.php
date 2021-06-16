<?php
include('include/header.php');
include('include/sidebar.php');

$s_id = $_REQUEST['id'];

$sql1 = "SELECT * FROM strands WHERE strand_id = '$s_id'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
  while ($rows1 = $result1->fetch_assoc()) {

    $strandname = $rows1['strand_name'];
    $strandabr = $rows1['strand_abr'];
    $strandid = $rows1['strand_id'];
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
          <h1 class="m-0 text-dark">Strands Reports</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Reports</li>
            <li class="breadcrumb-item active"><a href="analytics_s.php?">Analytics (Strands)</a></li>
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
              <button class="btn btn-success btn-sm" id="dlexcel"><i class="fas fa-file-export"></i> Export</button>
              <button class="btn btn-info btn-sm" onClick="window.location.reload()"><i class="fas fa-sync"></i> Refresh</button>
            </div>
            <div class="card-body">
              <table id="reportstrand" class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center" colspan="4"><?php echo $strandname; ?> (<?php echo $strandabr; ?>)</th>
                  </tr>
                  <tr>
                    <th>Name</th>
                    <th>Exam</th>
                    <th class="text-center">Compatibility Score</th>
                    <th class="text-center">Remarks</th>
                  </tr>
                </thead>
                <tbody>
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

                  $examinee = "SELECT * FROM examinee_student";
                  $e_result = $conn->query($examinee);
                  if ($e_result->num_rows > 0) {
                    while ($e_rows = $e_result->fetch_assoc()) {

                      $student_id = $e_rows['student_id'];
                      $exam_id = $e_rows['exam_id'];

                      $sqle = "SELECT * FROM exams WHERE exam_id = '$exam_id'";
                      $resulte = $conn->query($sqle);

                      while ($rowe = $resulte->fetch_assoc()) {
                        $exam_type = $rowe['exam_type'];


                        $name = "SELECT * FROM student_info WHERE user_id = '$student_id'";
                        $name_result = $conn->query($name);

                        while ($name_row = $name_result->fetch_assoc()) {
                          $fullname = $name_row['firstname'] . ' ' . $name_row['middlename'] . ' ' . $name_row['lastname'] . ' ' . $name_row['allias'];


                          $sql = "SELECT * FROM strands WHERE strand_id = '$s_id'";
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
                  ?>
                          <tr>
                            <td><?php echo $fullname; ?></td>
                            <td><?php echo $exam_type; ?></td>
                            <td class="text-center"><?php echo number_format($strand_f, 2); ?> %</td>
                            <td class="text-center"><?php echo $strand_r; ?></td>
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
          <!-- /.paste here -->

        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
</div>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php
include('include/footer.php');
?>