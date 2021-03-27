<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

    $f_id = mysqli_real_escape_string($conn, $_POST['f_id']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);

    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $emailcheck = "SELECT * FROM school_admin WHERE sa_email = '$email'";
    $result = $conn->query($emailcheck);

    if ($result->num_rows == 0) {

        $sql = "INSERT INTO school_admin (sa_uid, sa_fullname, sa_email, sa_pass, sa_contact, sa_position)
                                    VALUES ('$f_id','$fname', '$email', '$password', '$contact', '$position')";
        if ($conn->query($sql) == TRUE) {

            $_SESSION['addFacilitatorSuccess'] = true;
            header("Location: school_facilitator.php");
            exit();
        } else {
            //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
            echo "Error " . $sql . "<br>" . $conn->error;
        }
    } else {
        //if email found in database then show email already exists error.
        $_SESSION['addFacilitatorFailed'] = true;
        header("Location: school_facilitator.php");
        exit();
    }
    //Close database connection. Not compulsory but good practice.
    $conn->close();
} else {
    //redirect them back to register page if they didn't click register button
    header("Location: school_facilitator.php");
    exit();
}
