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
          <h1 class="m-0 text-dark">Questionnaire</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Examination</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <!-- /.content-header -->
    <div class="card card-primary card-outline">

      <div class="card-header">
        <a class="btn btn-success" href="question_add">
          Add Question
        </a>
      </div>


      <!--tabs menu -->
      <div class="card-body">
        <div class="row">

          <div class="col-5 col-sm-3">
            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">

              <!-- tab menu data -->
              <?php
              $sql = "SELECT * FROM category ORDER by cat_id";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                  $item = $row['cat_id'];
                  if ($item == '1') {
                    $nav = 'active';
                  } else {
                    $nav = '';
                  }

              ?>
                  <a class=" nav-link <?php echo $nav; ?>" id="vert-tabs-<?php echo $row['cat_id']; ?>-tab" data-toggle="pill" href="#vert-tabs-<?php echo $row['cat_id']; ?>" role="tab" aria-controls="vert-tabs-<?php echo $row['cat_name']; ?>" aria-selected="true"><?php echo $row['cat_name']; ?></a>
              <?php
                }
              }
              ?>
              <!-- tab menu data -->
            </div>
          </div>

          <div class="col-7 col-sm-9">
            <div class="tab-content" id="vert-tabs-tabContent">

              <?php
              $sql1 = "SELECT * FROM category ORDER by cat_id";
              $result1 = $conn->query($sql1);

              if ($result1->num_rows > 0) {
                while ($row1 = $result1->fetch_assoc()) {

                  $item1 = $row1['cat_id'];
                  if ($item1 == '1') {
                    $nav1 = 'show active';
                  } else {
                    $nav1 = '';
                  }
              ?>
                  <!-- tab content -->
                  <div class="tab-pane text-left fade <?php echo $nav1; ?>" id="vert-tabs-<?php echo $row1['cat_id']; ?>" role="tabpanel" aria-labelledby="vert-tabs-<?php echo $row1['cat_id']; ?>-tab">

                    <table id="" class="table table-bordered table-striped display">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Question</th>
                          <th>Action</th>
                        </tr>

                      </thead>
                      <tbody>

                        <?php

                        $items = 1;
                        $cat_name = $row1['cat_name'];

                        $sqlt = "SELECT * FROM questions WHERE q_cat = '$cat_name'";
                        $resultq = $conn->query($sqlt);

                        if ($resultq->num_rows > 0) {
                          while ($rows = $resultq->fetch_assoc()) {
                        ?>
                            <tr>
                              <td> <?php
                                    echo $items;
                                    $items++;
                                    ?></td>
                              <td><?php echo $rows['question']; ?></td>
                              <td><a href="#" class="text-warning">Update</a> | <a href="#" class="text-danger">Delete</a> </td>
                            </tr>
                        <?php
                          }
                        }
                        ?>

                      </tbody>
                    </table>
                  </div>
                  <!-- tab content -->

              <?php
                }
              }
              ?>

            </div><!-- /.tab content -->
          </div><!-- /.tab-content-row -->
        </div><!-- /.row -->
      </div><!-- /.card body -->

    </div> <!-- /. card content -->
  </section><!-- /.section -->

</div> <!-- /. wrapper -->

<?php
include('include/footer.php');
?>