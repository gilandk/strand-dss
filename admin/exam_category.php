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
          if (isset($_SESSION['addCategoryFailed'])) {
          ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-ban"></i> Alert!</h5>
              Category title already exist!
            </div>
          <?php
            unset($_SESSION['addCategoryFailed']);
          }
          ?>
          <div class="card card-primary card-outline">
            <!-- /.card-header -->


            <div class="card-body pad table-responsive">

              <table class="table table-bordered table-striped cat">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Category Name</th>

                    <th class="text-center">No. of Questions</th>
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
                          <a href="sub_category.php?id=<?php echo $row['cat_id']; ?>" class="btn btn-block btn-outline-info btn-xs">Manage</a>
                          <a href="exam_category_edit.php?id=<?php echo $row['cat_id']; ?>" class="btn btn-block btn-outline-warning btn-xs">Update</a>
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