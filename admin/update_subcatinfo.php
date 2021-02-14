<?php

session_start();

require_once('../db.php');


if (isset($_POST)) {

    $sc_id = mysqli_real_escape_string($conn, $_POST['sc_id']);
    $sc_title = mysqli_real_escape_string($conn, $_POST['subcategory']);
    $sc_instruct = mysqli_real_escape_string($conn, $_POST['instruction']);
    $sc_index = mysqli_real_escape_string($conn, $_POST['sc_index']);

    $sql = "UPDATE sub_category SET sub_title='$sc_title', sub_instruction='$sc_instruct', sc_index='$sc_index' WHERE sub_id='$sc_id'";
    if ($conn->query($sql) == TRUE) {

        $_SESSION['updateSCSuccess'] = true;
        header("Location: subcat_edit.php?id=" . $sc_id);
        exit();
    } else {
        //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
        echo "Error " . $sql . "<br>" . $conn->error;
    }
} else {
    //if email found in database then show email already exists error.
    $_SESSION['updateSCFailed'] = true;
    header("Location: subcat_edit.php?id=" . $sc_id);
    exit();
}
