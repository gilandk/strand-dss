<?php
include('include/header.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> Strands</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">

      <?php

      $sql = "SELECT * FROM strands ORDER BY strand_id";
      $res = $conn->query($sql);

      if ($res->num_rows > 0) {
        while ($rows = $res->fetch_assoc()) {

          $name = $rows['strand_name'];
          $abr = $rows['strand_abr'];
          $desc = $rows['strand_description'];
      ?>

          <div class="card">
            <div class="card-body">
              <h2 class="card-title">
                <?php echo $name; ?> <strong>(<?php echo $abr; ?>)</strong>
              </h2>
              <p class="card-text">
                <?php echo $desc; ?>
              </p>
            </div>
          </div>
      <?php
        }
      }
      ?>

      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include('include/footer.php');
?>