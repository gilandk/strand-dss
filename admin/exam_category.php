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
          <h1 class="m-0 text-dark"> Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Category</li>
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
          if (isset($_SESSION['addCategorySuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Category Added!
            </div>
          <?php
            unset($_SESSION['addCategorySuccess']);
          }
          ?>
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['deleteCategorySuccess'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Category Deleted!
            </div>
          <?php
            unset($_SESSION['deleteCategorySuccess']);
          }
          ?>
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['addCategoryFailed'])) {
          ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Warning!</h5>
              Category title already exist!
            </div>
          <?php
            unset($_SESSION['addCategoryFailed']);
          }
          ?>
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['UpdateCategorySuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Category Successfully Updated!
            </div>
          <?php
            unset($_SESSION['UpdateCategorySuccess']);
          }
          ?>
          <div class="card card-primary card-outline">
            <!-- /.card-header -->
            <div class="card-header">
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                Add Category
              </button>
            </div>

            <div class="card-body pad table-responsive">

              <table class="table table-bordered table-striped cat">
                <thead>
                  <tr>
                    <th>Category Name</th>

                    <th class="text-center">No. of Questions</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sql = "SELECT * FROM category WHERE qs_id='$qs_id' ORDER by cat_id";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                  ?>
                      <tr>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td class="text-center"><?php echo $row['cat_items']; ?></td>
                        <td class="text-center">
                          <a href="sub_category.php?id=<?php echo $row['fc_id']; ?>&qs_id=<?php echo $qs_id; ?>" class="btn btn-block btn-outline-info btn-xs">Sub-Category</a>
                          <a href="exam_category_edit.php?id=<?php echo $row['cat_id']; ?>" class="btn btn-block btn-outline-warning btn-xs">Update</a>
                          <a href="delete_category.php?id=<?php echo $row['cat_id']; ?>&qs_id=<?php echo $qs_id; ?>" class="btn btn-block btn-outline-danger btn-xs">Delete</a>
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

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="add_category.php" method="POST" enctype="multipart/form-data">

        <?php

          $sql1 = "SELECT * FROM category WHERE qs_id = '$qs_id'";
          $result1 = $conn->query($sql1);
          $fc_id = $result->num_rows;
          $fc_id = $fc_id + 1;

        ?>

        <input type="hidden" name="qs_id" value="<?php echo $qs_id;?>" />
        <input type="hidden" name="fc_id" value="<?php echo $fc_id;?>" />

          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" name="category" />
          </div>


          <div class="form-group">
            <label>Instruction:</label>
            <textarea class="textarea" name="Instruction" id="instruction"></textarea>
            <script>
              CKEDITOR.replace('instruction', {
                height: 200,
                filebrowserUploadUrl: "upload.php",
              });
            </script>
          </div>

          <div class="form-group">
            <label>Items</label>
            <input type="number" class="form-control" placeholder="Items" name="items" />
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