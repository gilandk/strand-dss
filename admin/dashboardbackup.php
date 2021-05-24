<?php
include('include/header.php');
include('include/sidebar.php');

$sqluser = "SELECT * FROM student_info WHERE status = 'Active'";
$resultuser = $conn->query($sqluser);
$t_students = $resultuser->num_rows;

$sqlexam = "SELECT* FROM exams WHERE exam_status = 'Active'";
$resultexam = $conn->query($sqlexam);
$t_exams = $resultexam->num_rows;

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

$i_abm = 0;
$i_stem = 0;
$i_humss = 0;
$i_he = 0;
$i_ict = 0;
$i_afa = 0;
$i_ia = 0;
$i_ad = 0;

$t_abm = 0;
$t_stem = 0;
$t_humss = 0;
$t_he = 0;
$t_ict = 0;
$t_afa = 0;
$t_ia = 0;
$t_ad = 0;

$sql = "SELECT * FROM exam_answers ORDER by category_id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($rows = $result->fetch_assoc()) {
    $category_id = $rows['category_id'];
    $score = $rows['score'];
    $aptitude = $rows['aptitude'];
    $percentile = $rows['percentile'];
    $value = $rows['value'];

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

    $rc = 8;
    $ca = 7;
    $ma = 4;
    $ms = 3;
    $va = 2;
    $sa = 2;
    $lr = 1;
    $nvr = 4;
    $ea = 8;


    //abm
    if (($ca == 0 || $ca <= 2) || ($ea == 0 || $ea <= 2) || ($rc == 0 || $rc <= 2)) {
      $c_abm = 'Not Compatible';
    } else if (($ca == 3 || $ca <= 5) || ($ea == 3 || $ea <= 5) || ($rc == 3 || $rc <= 5)) {
      $c_abm = 'Average';
    } else if (($ca == 6 || $ca <= 8) || ($ea == 6 || $ea <= 8) || ($rc == 6 || $rc <= 8)) {
      $c_abm = 'Compatible';
      $i_abm = 1;
    }

    //stem
    if (($ma == 0 || $ma <= 2) || ($ms == 0 || $ms <= 2) || ($lr == 0 || $lr <= 2) || ($rc == 0 || $rc <= 2)) {
      $c_stem = 'Not Compatible';
    } else if (($ma == 3 || $ma <= 5) || ($ms == 3 || $ms <= 5) || ($lr == 3 || $lr <= 5) || ($rc == 3 || $rc <= 5)) {
      $c_stem = 'Average';
    } else if (($ma == 6 || $ma <= 8) || ($ms == 6 || $ms <= 8) || ($lr == 6 || $lr <= 8) || ($rc == 6 || $rc <= 8)) {
      $c_stem = 'Compatible';
      $i_stem = 1;
    }

    //humss
    if (($va == 0 || $va <= 2) || ($nvr == 0 || $nvr <= 2) || ($ea == 0 || $ea <= 2) || ($rc == 0 || $rc <= 2)) {
      $c_humss = 'Not Compatible';
    } else if (($va == 3 || $va <= 5) || ($nvr == 3 || $nvr <= 5) || ($ea == 3 || $ea <= 5) || ($rc == 3 || $rc <= 5)) {
      $c_humss = 'Average';
    } else if (($va == 6 || $va <= 8) || ($nvr == 6 || $nvr <= 8) || ($ea == 6 || $ea <= 8) || ($rc == 6 || $rc <= 8)) {
      $c_humss = 'Compatible';
      $i_humss = 1;
    }

    //he
    if (($va == 0 || $va <= 2) || ($nvr == 0 || $nvr <= 2) || ($ea == 0 || $ea <= 2) || ($lr == 0 || $lr <= 2) || ($rc == 0 || $rc <= 2)) {
      $c_he = 'Not Compatible';
    } else if (($va == 3 || $va <= 5) || ($nvr == 3 || $nvr <= 5) || ($ea == 3 || $ea <= 5) || ($lr == 3 || $lr <= 5) || ($rc == 3 || $rc <= 5)) {
      $c_he = 'Average';
    } else if (($va == 6 || $va <= 8) || ($nvr == 6 || $nvr <= 8) || ($ea == 6 || $ea <= 8) || ($lr == 6 || $lr <= 8) || ($rc == 6 || $rc <= 8)) {
      $c_he = 'Compatible';
      $i_he = 1;
    }

    //ict
    if (($va == 0 || $va <= 2) || ($nvr == 0 || $nvr <= 2) || ($ma == 0 || $ma <= 2) || ($ms == 0 || $ms <= 2) || ($rc == 0 || $rc <= 2)) {
      $c_ict = 'Not Compatible';
    } else if (($va == 3 || $va <= 5) || ($nvr == 3 || $nvr <= 5) || ($ma == 3 || $ma <= 5) || ($ms == 3 || $ms <= 5) || ($rc == 3 || $rc <= 5)) {
      $c_ict = 'Average';
    } else if (($va == 6 || $va <= 8) || ($nvr == 6 || $nvr <= 8) || ($ma == 6 || $ma <= 8) || ($ms == 6 || $ms <= 8) || ($rc == 6 || $rc <= 8)) {
      $c_ict = 'Compatible';
      $i_ict = 1;
    }

    //afa
    if (($ms == 0 || $ms <= 2) || ($rc == 0 || $rc <= 2)) {
      $c_afa = 'Not Compatible';
    } else if (($ms == 3 || $ms <= 5) || ($rc == 3 || $rc <= 5)) {
      $c_afa = 'Average';
    } else if (($ms == 6 || $ms <= 8) || ($rc == 6 || $rc <= 8)) {
      $c_afa = 'Compatible';
      $i_afa = 1;
    }

    //ia
    if (($ms == 0 || $ms <= 2) || ($lr == 0 || $lr <= 2) || ($rc == 0 || $rc <= 2)) {
      $c_ia = 'Not Compatible';
    } else if (($ms == 3 || $ms <= 5) || ($lr == 3 || $lr <= 5) || ($rc == 3 || $rc <= 5)) {
      $c_ia = 'Average';
    } else if (($ms == 6 || $ms <= 8) || ($lr == 6 || $lr <= 8) || ($rc == 6 || $rc <= 8)) {
      $c_ia = 'Compatible';
      $i_ia = 1;
    }

    //ad
    if (($va == 0 || $va <= 2) || ($nvr == 0 || $nvr <= 2) || ($rc == 0 || $rc <= 2)) {
      $c_ad = 'Not Compatible';
    } else if (($va == 3 || $va <= 5) || ($nvr == 3 || $nvr <= 5) || ($rc == 3 || $rc <= 5)) {
      $c_ad = 'Average';
    } else if (($va == 6 || $va <= 8) || ($nvr == 6 || $nvr <= 8) || ($rc == 6 || $rc <= 8)) {
      $c_ad = 'Compatible';
      $i_ad = 1;
    }

    $abm_score = (($rc + $ca + $ea) / 24) * 100;
    $stem_score = (($ma + $ms + $lr + $rc) / 32) * 100;
    $humss_score = (($va + $nvr + $ea + $rc) / 32) * 100;
    $he_score = (($va + $nvr + $ea + $lr + $rc) / 40) * 100;
    $ict_score = (($va + $nvr + $ma + $ms + $rc) / 40) * 100;
    $afa_score = (($ms + $rc) / 16) * 100;
    $ia_score = (($ms + $lr + $rc) / 24) * 100;
    $ad_score = (($va + $nvr + $rc) / 24) * 100;
  }
}

$t_abm += $i_abm;
$t_stem += $i_stem;
$t_humss += $i_humss;
$t_he += $i_he;
$t_ict += $i_ict;
$t_afa += $i_afa;
$t_ia += $i_ia;
$t_ad += $i_ad;

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

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!-- DONUT CHART -->
          <div class="row">


            <div class="col-md-3">
              <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-user-plus"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Active Users</span>
                  <span class="info-box-number"><?php echo $t_students; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"> <i class="fas fa-clipboard"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Active Exams</span>
                  <span class="info-box-number"><?php echo $t_exams; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Downloads</span>
                  <span class="info-box-number">114,381</span>
                </div>
                <!-- /.info-box-content -->
              </div>

            </div>

            <div class="col-md-9">
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
            </div>
          </div>

          <!-- /.paste here -->

        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
  //-------------
  //- DONUT CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
  var donutData = {
    labels: [
      'ABM',
      'STEM',
      'HUMSS',
      'HE',
      'ICT',
      'AFA',
      'IA',
      'AD'
    ],
    datasets: [{
      data: ['<?php echo $t_abm; ?>',
        '<?php echo $t_stem; ?>',
        '<?php echo $t_humss; ?>',
        '<?php echo $t_he; ?>',
        '<?php echo $t_ict; ?>',
        '<?php echo $t_afa; ?>',
        '<?php echo $t_ia; ?>',
        '<?php echo $t_ad; ?>',
      ],
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