<?php
include('include/header.php');
include('include/sidebar.php');

$strand_id = $_REQUEST['id'];

$sql = "SELECT * FROM strands WHERE strand_id='$strand_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $strand_name = $row['strand_name'];
    $strand_abr = $row['strand_abr'];
    $strand_description = $row['strand_description'];
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
          <h1 class="m-0 text-dark">Student Info</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Students</li>
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
          //If User already registered with this email then show error message.
          if (isset($_SESSION['updateStrandSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Strand Successfully Update!
            </div>
          <?php
            unset($_SESSION['updateStrandSuccess']);
          }
          ?>

          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['updateStrandFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Strand Already Exist!
            </div>
          <?php
            unset($_SESSION['updateStrandFailed']);
          }
          ?>
          <div class="card card-primary card-outline">
            <div class="mt-3 ml-3 mr-3 mb-3">
              <form action="update_strand.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="strand_id" value="<?php echo $strand_id; ?>">

                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" placeholder="Strand name" name="strand_name" value="<?php echo $strand_name; ?>" />
                  <input type="hidden" name="strand2" value="<?php echo $strand_name; ?>" readonly>
                </div>

                <div class="form-group">
                  <label>Abbreviation</label>
                  <input type="text" class="form-control" placeholder="Ex: ABM, STEM" name="strand_abr" value="<?php echo $strand_abr; ?>" />
                </div>

                <div class="form-group">
                  <label>Description:</label>
                  <textarea class="textarea" name="strand_description" id="description"><?php echo $strand_description; ?></textarea>
                  <script>
                    CKEDITOR.replace('description', {
                      height: 200,
                      filebrowserUploadUrl: "upload.php",
                    });
                  </script>
                </div>

                <button type="submit" name="save" class="btn btn-primary">Save</button>
              </form>
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