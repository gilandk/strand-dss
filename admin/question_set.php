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
          <h1 class="m-0 text-dark"> Question Set</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Question Set</li>
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
          if (isset($_SESSION['addQsetSuccess'])) {
          ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              Question Set Added!
            </div>
          <?php
            unset($_SESSION['addQsetSuccess']);
          }
          ?>
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['deleteQset'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Question Set Deleted!
            </div>
          <?php
            unset($_SESSION['deleteQset']);
          }
          ?>
          <?php
          //If User already registered with this email then show error message.
          if (isset($_SESSION['addQsetFailed'])) {
          ?>
            <div class="alert alert-warning alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Warning!</h5>
              Question Set Failed!
            </div>
          <?php
            unset($_SESSION['addQsetFailed']);
          }
          ?>
       
          <div class="card">
            <!-- /.card-header -->
            <div class="card-header">
              <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                Add Question Set
              </button>
            </div>

            <div class="card-body">

              <table class="table table-bordered table-striped cat">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $sql = "SELECT * FROM question_set";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                  ?>
                      <tr>
                        <td><?php echo $row['title']; ?></td>
                        <td class="text-center">
                          <a href="exam_category.php?id=<?php echo $row['qs_id']; ?>" class="btn btn-block btn-outline-info btn-xs">Category</a>
                          <a href="manage_formula.php?id=<?php echo $row['qs_id']; ?>" class="btn btn-block btn-outline-primary btn-xs">Formula</a>
                          <a href="delete_qset.php?id=<?php echo $row['qs_id']; ?>" class="btn btn-block btn-outline-danger btn-xs">Delete</a>
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
        <h4 class="modal-title">Add Question Set</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="add_qset.php" method="POST" enctype="multipart/form-data">

          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" placeholder="Name" name="title" />
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