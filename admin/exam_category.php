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
            <li class="breadcrumb-item active">Examination</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="card card-primary card-outline">
      <!-- /.card-header -->

      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>

            <tr>
              <th>#</th>
              <th>Category Name</th>
              <th>Instruction</th>
              <th>No. of Questions</th>
              <th>Time Limit</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $items = 1;
            $sql = "SELECT * FROM category ORDER by cat_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

            ?>
                <tr>
                  <td><?php echo $items;
                      $items++; ?></td>
                  <td><?php echo $row['cat_name']; ?></td>
                  <td><?php echo $row['cat_instruct']; ?></td>
                  <td><?php echo $row['cat_items']; ?></td>
                  <td><?php echo $row['cat_timer']; ?></td>
                  <td><a href="#" class="text-warning">Update Category</a></td>
                </tr>
            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <section>
      <!-- /.content -->
</div>

<?php
include('include/footer.php');
?>