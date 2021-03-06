<?php
include('include/header.php');
include('include/sidebar.php');

$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Admin Accounts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <?php
            //If User already registered with this email then show error message.
            if (isset($_SESSION['addCategorySuccess'])) {
            ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Category Successfully Added!
                </div>
            <?php
                unset($_SESSION['addCategorySuccess']);
            }
            ?>

            <?php
            //If User already registered with this email then show error message.
            if (isset($_SESSION['addCategoryFailed'])) {
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    Category title already exist!
                </div>
            <?php
                unset($_SESSION['addCategoryFailed']);
            }
            ?>
            <div class="card card-primary card-outline">
                <!-- /.card-header -->
                <div class="card-header">
                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                        Add Admin Account
                    </button>
                </div>
                <div class="card-body">
                    <table id="school_admin" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td><?php echo $row['admin_uid']; ?></td>
                                    <td><?php echo $row['admin_name']; ?></td>
                                    <td><?php echo $row['admin_email']; ?></td>
                                    <td><?php echo $row['admin_role']; ?></td>
                                    <td><?php echo $row['admin_status']; ?></td>
                                    <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Admin Account</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="add_admin.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" />
                            </div>

                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" class="form-control" placeholder="Email Address" name="email" />
                            </div>

                            <div class="form-group">
                                <label>Role:</label>
                                <select class="form-control" name="ans">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Correct Answer:</label>
                                <select class="form-control" name="ans">
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
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



        <section>
            <!-- /.content -->
</div>

<?php
include('include/footer.php');
?>