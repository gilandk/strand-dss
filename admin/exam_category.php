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
                    <h1 class="m-0 text-dark"> Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Examination</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card">
        <!-- /.card-header -->
        <section class="content">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="display:none">ID</th>
                            <th>Category Name</th>
                            <th>No. of Questions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="display:none">1</td>
                            <td>Reading Comprehension</td>
                            <td>50</td>
                            <td><a href="#" class="text-success">Update Category</a> | <a href="#">Update Questionare</a></td>
                        </tr>
                    </tbody>

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