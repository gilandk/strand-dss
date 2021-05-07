<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {


  $exam_id = $_REQUEST['id'];
  $user_id = $_SESSION['id'];
  $exam_status = 0;

  $sql1 = "SELECT * FROM examinee_student WHERE exam_id = '$exam_id' AND student_id = '$student_id'";
  $result = $conn->query($sql1);

  if ($result->num_rows == 0) {
    $sql = "INSERT INTO examinee_student (exam_id, student_id, exam_status) VALUES ('$exam_id', '$user_id', '$exam_status')";
    if ($conn->query($sql) == TRUE) {

      $_SESSION['examStatus'] = 'Ongoing';
      header("Location: exam_info.php?id=" . $exam_id);
      exit();
    } else {
      echo $conn->error;
    }
  } else {
    $_SESSION['examStatus'] = 'Resume';
    header("Location: exam_info.php?id=" . $exam_id);
    exit();
  }
}
