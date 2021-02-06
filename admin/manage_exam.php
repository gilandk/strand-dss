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
        $exam_hour = $row['exam_hour'];
        $exam_min = $row['exam_min'];
        $exam_date_s = $row['exam_date_s'];
        $exam_date_e = $row['exam_date_e'];
        $exam_handler = $row['exam_handler'];
        $exam_status = $row['exam_status'];
    }
}

$sq1 = "SELECT * FROM category";
$result1 = $conn->query($sql1);

if ($resul1t->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {

        $cat_id = $row1['cat_id'];
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
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Info</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Categories</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Students</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <form action="update_examinfo.php" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label>Examination Type</label>
                                            <input type="text" class="form-control" placeholder="Examination Type" name="exam_type" value="<?php echo $exam_type; ?>" />
                                        </div>

                                        <div class="form-group">
                                            <label>Examination Schedule:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="exam_sched" name="exam_sched" value="<?php echo date("m/d/Y H:i A", strtotime($exam_date_s)) . ' - ' . date("m/d/Y H:i A", strtotime($exam_date_e)); ?>">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <!-- /.form group -->

                                        <div class="form-group">
                                            <label>Examination Guide:</label>
                                            <textarea class="textarea" name="guide" id="guide"><?php echo stripcslashes($exam_guide) ?></textarea>
                                            <script>
                                                CKEDITOR.replace('guide', {
                                                    height: 200,
                                                    filebrowserUploadUrl: "upload.php",
                                                });
                                            </script>
                                        </div>

                                        <div class="form-group">
                                            <label>Examination Duration:</label>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Hours</span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Hours" value="<?php echo $exam_hour; ?>" name="hours" min="0" max="24">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Minutes</span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Minutes" value="<?php echo $exam_min; ?>" name="min" min="0" max="60">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    The European languages are members of the same family. Their separate existence is a myth.
                                    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                                    in their grammar, their pronunciation and their most common words. Everyone realizes why a
                                    new common language would be desirable: one could refuse to pay expensive translators. To
                                    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                                    words. If several languages coalesce, the grammar of the resulting language is more simple
                                    and regular than that of the individual languages.
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
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_4">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic typesetting,
                                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                    like Aldus PageMaker including versions of Lorem Ipsum.
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
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