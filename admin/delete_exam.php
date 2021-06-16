<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $e_id = $_REQUEST['id'];

  $act = "SELECT * FROM exams WHERE exam_id = '$e_id'";
  $actres = $conn->query($act);
  $row = mysqli_fetch_assoc($actres);

  $admin_id = $_SESSION['id'];
  $activity = 'Deleted an exam ' . $row['exam_type'];

  $sql = "DELETE FROM exams WHERE exam_id = '$e_id';";
  if ($conn->query($sql) == TRUE) {

    $sql1 = "DELETE FROM exam_category WHERE examID = '$e_id'";
    $conn->query($sql1);

    $sql2 = "DELETE FROM exam_answers WHERE exam_id = '$e_id'";
    $conn->query($sql2);

    $sql3 = "DELETE FROM examinee_student WHERE exam_id = '$e_id'";
    $conn->query($sql3);

    $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
    $conn->query($audit);

    $_SESSION['deleteExam'] = true;
    header("Location: exam_examination.php");
    exit();
  } else {
    //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
  //Close database connection. Not compulsory but good practice.
  $conn->close();
} else {
  //redirect them back to register page if they didn't click register button
  header("Location: exam_examination.php");
  exit();
}
