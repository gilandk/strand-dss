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
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
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


            <?php
            echo $_SESSION['logged_in'] . '<br/>';
            echo $_SESSION['role'] . '<br/>';
            echo $_SESSION['name'] . '<br/>';
            echo $_SESSION['status'] . '<br/>';
            echo $_SESSION['id'] . '<br/>';
            echo $_SESSION['uid'] . '<br/>';

            $date_range = "8/12/2013 10:20:20 - 8/19/2013 10:20:20";
            $dates = explode("-", $date_range);

            echo $date1 = date('m-d-Y', strtotime($dates[0]));
            echo '<br/>';
            echo $time2 = date('H:i A', strtotime($dates[0]));
            echo '<br/>';
            echo $date2 = date('m-d-Y', strtotime($dates[1]));
            echo '<br/>';
            echo $time2 = date('H:i A', strtotime($dates[1]));

            echo '<br/><br/>';
            $timestamp = "2012-10-19 18:19:56";
            $splitTimeStamp = explode(" ", $timestamp);
            echo $date = $splitTimeStamp[0];
            echo '<br/>';
            echo $time = $splitTimeStamp[1];

            ?>

            <!-- /.paste here -->


          </div><!-- /.card-outline -->
        </div><!-- /.col -->
      </div><!-- /. row -->
    </div><!-- /.container-fluid -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>