<?php

session_start();

require_once('../db.php');


if (isset($_POST)) {
  $c_id = $_REQUEST['cid'];
  $sc_id = $_REQUEST['id'];

  $act = "SELECT * FROM sub_category WHERE sub_id = '$sc_id'";
  $actres = $conn->query($act);
  $row = mysqli_fetch_assoc($actres);

  $admin_id = $_SESSION['id'];
  $activity = 'Deleted a sub category ' . $row['sub_title'];

  $sql = "DELETE FROM sub_category WHERE sub_id = '$sc_id';";
  if ($conn->query($sql) == TRUE) {

    $sql2 = "DELETE FROm questions WHERE q_scat = '$sc_id'";
    $conn->query($sql2);

    $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
    $conn->query($audit);

    $_SESSION['deleteSCSuccess'] = true;
    header("Location: sub_category.php?id=" . $c_id);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //if email found in database then show email already exists error.
  $_SESSION['deleteSCFailed'] = true;
  header("Location: sub_category.php?id=" . $c_id);
  exit();
}
