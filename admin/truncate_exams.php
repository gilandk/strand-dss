<?php

session_start();

require_once('../db.php');

$sql = "TRUNCATE TABLE exams";
if ($conn->query($sql) == TRUE) {

  $sql1 = "TRUNCATE TABLE exam_category";
  $conn->query($sql1);

  $sql2 = "TRUNCATE TABLE exam_answers";
  $conn->query($sql2);

  $sql3 = "TRUNCATE TABLE examinee_student";
  $conn->query($sql3);

  $_SESSION['truncateSuccess'] = true;
  header("Location: maintenance.php");
  exit();
} else {
  //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
  echo "Error " . $sql . "<br>" . $conn->error;

  $_SESSION['truncateFailed'] = true;
  header("Location: maintenance.php");
}
