<?php
include('include/header.php');
include('include/sidebar.php');

$e_id = $_REQUEST['id'];

$sql = "SELECT * FROM exams WHERE exam_id = '$e_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $exam_id = $row['exam_id'];
    $exam_type = $row['exam_type'];
    $exam_guide = $row['exam_guide'];
    $exam_date_s = $row['exam_date_s'];
    $exam_date_e = $row['exam_date_e'];
    $exam_handler = $row['exam_handler'];
    $exam_status = $row['exam_status'];
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
          <h1 class="m-0 text-dark">Manage Examination</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="exam_examination.php">Examination</a></li>
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
            <!-- Custom Tabs -->

            <div class="card-header d-flex p-0">
              <h3 class="card-title p-3">Examination Info</h3>
              <ul class="nav nav-pills ml-auto p-2" id="myTab">
                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Info</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Students</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <?php
                  //If User already registered with this email then show error message.
                  if (isset($_SESSION['UpdateExamSuccess'])) {
                  ?>
                    <div class="alert alert-success alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-check"></i> Success!</h5>
                      Examination Info Successfully Updated!
                    </div>
                  <?php
                    unset($_SESSION['UpdateExamSuccess']);
                  }
                  ?>

                  <?php
                  //If User already registered with this email then show error message.
                  if (isset($_SESSION['UpdateExamFailed'])) {
                  ?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                      Examination Info Failed to Update!
                    </div>
                  <?php
                    unset($_SESSION['UpdateExamFailed']);
                  }
                  ?>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="card">

                        <form action="update_examinfo.php" method="POST" enctype="multipart/form-data">

                          <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">

                          <div class="form-group mt-3 ml-3 mr-3">
                            <label>Type</label>
                            <input type="text" class="form-control" placeholder="Examination Type" name="exam_type" value="<?php echo $exam_type; ?>" />
                          </div>

                          <div class="form-group ml-3 mr-3">
                            <label>Schedule:</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                              </div>
                              <input type="text" class="form-control" id="exam_sched" name="exam_sched" value="<?php echo date("m/d/Y H:i A", strtotime($exam_date_s)) . ' - ' . date("m/d/Y H:i A", strtotime($exam_date_e)); ?>">
                            </div>
                            <!-- /.input group -->
                          </div>
                          <!-- /.form group -->

                          <div class="form-group ml-3 mr-3">
                            <label>Examination Guide:</label>
                            <textarea class="textarea" name="guide" id="guide"><?php echo stripcslashes($exam_guide) ?></textarea>
                            <script>
                              CKEDITOR.replace('guide', {
                                height: 200,
                                filebrowserUploadUrl: "upload.php",
                              });
                            </script>
                          </div>
                          <div class="form-group ml-3 mr-3">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                          </div>
                        </form>


                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card">
                        <div class="form-group mt-3 ml-3 mr-3">
                          <label>Proctor:</label>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <div class="row">

                    <div class="col-md-9">
                      <div class="card">
                        <div class="card-body table-responsive p-0">
                          <table class="table table-hover text-nowrap">
                            <thead>
                              <tr>
                                <th hidden>ID</th>
                                <th class="text-center"></th>
                                <th class="text-center">Order</th>
                                <th class="text-center">Category</th>
                                <th class=" text-center">Hours</th>
                                <th class=" text-center">Minutes</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sql1 = "SELECT * FROM category JOIN exam_category ON category.cat_id = exam_category.catID WHERE examID='$e_id' ORDER by cat_seq ASC";
                              $result1 = $conn->query($sql1);

                              if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                              ?>
                                  <tr>
                                    <td class="text-center"><a class="confirmation" href="unset_category.php?id=<?php echo $row1['ec_id']; ?>&eid=<?php echo $exam_id; ?>"><i class=" fas fa-minus text-danger"></i></a></td>
                                    <td class="text-center"><?php echo $row1['cat_seq']; ?></td>
                                    <td class="text-center"><?php echo $row1['cat_name']; ?></td>
                                    <td class="text-center edit" id="cHour_<?php echo $row1['ec_id']; ?>" contenteditable>
                                      <?php
                                      echo $row1['cHour'];
                                      ?>
                                    </td>
                                    <td class="text-center edit" id="cMin_<?php echo $row1['ec_id']; ?>" contenteditable>
                                      <?php
                                      echo $row1['cMin'];
                                      ?>
                                  </tr>
                              <?php
                                }
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div><!-- /.col-md-8 -->


                  </div>
                </div>

                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                  It has survived not only five centuries, but also the leap into electronic typesetting,
                  remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                  sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                  like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <!-- /.tab-pane -->


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