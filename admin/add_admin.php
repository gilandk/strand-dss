<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $emailcheck = "SELECT * FROM admin WHERE admin_email = '$email'";
    $result = $conn->query($emailcheck);

    if ($result->num_rows == 0) {

        $sql = "INSERT INTO admin (admin_name, admin_email, admin_role, admin_status, admin_pass) VALUES ('$name', '$email', '$role', '$status', '$password')";
        if ($conn->query($sql) == TRUE) {

            $_SESSION['addAdminSuccess'] = true;
            header("Location: settings_account.php");
            exit();
        } else {
            //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
            echo "Error " . $sql . "<br>" . $conn->error;
        }
    } else {
        //if email found in database then show email already exists error.
        $_SESSION['addAdminFailed'] = true;
        header("Location: settings_account.php");
        exit();
    }
    //Close database connection. Not compulsory but good practice.
    $conn->close();
} else {
    //redirect them back to register page if they didn't click register button
    header("Location: settings_account.php");
    exit();
}
