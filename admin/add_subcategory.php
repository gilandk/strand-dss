<?php

session_start();

require_once('../db.php');


if (isset($_POST)) {

  $main_cat = mysqli_real_escape_string($conn, $_POST['main_id']);
  $qs_id = mysqli_real_escape_string($conn, $_POST['qs_id']);
  $sc_title = mysqli_real_escape_string($conn, $_POST['subcategory']);
  $sc_instruct = mysqli_real_escape_string($conn, $_POST['instruction']);

  $admin_id = $_SESSION['id'];
  $activity = 'Added new sub category ' . $sc_title;

  $sql = "INSERT INTO sub_category (main_cat, qs_id, sub_title, sub_instruction) VALUES ('$main_cat', '$qs_id', '$sc_title', '$sc_instruct')";
  if ($conn->query($sql) == TRUE) {

    $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
    $conn->query($audit);

    $_SESSION['addSCSuccess'] = true;
    header("Location: sub_category.php?id=" . $main_cat . '&qs_id=' . $qs_id);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //if email found in database then show email already exists error.
  $_SESSION['addSCFailed'] = true;
  header("Location: sub_category.php?id=" . $main_cat . '&qs_id=' . $qs_id);
  exit();
}
