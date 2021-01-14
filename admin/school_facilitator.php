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
                    <h1 class="m-0 text-dark"> Facilitator</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">School</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="card card-primary card-outline">
            <section class="content">
                <div class="card-body">
                    <table id="school_facilitator" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Facilitator ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $items = 1;
                            ?>
                            <tr>
                                <td><?php
                                    echo $items;
                                    $items++;
                                    ?></td>
                                <td>123456</td>
                                <td>Aron</td>
                                <td>admin</td>
                                <td><span class="text-success">Active</td>
                                <td><a href="#" class="text-warning">Update </a> | <a href="#" class="text-danger">Deactivate</a></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Facilitator ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->


        </div>
        <!-- /.card -->
        <section>
            <!-- /.content -->
</div>

<?php
include('include/footer.php');
?>