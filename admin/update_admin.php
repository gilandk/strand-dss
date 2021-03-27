<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

    $a_id = mysqli_real_escape_string($conn, $_POST['a_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $emailcomp = mysqli_real_escape_string($conn, $_POST['emailcomp']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
    $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);

    if ($newpassword == NULL) {
        $password = $oldpassword;
    } else {
        $password = $newpassword;
    }

    $emailcheck = "SELECT * FROM admin WHERE admin_email = '$email'";
    $result = $conn->query($emailcheck);

    if ($email == $emailcomp) {
        $sql = "UPDATE admin SET admin_name='$name', admin_role='$role', admin_pass='$password' WHERE admin_id = '$a_id'";
        if ($conn->query($sql) == TRUE) {

            $_SESSION['updateAdminSuccess'] = true;
            header("Location: settings_account_edit.php?id=" . $a_id);
            exit();
        } else {
            //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
            echo "Error " . $sql . "<br>" . $conn->error;
        }
    } else if ($result->num_rows == 0) {

        $sql = "UPDATE admin SET admin_name='$name', admin_email='$email', admin_role='$role', admin_pass='$password' WHERE admin_id = '$a_id'";
        if ($conn->query($sql) == TRUE) {

            $_SESSION['updateAdminSuccess'] = true;
            header("Location: settings_account_edit.php?id=" . $a_id);
            exit();
        } else {
            //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
            echo "Error " . $sql . "<br>" . $conn->error;
        }
    } else {

        //if name found in database then show email already exists error.
        $_SESSION['updateAdminFailed'] = true;
        header("Location: settings_account_edit.php?id=" . $a_id);
        exit();
    }
    //Close database connection. Not compulsory but good practice.
    $conn->close();
} else {
    //redirect them back to register page if they didn't click register button
    header("Location: settings_account_edit.php?id=" . $a_id);
    exit();
}
