<?php

session_start();

require_once('../db.php');


if (isset($_POST)) {

  $sc_id = $_REQUEST['id'];

  $sql = "DELETE FROM sub_category WHERE sub_id = '$sc_id';";
  if ($conn->query($sql) == TRUE) {

    $sql2 = "DELETE FROm questions WHERE q_scat = '$category_id'";
    $conn->query($sql2);

    $_SESSION['deleteSCSuccess'] = true;
    header("Location: sub_category.php?id=" . $main_cat);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //if email found in database then show email already exists error.
  $_SESSION['deleteSCFailed'] = true;
  header("Location: sub_category.php?id=" . $main_cat);
  exit();
}
