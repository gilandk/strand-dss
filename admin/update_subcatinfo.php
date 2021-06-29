<?php

session_start();

require_once('../db.php');


if (isset($_POST)) {

  $qs_id = mysqli_real_escape_string($conn, $_POST['qs_id']);
  $sc_id = mysqli_real_escape_string($conn, $_POST['sc_id']);
  $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
  $sc_title = mysqli_real_escape_string($conn, $_POST['subcategory']);
  $sc_instruct = mysqli_real_escape_string($conn, $_POST['instruction']);

  $admin_id = $_SESSION['id'];
  $activity = 'Updated a sub category ' . $sc_title;

  $sql = "UPDATE sub_category SET sub_title='$sc_title', sub_instruction='$sc_instruct' WHERE sub_id='$sc_id'";
  if ($conn->query($sql) == TRUE) {

    $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
    $conn->query($audit);

    $_SESSION['updateSCSuccess'] = true;
    header("Location: sub_category.php?id=" . $cat_id . '&qs_id=' . $qs_id);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //if email found in database then show email already exists error.
  $_SESSION['updateSCFailed'] = true;
   header("Location: sub_category.php?id=" . $cat_id . '&qs_id=' . $qs_id);
  exit();
}
