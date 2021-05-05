<?php

include('include/header.php');
include('include/sidebar.php');

$q_id = $_REQUEST['id'];

$sql = "SELECT * FROM questions WHERE q_id = '$q_id'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

  $q_cat = $row['q_cat'];
  $q_scat = $row['q_scat'];
  $question = $row['question'];
  $a = $row['choice1'];
  $b = $row['choice2'];
  $c = $row['choice3'];
  $d = $row['choice4'];
  $ans = $row['answerQ'];
  $q_item = $row['q_item'];
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Question</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Questions</li>
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

            <form action="update_question.php" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="q_id" value="<?php echo $q_id; ?>">
              <input type="hidden" name="q_scat" value="<?php echo $q_scat; ?>">

              <div class="form-group mr-3 ml-3 mt-3">
                <label>Question:</label>
                <textarea class="textarea" name="question" id="question"><?php echo $question; ?></textarea>
                <script>
                  CKEDITOR.replace('question', {
                    height: 200,
                    toolbar: [
                      ['Bold', 'Italic', 'Underline', '-', 'Image', 'Table', 'HorizontalRule'],
                    ],
                    filebrowserUploadUrl: "upload.php",
                  });
                </script>
              </div>

              <div class="row">
                <div class="col-md-8">

                  <div class="form-group mr-3 ml-3">
                    <label>Choice 1</label>
                    <textarea class="textarea" name="choice1" id="choice1"><?php echo $a; ?></textarea>
                    <script>
                      CKEDITOR.replace('choice1', {
                        height: 100,
                        toolbar: [
                          ['Bold', 'Italic', 'Underline', '-', 'Image', 'Table', 'HorizontalRule'],
                        ],
                        filebrowserUploadUrl: "upload.php",
                      });
                    </script>
                  </div>

                  <div class="form-group mr-3 ml-3">
                    <label>Choice 2</label>
                    <textarea class="textarea" name="choice2" id="choice2"><?php echo $b; ?></textarea>
                    <script>
                      CKEDITOR.replace('choice2', {
                        height: 100,
                        toolbar: [
                          ['Bold', 'Italic', 'Underline', '-', 'Image', 'Table', 'HorizontalRule'],
                        ],
                        filebrowserUploadUrl: "upload.php",
                      });
                    </script>
                  </div>

                  <div class="form-group mr-3 ml-3">
                    <label>Choice 3</label>
                    <textarea class="textarea" name="choice3" id="choice3"><?php echo $c; ?></textarea>
                    <script>
                      CKEDITOR.replace('choice3', {
                        height: 100,
                        toolbar: [
                          ['Bold', 'Italic', 'Underline', '-', 'Image', 'Table', 'HorizontalRule'],
                        ],
                        filebrowserUploadUrl: "upload.php",
                      });
                    </script>
                  </div>

                  <div class="form-group mr-3 ml-3">
                    <label>Choice 4</label>
                    <textarea class="textarea" name="choice4" id="choice4"><?php echo $d; ?></textarea>
                    <script>
                      CKEDITOR.replace('choice4', {
                        height: 100,
                        toolbar: [
                          ['Bold', 'Italic', 'Underline', '-', 'Image', 'Table', 'HorizontalRule'],
                        ],
                        filebrowserUploadUrl: "upload.php",
                      });
                    </script>
                  </div>

                </div>

                <div class="col-md-4">


                  <div class="form-group mr-3 ml-3">
                    <label>Item #:</label>
                    <input type="number" name="q_item" class="form-control" value="<?php echo $q_item; ?>" placeholder="Items" required>
                    </select>
                  </div>



                  <div class="form-group mr-3 ml-3">
                    <label>Correct Answer:</label>
                    <select class="form-control" name="ans">
                      <option value="1" <?php if ($ans == '1') echo 'Selected' ?>>Choice 1</option>
                      <option value="2" <?php if ($ans == '2') echo 'Selected' ?>>Choice 2</option>
                      <option value="3" <?php if ($ans == '3') echo 'Selected' ?>>Choice 3</option>
                      <option value="4" <?php if ($ans == '4') echo 'Selected' ?>>Choice 4</option>
                    </select>
                  </div>
                </div>

              </div>
          </div>

          <div class="form-group mr-3 ml-3">
            <button type="submit" name="save" class="btn btn-primary">Save</button>
          </div>
        </div>
        </form>

      </div><!-- /.card-outline -->
    </div><!-- /.col -->
</div><!-- /. row -->
</div><!-- /.container-fluid -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>