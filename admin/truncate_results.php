<?php

session_start();

require_once('../db.php');

$sql = "TRUNCATE TABLE exam_answers";
if ($conn->query($sql) == TRUE) {

  $_SESSION['truncateSuccess'] = true;
  header("Location: maintenance.php");
  exit();
} else {
  //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
  echo "Error " . $sql . "<br>" . $conn->error;

  $_SESSION['truncateFailed'] = true;
  header("Location: maintenance.php");
}
