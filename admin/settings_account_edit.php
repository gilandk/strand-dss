<?php

include('include/header.php');
include('include/sidebar.php');

$a_id = $_REQUEST['id'];

$sql = "SELECT * FROM admin WHERE admin_id = '$a_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $admin_id = $row['admin_id'];
        $admin_name = $row['admin_name'];
        $admin_email = $row['admin_email'];
        $admin_role = $row['admin_role'];
        $admin_status = $row['admin_status'];
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
                    <h1 class="m-0 text-dark">Update Admin Account</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Admin Accounts</li>
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
            if (isset($_SESSION['updateAdminSuccess'])) {
            ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    Admin Successfully Update!
                </div>
            <?php
                unset($_SESSION['updateAdminSuccess']);
            }
            ?>

            <?php
            //If User already registered with this email then show error message.
            if (isset($_SESSION['updateAdminFailed'])) {
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                    Email already exist!
                </div>
            <?php
                unset($_SESSION['updateAdminFailed']);
            }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">

                        <div class="mt-3 ml-3 mr-3 mb-3">
                            <form action="update_admin.php" id="admin" method="POST" enctype="multipart/form-data">

                                <input type="hidden" class="form-control" value="<?php echo $admin_id; ?>" name="a_id" />

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" placeholder="Name" value="<?php echo $admin_name; ?>" name="name" />
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" placeholder="Email Address" value="<?php echo $admin_email; ?>" name="email" />
                                    <input type="hidden" class="form-control" placeholder="Email Address" value="<?php echo $admin_email; ?>" name="emailcomp" />
                                </div>

                                <div class="form-group">
                                    <label>Role:</label>
                                    <select class="form-control" name="role">
                                        <option <?php if ($admin_role == 'Super Admin') echo 'Selected' ?>>Super Admin</option>
                                        <option <?php if ($admin_role == 'Admin') echo 'Selected' ?>>Admin</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status:</label>
                                    <select class="form-control" name="status">
                                        <option <?php if ($admin_status == 'Active') echo 'Selected' ?>>Active</option>
                                        <option <?php if ($admin_status == 'Inactive') echo 'Selected' ?>>Inactive</option>
                                    </select>
                                </div>

                                <label>Password</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="*********">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="*********">
                                </div>

                                <div id="passwordError" class="btn btn-flat btn-danger hide-me">
                                    Password Mismatch!!
                                </div>


                                <button type="submit" name="save" class="btn btn-primary">Save</button>
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