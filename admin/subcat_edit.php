<?php

include('include/header.php');
include('include/sidebar.php');

$sc_id = $_REQUEST['id'];

$sql = "SELECT * FROM sub_category WHERE sub_id = '$sc_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $cat_id = $row['main_cat'];
        $sc_index = $row['sc_index'];
        $sc_title = $row['sub_title'];
        $sc_instruct = $row['sub_instruction'];
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
                    <h1 class="m-0 text-dark">Edit Sub-Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Sub-Category</li>
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
                    <?php
                    //If User already registered with this email then show error message.
                    if (isset($_SESSION['updateSCSuccess'])) {
                    ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            Category Successfully Added!
                        </div>
                    <?php
                        unset($_SESSION['updateSCSuccess']);
                    }
                    ?>

                    <?php
                    //If User already registered with this email then show error message.
                    if (isset($_SESSION['updateSCFailed'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            Category title already exist!
                        </div>
                    <?php
                        unset($_SESSION['updateSCFailed']);
                    }
                    ?>
                    <div class="card card-primary card-outline">
                        <form action="update_subcatinfo.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="sc_id" value="<?php echo $sc_id; ?>">

                            <div class="form-group mt-3 ml-3 mr-3">
                                <label>Sub-Category</label>
                                <input type="text" class="form-control" placeholder="Sub-Category title" name="subcategory" value="<?php echo $sc_title; ?>" />
                            </div>

                            <div class="form-group ml-3 mr-3">
                                <label>Instruction:</label>
                                <textarea class="textarea" name="instruction" id="instruction"><?php echo $sc_instruct; ?></textarea>
                                <script>
                                    CKEDITOR.replace('instruction', {
                                        height: 200,
                                        filebrowserUploadUrl: "upload.php",
                                    });
                                </script>
                            </div>

                            <div class="form-group ml-3 mr-3">
                                <label>Index</label>
                                <input type="text" class="form-control" placeholder="Index" name="sc_index" value="<?php echo $sc_index; ?>" min="A" max="Z" />
                            </div>

                            <div class="form-group ml-3 mr-3">
                                <button type="submit" name="save" class="btn btn-primary">Save</button>
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