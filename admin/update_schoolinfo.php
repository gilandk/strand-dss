<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

    $school_id = mysqli_real_escape_string($conn, $_POST['s_id']);
    $school_name = mysqli_real_escape_string($conn, $_POST['school_name']);
    $school_address = mysqli_real_escape_string($conn, $_POST['school_address']);
    $strands = mysqli_real_escape_string($conn, $_POST['strands']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);


    $sql = "UPDATE school_info SET school_name='$school_name', school_address='$school_address', strands='$strands', email='$email', contact='$contact' WHERE school_id = '$school_id' ";
    if ($conn->query($sql) == TRUE) {

        $_SESSION['updateSchoolSuccess'] = true;
        header("Location:school_details.php");
        exit();
    } else {
        echo $conn->error;
    }
} else {
    $_SESSION['updateSchoolFailed'] = true;
    header("Location:school_details.php");
    exit();
}
