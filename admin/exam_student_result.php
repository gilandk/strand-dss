<?php
include('include/header.php');
include('include/sidebar.php');

$user_id = $_REQUEST['id'];

$sql = "SELECT * FROM examinee_student WHERE student_id = '$user_id'";
$result = $conn->query($sql);




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
          <div class="card card-primary card-outline">
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
                      $exam_status = $row1['exam_status'];


              ?>
                      <td><?php echo $exam_type; ?></td>
                      <td><?php echo $exam_status; ?></td>
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

                          $sql2 = "SELECT * FROM exam_answers WHERE exam_id='$exam_id' AND examinee_id='$user_id'";
                          $result2 = $conn->query($sql2);

                          if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                              $category_id = $row2['category_id'];
                              $score = $row2['score'];
                              $percentile = $row2['percentile'];
                              $apt = $row2['aptitude'];
                              $value = $row2['value'];

                              $rc = 0;
                              $ca = 0;
                              $ma = 0;
                              $ms = 0;
                              $va = 0;
                              $sa = 0;
                              $lr = 0;
                              $nvr = 0;
                              $ea = 0;

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

                              if (($ca == 0 || $ca <= 3) && ($ea == 0 || $ea <= 3)) {
                                $c_abm = 'Not Compatible';
                              } else if (($ca == 4 || $ca <= 8) && ($ea == 4 || $ea <= 8)) {
                                $c_abm = 'Compatible';
                              }
                              if (($ma == 0 || $ma <= 3) && ($ms == 0 || $ms <= 3) && ($lr == 0 || $lr <= 3)) {
                                $c_stem = 'Not Compatible';
                              } else if (($ma == 4 || $ma <= 8) && ($ms == 4 || $ms <= 8) && ($lr == 4 || $lr <= 8)) {
                                $c_stem = 'Compatible';
                              }
                              if (($va == 0 || $va <= 3) && ($nvr == 0 || $nvr <= 3) && ($ea == 0 || $ea <= 3)) {
                                $c_humss = 'Not Compatible';
                              } else if (($va == 4 || $va <= 8) && ($nvr == 4 || $nvr <= 8) && ($ea == 4 || $ea <= 8)) {
                                $c_humss = 'Compatible';
                              }
                              if (($va == 0 || $va <= 3) && ($nvr == 0 || $nvr <= 3) && ($ea == 0 || $ea <= 3) && ($lr == 0 || $lr <= 3)) {
                                $c_he = 'Not Compatible';
                              } else if (($va == 4 || $va <= 8) && ($nvr == 4 || $nvr <= 8) && ($ea == 4 || $ea <= 8) && ($lr == 4 || $lr <= 8)) {
                                $c_he = 'Compatible';
                              }
                              if (($va == 0 || $va <= 3) && ($nvr == 0 || $nvr <= 3) && ($ma == 0 || $ma <= 3) && ($ms == 0 || $ms <= 3)) {
                                $c_ict = 'Not Compatible';
                              } else if (($va == 4 || $va <= 8) && ($nvr == 4 || $nvr <= 8) && ($ma == 4 || $ma <= 8) && ($ms == 4 || $ms <= 8)) {
                                $c_ict = 'Compatible';
                              }
                              if ($ms == 0 || $ms <= 3) {
                                $c_afa = 'Not Compatible';
                              } else if ($ms == 4 || $ms <= 8) {
                                $c_afa = 'Compatible';
                              }
                              if (($ms == 0 || $ms <= 3) && ($lr == 0 || $lr <= 3)) {
                                $c_ia = 'Not Compatible';
                              } else if (($ms == 4 || $ms <= 8) && ($lr == 4 || $lr <= 8)) {
                                $c_ia = 'Compatible';
                              }
                              if (($va == 0 || $va <= 3) && ($nvr == 0 || $nvr <= 3)) {
                                $c_ad = 'Not Compatible';
                              } else if (($va == 4 || $va <= 8) && ($nvr == 4 || $nvr <= 8)) {
                                $c_ad = 'Compatible';
                              }
                              if (($ca == 0 || $ca <= 3) && ($ea == 0 || $ea <= 3)) {
                                $c_abm = 'Not Compatible';
                              } else if (($ca == 4 || $ca <= 8) && ($ea == 4 || $ea <= 8)) {
                                $c_abm = 'Compatible';
                              }
                              if (($ma == 0 || $ma <= 3) && ($ms == 0 || $ms <= 3) && ($lr == 0 || $lr <= 3)) {
                                $c_stem = 'Not Compatible';
                              } else if (($ma == 4 || $ma <= 8) && ($ms == 4 || $ms <= 8) && ($lr == 4 || $lr <= 8)) {
                                $c_stem = 'Compatible';
                              }
                              if (($va == 0 || $va <= 3) && ($nvr == 0 || $nvr <= 3) && ($ea == 0 || $ea <= 3)) {
                                $c_humss = 'Not Compatible';
                              } else if (($va == 4 || $va <= 8) && ($nvr == 4 || $nvr <= 8) && ($ea == 4 || $ea <= 8)) {
                                $c_humss = 'Compatible';
                              }
                              if (($va == 0 || $va <= 3) && ($nvr == 0 || $nvr <= 3) && ($ea == 0 || $ea <= 3) && ($lr == 0 || $lr <= 3)) {
                                $c_he = 'Not Compatible';
                              } else if (($va == 4 || $va <= 8) && ($nvr == 4 || $nvr <= 8) && ($ea == 4 || $ea <= 8) && ($lr == 4 || $lr <= 8)) {
                                $c_he = 'Compatible';
                              }
                              if (($va == 0 || $va <= 3) && ($nvr == 0 || $nvr <= 3) && ($ma == 0 || $ma <= 3) && ($ms == 0 || $ms <= 3)) {
                                $c_ict = 'Not Compatible';
                              } else if (($va == 4 || $va <= 8) && ($nvr == 4 || $nvr <= 8) && ($ma == 4 || $ma <= 8) && ($ms == 4 || $ms <= 8)) {
                                $c_ict = 'Compatible';
                              }
                              if ($ms == 0 || $ms <= 3) {
                                $c_afa = 'Not Compatible';
                              } else if ($ms == 4 || $ms <= 8) {
                                $c_afa = 'Compatible';
                              }
                              if (($ms == 0 || $ms <= 3) && ($lr == 0 || $lr <= 3)) {
                                $c_ia = 'Not Compatible';
                              } else if (($ms == 4 || $ms <= 8) && ($lr == 4 || $lr <= 8)) {
                                $c_ia = 'Compatible';
                              }
                              if (($va == 0 || $va <= 3) && ($nvr == 0 || $nvr <= 3)) {
                                $c_ad = 'Not Compatible';
                              } else if (($va == 4 || $va <= 8) && ($nvr == 4 || $nvr <= 8)) {
                                $c_ad = 'Compatible';
                              }

                              $sql3 = "SELECT * FROM category WHERE cat_id = '$category_id'";
                              $result3 = $conn->query($sql3);

                              if ($result2->num_rows > 0) {
                                while ($row3 = $result3->fetch_assoc()) {
                                  $cat_name = $row3['cat_name'];
                                  $cat_items = $row3['cat_items'];

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
                          echo '<br/>';
                          echo $abm . ' - ' . $c_abm;
                          echo '<br/>';
                          echo $stem . ' - ' . $c_stem;
                          echo '<br/>';
                          echo $humss . ' - ' . $c_humss;
                          echo '<br/>';
                          echo $he  . ' - ' . $c_he;
                          echo '<br/>';
                          echo $ict . ' - ' . $c_ict;
                          echo '<br/>';
                          echo $afa . ' - ' . $c_afa;
                          echo '<br/>';
                          echo $ia . ' - ' . $c_ia;
                          echo '<br/>';
                          echo $ad . ' - ' . $c_ad;
                          echo '<br/>';
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

          </div><!-- /.card-outline -->
        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>