<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

    $st_id = mysqli_real_escape_string($conn, $_POST['st_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $s_year = mysqli_real_escape_string($conn, $_POST['s_year']);

    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $emailcheck = "SELECT * FROM student_info WHERE user_email = '$email' AND student_id='$st_id'";
    $result = $conn->query($emailcheck);

    if ($result->num_rows == 0) {

        $sql = "INSERT INTO student_info (student_id, firstname, lastname, middlename, user_email, grade, section, user_pass)
                                    VALUES ('$st_id','$fname', '$mname', '$lname', '$email', '$grade', '$section', '$password')";
        if ($conn->query($sql) == TRUE) {

            $_SESSION['addStudentSuccess'] = true;
            header("Location: school_students.php");
            exit();
        } else {
            //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
            echo "Error " . $sql . "<br>" . $conn->error;
        }
    } else {
        //if email found in database then show email already exists error.
        $_SESSION['addStudentFailed'] = true;
        header("Location: school_students.php");
        exit();
    }
    //Close database connection. Not compulsory but good practice.
    $conn->close();
} else {
    //redirect them back to register page if they didn't click register button
    header("Location: school_students.php");
    exit();
}
