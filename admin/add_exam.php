<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  //explode date-range
  $date_range = mysqli_real_escape_string($conn, $_POST['exam_sched']);

  $dates = explode("-", $date_range);

  // $date_start = date('m-d-Y H:i', strtotime($dates[0]));
  // $date_end = date('m-d-Y H:i', strtotime($dates[1]));

  $date_start = $dates[0];
  $date_end = $dates[1];

  $exam_type = mysqli_real_escape_string($conn, $_POST['exam_type']);
  $guide = mysqli_real_escape_string($conn, $_POST['guide']);
  $qs_id = mysqli_real_escape_string($conn, $_POST['qs_id']);

  $admin_id = $_SESSION['id'];
  $activity = 'Added new Exam ' . $exam_type;

  $sql = "INSERT INTO exams (qs_id, exam_type, exam_guide, exam_date_s, exam_date_e) VALUES ('$qs_id', '$exam_type', '$guide', '$date_start', '$date_end')";
  if ($conn->query($sql) == TRUE) {

    $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
    $conn->query($audit);

    $_SESSION['addExamSuccess'] = true;
    header("Location: exam_examination.php");
    exit();
  } else {
    //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //if email found in database then show email already exists error.
  $_SESSION['addExamFailed'] = true;
  header("Location: exam_examination.php");
  exit();
}
