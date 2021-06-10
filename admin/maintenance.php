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
          <h1 class="m-0 text-dark">Maintenance</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Maintenance</li>
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

            <div class="card-header d-flex p-0">
              <ul class="nav nav-pills ml-auto p-2" id="myTab">
                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Truncate</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Backup & Restore</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">

                  <div class="row">


                    <table class="table">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <h5>Categories</h5>
                          </td>
                          <td>
                            <a href="truncate_category.php" class="btn btn-outline-danger">Clear</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Sub-Categories</h5>
                          </td>
                          <td>
                            <a href="truncate_subcategory.php" class="btn btn-outline-danger">Clear</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Questions</h5>
                          </td>
                          <td>
                            <a href="truncate_questions.php" class="btn btn-outline-danger">Clear</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Exams</h5>
                          </td>
                          <td>
                            <a href="truncate_exams.php" class="btn btn-outline-danger">Clear</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Results</h5>
                          </td>
                          <td>
                            <a href="truncate_results.php" class="btn btn-outline-danger">Clear</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>School Details</h5>
                          </td>
                          <td>
                            <a href="truncate_school_info.php" class="btn btn-outline-danger">Clear</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Students Info</h5>
                          </td>
                          <td>
                            <a href="truncate_student.php" class="btn btn-outline-danger">Clear</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Strands</h5>
                          </td>
                          <td>
                            <a href="truncate_strands.php" class="btn btn-outline-danger">Clear</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <h5>Strand Formula</h5>
                          </td>
                          <td>
                            <a href="truncate_strand_formula.php" class="btn btn-outline-danger">Clear</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>


                  </div>

                </div>
                <div class="tab-pane active" id="tab_2">

                </div>
              </div>
            </div>
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