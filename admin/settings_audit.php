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
          <h1 class="m-0 text-dark"> Audit Trail</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Settings</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="card card-primary card-outline">
      <div class="card-body">
        <table id="settings_audit" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Account ID</th>
              <th>Role</th>
              <th>Full Name</th>
              <th>Activity</th>
              <th>Date & Time</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>123456</td>
              <td>Admin</td>
              <td>Aron</td>
              <td>Edit name</td>
              <td>01-03-2021</td>

            </tr>
          </tbody>
          <tfoot>
            <tr>
              <th>Account ID</th>
              <th>Role</th>
              <th>Full Name</th>
              <th>Activity</th>
              <th>Date & Time</th>
            </tr>
          </tfoot>
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