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
          <h1 class="m-0 text-dark"> Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Manage Examination</li>
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
          if (isset($_SESSION['addSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Category Successfully Added!
            </div>
          <?php
            unset($_SESSION['addSuccess']);
          }
          ?>

          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['addFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Category title already exist!
            </div>
          <?php
            unset($_SESSION['addFailed']);
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
                    <th class="text-center">#</th>
                    <th>Category Name</th>

                    <th class="text-center">No. of Questions</th>
                    <th class="text-center">Time Limit</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sql = "SELECT * FROM category ORDER by cat_id";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                  ?>
                      <tr>
                        <td class="text-center"><?php echo $row['cat_seq']; ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td class="text-center"><?php echo $row['cat_items']; ?></td>
                        <td class="text-center">
                          <?php
                          if (($row['time_hour']) == '0') {
                            $hour = '';
                          } else if (($row['time_hour']) == '1') {
                            $hour = '1 hour';
                          } else {
                            $hour = $row['time_hour'] . ' hours';
                          }

                          if (($row['time_minute']) == '0') {
                            $min = '';
                          } else if (($row['time_minute']) == '1') {
                            $min = '1 minute';
                          } else {
                            $min = $row['time_minute'] . ' minutes';
                          }
                          echo $hour . ' ' . $min; ?>
                        </td>


                        <td class="text-center">
                          <a href="sub_category.php?id=<?php echo $row['cat_id']; ?>" class="btn btn-block btn-outline-info btn-sm">Sub-category</a>
                          <a href="category_update.php?id=<?php echo $row['cat_id']; ?>" class="btn btn-block btn-outline-warning btn-sm">Update</a>
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

              <div class="form-group">
                <label>Category</label>
                <input type="text" class="form-control" placeholder="Category title" name="category" />
              </div>

              <div class="form-group">
                <label>Instruction:</label>
                <textarea class="textarea" name="instruction" id="instruction"></textarea>
                <script>
                  CKEDITOR.replace('instruction', {
                    height: 200,
                    filebrowserUploadUrl: "upload.php",
                  });
                </script>
              </div>

              <div class="form-group">
                <label>Items</label>
                <input type="number" class="form-control" placeholder="How many items?" name="items" max="150" />
              </div>

              <div class="form-group">
                <label>Timer:</label>
                <div class="row">
                  <div class="col-3">
                    <input type="number" class="form-control" placeholder="Hours" default-value="0" name="hours" min="0" max="24">
                  </div>
                  <div class="col-3">
                    <input type="number" class="form-control" placeholder="Minutes" name="min" min="0" max="60">
                  </div>
                </div>
              </div>
          </div>
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

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php
include('include/footer.php');
?>