<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $q_id = $_REQUEST['id'];


  $sql = "DELETE FROM questions WHERE q_id = '$q_id';";
  if ($conn->query($sql) == TRUE) {


    $_SESSION['deleteQuestion'] = true;
    header("Location: exam_category.php");
    exit();
  } else {
    //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
  //Close database connection. Not compulsory but good practice.
  $conn->close();
} else {
  //redirect them back to register page if they didn't click register button
  header("Location: exam_category.php");
  exit();
}
