<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);

    $admin_id = $_SESSION['id'];
    $activity = 'Added new Category ' . $title;


    $sql = "INSERT INTO question_set (title) VALUES ('$title')";
    if ($conn->query($sql) == TRUE) {

        $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
        $conn->query($audit);

        $_SESSION['addQsetSuccess'] = true;
        header("Location: question_set.php");
        exit();
    } else {
        echo $conn->error;
    }
} else {
    $_SESSION['addQsetFailed'] = true;
    header("Location: question_set.php");
    exit();
}
