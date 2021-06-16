<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $sc_id = $_REQUEST['scid'];
  $q_id = $_REQUEST['id'];
  $cid = $_REQUEST['cid'];

  $admin_id = $_SESSION['id'];
  $activity = 'Deleted a question';

  $sql = "DELETE FROM questions WHERE q_id = '$q_id';";
  if ($conn->query($sql) == TRUE) {

    $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
    $conn->query($audit);

    $_SESSION['deleteQuestion'] = true;
    header('Location: manage_questions.php?id=' . $sc_id . '&cid=' . $cid);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
  //Close database connection. Not compulsory but good practice.
  $conn->close();
} else {
  //redirect them back to register page if they didn't click register button
  header('Location: manage_questions.php?id=' . $sc_id . '&cid=' . $cid);
  exit();
}
