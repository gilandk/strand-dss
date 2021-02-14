<?php

session_start();

require_once('../db.php');


if (isset($_POST)) {

    $sc_id = mysqli_real_escape_string($conn, $_POST['sc_id']);
    $main_cat = mysqli_real_escape_string($conn, $_POST['main_id']);
    $sc_title = mysqli_real_escape_string($conn, $_POST['subcategory']);
    $sc_instruct = mysqli_real_escape_string($conn, $_POST['instruction']);
    $sc_index = mysqli_real_escape_string($conn, $_POST['sc_index']);

    $sql = "INSERT INTO sub_category (main_cat, sub_title, sub_instruction, sc_index) VALUES ('$main_cat', '$sc_title', '$sc_instruct', '$sc_index')";
    if ($conn->query($sql) == TRUE) {

        $_SESSION['addSCSuccess'] = true;
        header("Location: sub_category.php?id=" . $main_cat);
        exit();
    } else {
        //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
        echo "Error " . $sql . "<br>" . $conn->error;
    }
} else {
    //if email found in database then show email already exists error.
    $_SESSION['addSCFailed'] = true;
    header("Location: sub_category.php?id=" . $main_cat);
    exit();
}
