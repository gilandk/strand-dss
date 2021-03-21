<?php
include('include/header.php');
include('include/sidebar.php');

$sql = "SELECT * FROM student_info";
$result = $conn->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"> Students</h1>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <?php
                    //If User already registered with this email then show error message.
                    if (isset($_SESSION['addStudentSuccess'])) {
                    ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-check"></i> Success!</h5>
                            Student Successfully Added!
                        </div>
                    <?php
                        unset($_SESSION['addStudentSuccess']);
                    }
                    ?>

                    <?php
                    //If User already registered with this email then show error message.
                    if (isset($_SESSION['addStudentFailed'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            Email Already Exist!
                        </div>
                    <?php
                        unset($_SESSION['addStudentFailed']);
                    }
                    ?>
                    <div class="card card-primary card-outline">

                        <!-- /.card-header -->
                        <div class="card-header">
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                                Add Student
                            </button>
                        </div>

                        <div class="card-body">
                            <table id="school_students" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Email Address</th>
                                        <th>Full Name</th>
                                        <th>Grade/Section</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    if ($result->num_rows > 0) {
                                        while ($rows = $result->fetch_assoc()) {
                                            $st_id = $rows['student_id'];
                                            $email = $rows['user_email'];
                                            $fullname = $rows['firstname'] . ' ' . substr($rows['middlename'], 0) . ' ' . $rows['lastname'] . ' ' . $rows['allias'];

                                            $grade = $rows['grade'];
                                            $section = $rows['section'];

                                    ?>
                                            <tr>
                                                <td><?php echo $st_id; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $fullname; ?></td>
                                                <td><?php echo $grade . ' - ' . $section; ?></td>
                                                <td><span class="text-success">Active</span></td>
                                                <td><a href="school_students_edit.php?id=<?php echo $rows['user_id']; ?>" class="btn btn-block btn-outline-warning btn-xs">Update</a>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Email Address</th>
                                        <th>Full Name</th>
                                        <th>Grade/Section</th>
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
            </div>

            <div class=" modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Student (Users)</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="add_student.php" id="students" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Student number</label>
                                    <input type="number" class="form-control" placeholder="Student Number" name="st_id" />
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" placeholder="Email Address" name="email" />
                                </div>

                                <label>Password</label>
                                <div class="form-group">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="*********" required>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" id="cpassword" name="cpassword" placeholder="*********" required>
                                </div>
                                <div id="passwordError" class="btn btn-flat btn-danger hide-me">
                                    Password Mismatch!!
                                </div>

                                <div class="form-group">
                                    <label>First name</label>
                                    <input type="text" class="form-control" placeholder="First name" name="fname" />
                                </div>
                                <div class="form-group">
                                    <label>Middle name</label>
                                    <input type="text" class="form-control" placeholder="Middle name" name="mname" />
                                </div>
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" placeholder="Last name" name="lname" />
                                </div>

                                <div class="form-group">
                                    <label>Grade</label>
                                    <input type="text" class="form-control" placeholder="Grade" name="grade" />
                                </div>

                                <div class="form-group">
                                    <label>Section</label>
                                    <input type="text" class="form-control" placeholder="Section" name="section" />
                                </div>

                                <div class="form-group">
                                    <label>School Year</label>
                                    <select class="form-control" name="s_year">
                                        <?php
                                        $date2 = date('Y', strtotime('+1 Years'));
                                        for ($i = date('Y'); $i < $date2 + 10; $i++) {
                                            echo '<option>' . $i . '-' . ($i + 1) . '</option>';
                                        }
                                        ?>
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
        </div>
        <section>
            <!-- /.content -->
</div>

<?php
include('include/footer.php');
?>