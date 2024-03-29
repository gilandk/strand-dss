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
          <h1 class="m-0 text-dark"> Strands</h1>
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
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <!-- /.card-header -->


            <div class="card-body pad table-responsive">

              <table class="table table-bordered table-striped cat">
                <thead>
                  <tr>
                    <th>Strand</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM strands";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                  ?>
                      <tr>
                        <td><?php echo $row['strand_name']; ?></td>
                        <td class="text-center">
                          <a href="analytics_strands.php?id=<?php echo $row['strand_id']; ?>" class="btn btn-block btn-outline-warning btn-sm">Charts</a>
                          <a href="analytics_strands_reports.php?id=<?php echo $row['strand_id']; ?>" class="btn btn-block btn-outline-info btn-sm">Reports</a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div><!-- /.card-body -->
          </div><!-- /.card-outline -->
        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php
include('include/footer.php');
?>