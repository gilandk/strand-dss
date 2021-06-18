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
          <h1 class="m-0 text-dark">Question Set</h1>
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
    <div class="container-fluid">

      <div class="card">
        <div class="card-body">

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Title</th>
                <th>Desciption</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM question_set ORDER BY date_created ASC";
              $res = $conn->query($sql);

              if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {

                  $id = $row['qs_id'];
                  $title = $row['qs_title'];
                  $desc = $row['qs_description'];
              ?>
                  <tr>
                    <td><?php echo $title; ?></td>
                    <td><?php echo $desc; ?></td>
                    <td>
                      <a href="exam_category.php?id=<?php echo $id; ?>" class="btn btn-block btn-outline-info btn-xs">Category</a>
                      <a href="manage_formula.php?id=<?php echo $id; ?>" class="btn btn-block btn-outline-primary btn-xs">Formula</a>
                      <a href="update_qset.php?id=<?php echo $id; ?>" class="btn btn-block btn-outline-warning btn-xs">Update</a>
                      <a href="delete_qset.php?id=<?php echo $id; ?>" class="btn btn-block btn-outline-danger btn-xs">Delete</a>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>