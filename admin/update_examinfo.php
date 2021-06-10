<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $exam_id = mysqli_real_escape_string($conn, $_POST['exam_id']);
  //explode date-range
  $date_range = mysqli_real_escape_string($conn, $_POST['exam_sched']);
  $dates = explode("-", $date_range);

  // $date_start = date('m-d-Y H:i', strtotime($dates[0]));
  // $date_end = date('m-d-Y H:i', strtotime($dates[1]));

  $date_start = $dates[0];
  $date_end = $dates[1];

  $exam_type = mysqli_real_escape_string($conn, $_POST['exam_type']);
  $guide = mysqli_real_escape_string($conn, $_POST['guide']);

  $sql = "UPDATE exams SET exam_type='$exam_type', exam_guide='$guide', exam_date_s='$date_start', exam_date_e='$date_end' WHERE exam_id = '$exam_id'";
  if ($conn->query($sql) == TRUE) {

    $_SESSION['UpdateExamSuccess'] = true;
    header('location: manage_exam.php?id=' . $exam_id);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //if email found in database then show email already exists error.
  $_SESSION['UpdateExamFailed'] = true;
  header('location: manage_exam.php?id=' . $exam_id);
  exit();
}
