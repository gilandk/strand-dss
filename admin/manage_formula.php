<?php

include('include/header.php');
include('include/sidebar.php');

$qs_id = $_REQUEST['id'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Strands</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Strands</li>
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

          <div class="card card-outline">
            <div class="card-body">

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Strand (Abbr)</th>

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
                        <td><?php echo $row['strand_name'] . ' <strong>(' . $row['strand_abr'] . ')</strong>'; ?></td>
                        <td class="text-center">
                          <a href="strand_formula.php?id=<?php echo $row['strand_id']; ?>&qid=<?php echo $qs_id; ?>" class="btn btn-block btn-outline-info btn-xs">Formula</a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div><!-- /.card-body -->

            <!-- /.paste here -->


          </div><!-- /.card-outline -->
        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php
include('include/footer.php');
?>