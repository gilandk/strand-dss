<?php

include('include/header.php');
include('include/sidebar.php');

$c_id = $_REQUEST['id'];

$sql = "SELECT * FROM category WHERE cat_id = '$c_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $cat_id = $row['cat_id'];
        $cat_name = $row['cat_name'];
        $cat_instruct = $row['cat_instruct'];
        $cat_items = $row['cat_items'];
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
                    <h1 class="m-0 text-dark">Edit Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Category</li>
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
                    if (isset($_SESSION['UpdateCategorySuccess'])) {
                    ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            Category Successfully Updated!
                        </div>
                    <?php
                        unset($_SESSION['UpdateCategorySuccess']);
                    }
                    ?>

                    <?php
                    //If User already registered with this email then show error message.
                    if (isset($_SESSION['UpdateCategoryFailed'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            Category Failed to Update!
                        </div>
                    <?php
                        unset($_SESSION['UpdateCategoryFailed']);
                    }
                    ?>
                    <div class="card card-primary card-outline">

                        <form action="update_categoryinfo.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>" readonly>

                            <div class=" form-group mt-3 ml-3 mr-3">
                                <label>Category</label>
                                <input type="text" class="form-control" placeholder="Category title" name="category" value="<?php echo $cat_name; ?>" />
                                <input type="hidden" name="category2" value="<?php echo $cat_name; ?>" readonly>
                            </div>

                            <div class=" form-group ml-3 mr-3">
                                <label>Instruction:</label>
                                <textarea class="textarea" name="instruction" id="instruction"><?php echo stripcslashes($cat_instruct); ?></textarea>
                                <script>
                                    CKEDITOR.replace('instruction', {
                                        height: 200,
                                        filebrowserUploadUrl: "upload.php",
                                    });
                                </script>
                            </div>

                            <div class="form-group ml-3 mr-3">
                                <label>Items</label>
                                <input type="number" class="form-control" placeholder="How many items?" value="<?php echo $cat_items; ?>" name=" items" max="150" />
                            </div>

                            <div class="form-group ml-3 mr-3">
                                <button type="submit" name="save" class="btn btn-primary">Save</button>
                            </div>
                    </div>

                    </form>
                </div>

            </div><!-- /.card-outline -->
        </div><!-- /.col -->
</div><!-- /. row -->
</div><!-- /.container-fluid -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
include('include/footer.php');
?>