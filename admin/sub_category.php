<?php

include('include/header.php');
include('include/sidebar.php');

$c_id = $_REQUEST['id'];

$total_items = '0';

$sql = "SELECT * FROM category WHERE cat_id = '$c_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $id = $row['cat_id'];
    $seq = $row['cat_seq'];
    $title = $row['cat_name'];
    $instruct = $row['cat_instruct'];
    $items = $row['cat_items'];

    $sql3 = "SELECT COUNT(*) as total_items FROM questions WHERE q_cat = '$id'";
    $res3 = $conn->query($sql3);
    $rowt = $res3->fetch_assoc();
    $total_items = $rowt['total_items'];
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
          <h1 class="m-0 text-dark">Sub Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Sub Category</li>
            <li class="breadcrumb-item"><a href="exam_category.php">Category</a></li>
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
          if (isset($_SESSION['addSCSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Sub-Category Added!
            </div>
          <?php
            unset($_SESSION['addSCSuccess']);
          }
          ?>
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['updateSCSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Category Successfully Added!
            </div>
          <?php
            unset($_SESSION['updateSCSuccess']);
          }
          ?>

          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['updateSCFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Category title already exist!
            </div>
          <?php
            unset($_SESSION['updateSCFailed']);
          }
          ?>
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['deleteSCSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Alert!</h5>
              Sub-Category Deleted!
            </div>
          <?php
            unset($_SESSION['deleteSCSuccess']);
          }
          ?>
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['addSCFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Warning!</h5>
              Sub-Category title already exist!
            </div>
          <?php
            unset($_SESSION['addSCFailed']);
          }
          ?>


          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-6">
                  <?php echo $title; ?> <br />
                  <?php echo $total_items . ' / ' . $items; ?>
                </div>
                <div class="col-sm-6">
                  <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-lg">
                    Add Sub Category
                  </button>
                </div>
              </div>
            </div>

            <div class="card-body pad table-responsive">
              <table class="table table-bordered table-striped cat">

                <thead>
                  <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th class="text-center">Items</th>
                    <th class="text-center">Action</th>
                  </tr>

                </thead>
                <tbody>

                  <?php
                  $sql1 = "SELECT * FROM sub_category WHERE main_cat = '$id'";
                  $res1 = $conn->query($sql1);

                  if ($res1->num_rows > 0) {
                    while ($rows = $res1->fetch_assoc()) {
                      $sub_id = $rows['sub_id'];

                      $sql2 = "SELECT Count(*) As sc_items FROM questions WHERE q_scat = '$sub_id'";
                      $res2 = $conn->query($sql2);
                      $rowc = $res2->fetch_assoc();
                      $sc_items = $rowc['sc_items'];

                  ?>
                      <tr>
                        <td><?php echo $rows['sc_index']; ?></td>
                        <td><?php echo $rows['sub_title']; ?></td>
                        <td class="text-center"><?php echo $sc_items; ?></td>
                        <td class="text-center">

                          <a href="manage_questions.php?id=<?php echo $rows['sub_id']; ?>" class="btn btn-outline-success btn-sm">Questions</a>
                          <a href="subcat_edit.php?id=<?php echo $rows['sub_id']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                          <a href="delete_subcategory.php?id=<?php echo $rows['sub_id']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div><!-- pad table  -->
          </div><!-- /.card-outline -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Sub-Category</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="add_subcategory.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="main_id" value="<?php echo $c_id; ?>" />

              <div class=" form-group">
                <label>Sub-Category</label>
                <input type="text" class="form-control" placeholder="Sub-Category title" name="subcategory" />
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
                <label>Index</label>
                <input type="text" class="form-control" placeholder="Index" name="sc_index" min="A" max="Z" />
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