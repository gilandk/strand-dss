<?php
include('include/header.php');
include('include/sidebar.php');

$subc_id = $_REQUEST['id'];

$sql1 = "SELECT * FROM category JOIN sub_category ON category.cat_id = sub_category.main_cat WHERE sub_category.sub_id = '$subc_id'";
$result1 = $conn->query($sql1);
while ($row = $result1->fetch_assoc()) {

  $cat_id = $row['cat_id'];
  $cat_title = $row['cat_name'];
  $sc_title = $row['sub_title'];
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Questions for <?php echo $sc_title; ?></h1>
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
          <div class="card card-primary card-outline">
            <div class="card-header">
              <div class="row mb-2">
                <button type="button" class="btn btn-success float-sm-right" data-toggle="modal" data-target="#modal-xl">
                  Add Question
                </button>
              </div>
            </div>

            <div class="card-body pad table-responsive">



              <table class="table table-bordered table-striped cat">

                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Question</th>
                    <th class="text-center">Group</th>
                    <th class="text-center">Action</th>
                  </tr>

                </thead>
                <tbody>

                  <?php

                  $num = '1';

                  $sql = "SELECT * FROM questions WHERE q_scat = '$subc_id'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) {

                  ?>
                      <tr>
                        <td class="text-center"><?php echo $num;
                                                $num++; ?></td>
                        <td><?php echo $rows['question']; ?></td>
                        <td class="text-center"><?php echo $rows['groupIndex']; ?></td>
                        <td class="text-center">
                          <a href="update_question.php?id=<?php echo $rows['sub_id']; ?>" class="btn btn-block btn-outline-warning btn-sm">Update</a>
                          <a href="delete_question.php?id=<?php echo $rows['sub_id']; ?>" class="btn btn-block btn-outline-danger btn-sm">Delete</a>
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
        </div><!-- pad table  -->

        <div class="modal fade" id="modal-xl">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Add Question #<?php echo $num;
                                                      $num = $num + 2; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body ml-5 mr-5">
                <form action="add_category.php" method="POST" enctype="multipart/form-data">

                  <div class="form-group">
                    <label>Question:</label>
                    <textarea class="textarea" name="question" id="question"></textarea>
                    <script>
                      CKEDITOR.replace('question', {
                        height: 200,
                        removePlugins: 'sourcearea, about, wsc, scayt, check, maximize, link, unlink, anchor, strike, blockquote',
                        filebrowserUploadUrl: "upload.php",
                      });
                    </script>
                  </div>

                  <div class="row">
                    <div class="col-md-8">

                      <div class="form-group">
                        <label>Choice A</label>
                        <textarea class="textarea" name="choice1" id="choice1"></textarea>
                        <script>
                          CKEDITOR.replace('choice1', {
                            height: 100,
                            width: 600,
                            removePlugins: 'sourcearea, about, wsc, scayt, check, maximize, link, unlink, anchor, strike, blockquote',
                            filebrowserUploadUrl: "upload.php",
                          });
                        </script>
                      </div>

                      <div class="form-group">
                        <label>Choice B</label>
                        <textarea class="textarea" name="choice2" id="choice2"></textarea>
                        <script>
                          CKEDITOR.replace('choice2', {
                            height: 100,
                            width: 600,
                            removePlugins: 'sourcearea, about, wsc, scayt, check, maximize, link, unlink, anchor, strike, blockquote',
                            filebrowserUploadUrl: "upload.php",
                          });
                        </script>
                      </div>

                      <div class="form-group">
                        <label>Choice C</label>
                        <textarea class="textarea" name="choice3" id="choice3"></textarea>
                        <script>
                          CKEDITOR.replace('choice3', {
                            height: 100,
                            width: 600,
                            removePlugins: 'sourcearea, about, wsc, scayt, check, maximize, link, unlink, anchor, strike, blockquote',
                            filebrowserUploadUrl: "upload.php",
                          });
                        </script>
                      </div>

                      <div class="form-group">
                        <label>Choice D</label>
                        <textarea class="textarea" name="choice4" id="choice4"></textarea>
                        <script>
                          CKEDITOR.replace('choice4', {
                            height: 100,
                            width: 600,
                            removePlugins: 'sourcearea, about, wsc, scayt, check, maximize, link, unlink, anchor, strike, blockquote',
                            filebrowserUploadUrl: "upload.php",
                          });
                        </script>
                      </div>

                    </div>

                    <div class="col-md-4">

                      <div class="form-group">
                        <label>Correct Answer:</label>
                        <select class="form-control">
                          <option value="A">Choice A</option>
                          <option value="B">Choice B</option>
                          <option value="C">Choice C</option>
                          <option value="D">Choice D</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Group Question:</label>
                        <select class="form-control">
                          <option value="no">No</option>
                          <option value="yes">Yes</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Group Index:</label>
                        <select class="form-control">
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="C">C</option>
                          <option value="D">D</option>
                          <option value="E">E</option>
                          <option value="F">F</option>
                          <option value="G">G</option>
                        </select>
                      </div>


                    </div>

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

      </div><!-- /.card-outline -->
    </div><!-- /.col -->
</div><!-- /. row -->
</div><!-- /.container-fluid -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>