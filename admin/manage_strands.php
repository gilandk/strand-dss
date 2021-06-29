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
          <?php
          if (isset($_SESSION['addStrandSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Strand Successfully Added!
            </div>
          <?php
            unset($_SESSION['addStrandSuccess']);
          }
          ?>
          <?php
          if (isset($_SESSION['addStrandFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Strand Already Exist!
            </div>
          <?php
            unset($_SESSION['addStrandFailed']);
          }
          ?>
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['UpdateStrandSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Strand Successfully Updated!
            </div>
          <?php
            unset($_SESSION['UpdateStrandSuccess']);
          }
          ?>

          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['UpdateStrandFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Strand Failed to Update!
            </div>
          <?php
            unset($_SESSION['UpdateStrandFailed']);
          }
          ?>
          <div class="card card-primary card-outline">
            <div class="card-header">
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                Add Strand
              </button>
            </div>

            <div class="card-body pad table-responsive">

              <table class="table table-bordered table-striped cat">
                <thead>
                  <tr>
                    <th>Strand (Abbr)</th>
                    <th class="text-center">Description</th>
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
                        <td><?php echo $row['strand_description']; ?></td>
                        <td class="text-center">         
                          <a href="strand_edit.php?id=<?php echo $row['strand_id']; ?>" class="btn btn-block btn-outline-warning btn-xs">Update</a>
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

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Strand</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="add_strand.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Strand name" name="strand_name" />
          </div>

          <div class="form-group">
            <label>Abbreviation</label>
            <input type="text" class="form-control" placeholder="Ex: ABM, STEM" name="strand_abr" />
          </div>

          <div class="form-group">
            <label>Description:</label>
            <textarea class="textarea" name="strand_description" id="description"></textarea>
            <script>
              CKEDITOR.replace('description', {
                height: 200,
                filebrowserUploadUrl: "upload.php",
              });
            </script>
          </div>

      </div><!-- /.modal-body -->

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-primary">Save</button>
      </div>
      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
include('include/footer.php');
?>