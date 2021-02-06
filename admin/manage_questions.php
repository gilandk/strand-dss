<?php
include('include/header.php');
include('include/sidebar.php');

$subc_id = $_REQUEST['id'];


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Questions for ...</h1>
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
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="row mb-2">
                <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-lg">
                  Add Question
                </button>
              </div>
            </div>

            <div class="card-body pad table-responsive">
              <table class="table table-bordered table-striped cat">

                <thead>
                  <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Action</th>
                  </tr>

                </thead>
                <tbody>

                  <?php

                  $num = '1';

                  $sql = "SELECT * FROM questions WHERE q_scat = '$subc_id'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) {

                  ?>
                      <tr>
                        <td><?php echo $num;
                            $num++; ?></td>
                        <td><?php echo $rows['question']; ?></td>
                        <td>
                          <a href="category_update.php?id=<?php echo $rows['sub_id']; ?>" class="btn btn-block btn-outline-warning btn-sm">Update</a>
                        </td>
                      </tr>
                  <?php
                    }
                  }

                  ?>

                </tbody>
              </table>
            </div><!-- pad table  -->

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

          </div><!-- /.card-outline -->
        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>