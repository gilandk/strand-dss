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
        <!-- /.form group -->
        <table id="settings_audit" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name/ID</th>
              <th>Role</th>
              <th>Activity</th>
              <th>Date & Time</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM audit_trails ORDER BY date";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($rows = $result->fetch_assoc()) {
                $admin_id = $rows['admin_id'];
                $user_id = $rows['user_id'];
                $activity = $rows['activity'];
                $date = $rows['date'];

                if ($admin_id != NULL) {

                  $sql1 = "SELECT * FROM admin WHERE admin_id = '$admin_id'";
                  $result1 = $conn->query($sql1);

                  $row = mysqli_fetch_assoc($result1);
                  $admin_name = $row['admin_name'];
                  $admin_role = $row['admin_role'];

                  echo  '<tr>';
                  echo '<td>' . $admin_name . '</td>';
                  echo '<td>' . $admin_role . '</td>';
                  echo '<td>' . $activity . '</td>';
                  echo '<td>' . date('d-M-Y h:i A ', strtotime($date)) . '</td>';
                  echo '</tr>';
                } else {

                  $sql2 = "SELECT * FROM student_info WHERE user_id = '$user_id'";
                  $result2 = $conn->query($sql2);
                  $row2 = mysqli_fetch_assoc($result2);
                  $user_name = $row2['student_id'];
                  $user_role = 'User';

                  echo  '<tr>';
                  echo '<td>' . $user_name . '</td>';
                  echo '<td>' . $user_role . '</td>';
                  echo '<td>' . $activity . '</td>';
                  echo '<td>' . date('d-M-Y h:i A ', strtotime($date)) . '</td>';
                  echo '</tr>';
                }
              }
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
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
<script>
  var minDate, maxDate;

  // Custom filtering function which will search data in column four between two values
  $.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
      var min = minDate.val();
      var max = maxDate.val();
      var date = new Date(data[4]);

      if (
        (min === null && max === null) ||
        (min === null && date <= max) ||
        (min <= date && max === null) ||
        (min <= date && date <= max)
      ) {
        return true;
      }
      return false;
    }
  );

  $(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
      format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
      format: 'MMMM Do YYYY'
    });

    // DataTables initialisation
    var table = $('#settings_audit').DataTable();

    // Refilter the table
    $('#min, #max').on('change', function() {
      table.draw();
    });
  });
</script>

<?php
include('include/footer.php');
?>