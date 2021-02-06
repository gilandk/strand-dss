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
          <h1 class="m-0 text-dark">Add Question</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Question / Examination</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-primary card-outline">
          <div class="card-body pad">

            <form action="add_question.php" method="POST" enctype="multipart/form-data">

              <!-- editor -->
              <div class=" row ml-5 mb-3">
                <div class="col-md-6">

                  <div class="float-left">
                    <!-- select -->
                    <div class="form-group">
                      <label>Select Category</label>
                      <input type="text" class="form-control" name="category" list="category" />
                      <datalist id="category">
                        <?php

                        $sql = "SELECT * FROM category";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {

                        ?>
                            <option value="<?php echo $row['cat_name']; ?>"></option>

                        <?php
                          }
                        }

                        ?>
                      </datalist>
                    </div>
                  </div>
                </div>
              </div>
              <!-- editor -->
              <div class="mb-3 ml-5 mb-5 mr-5">
                <label>Question:</label>
                <textarea class="textarea" name="question" id="question"></textarea>
              </div>

              <div class="row ml-5">
                <div class="col-md-8">
                  <!-- editor -->
                  <div class="mb-3">
                    <label>Choice: A</label>
                    <textarea class="textarea choice" id="choice1" name="choice1"></textarea>
                  </div>
                  <!-- editor -->

                  <!-- editor -->

                  <div class="mb-3">
                    <label>Choice: B</label>
                    <textarea class="textarea choice" id="choice2" name="choice2"></textarea>
                  </div>
                  <!-- editor -->

                  <!-- editor -->

                  <div class="mb-3">
                    <label>Choice: C</label>
                    <textarea class="textarea choice" id="choice3" name="choice3"></textarea>
                  </div>
                  <!-- editor -->

                  <!-- editor -->

                  <div class="mb-3">
                    <label>Choice: D</label>
                    <textarea class="textarea choice" id="choice4" name="choice4"></textarea>
                  </div>
                  <!-- editor -->
                </div>
                <!--choices-->
              </div>
              <!--row-->

              <!--answer checkbox-->
              <div class="float-right mt-5 mr-5">
                <button type="submit" class="btn btn-success" id="save">Save</button>
              </div>
            </form>
          </div>
        </div>
        <!--card body-->
      </div>
      <!-- ./row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.col-->

<script>
  CKEDITOR.replace('question', {
    height: 300,
    filebrowserUploadUrl: "upload.php"
  });
  CKEDITOR.replace('choice1', {
    height: 200,
    filebrowserUploadUrl: "upload.php"
  });

  CKEDITOR.replace('choice2', {
    height: 200,
    filebrowserUploadUrl: "upload.php"
  });

  CKEDITOR.replace('choice3', {
    height: 200,
    filebrowserUploadUrl: "upload.php"
  });

  CKEDITOR.replace('choice4', {
    height: 200,
    filebrowserUploadUrl: "upload.php"
  });
</script>


<?php
include('include/footer.php');
?>