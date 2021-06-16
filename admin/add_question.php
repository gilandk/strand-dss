<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $q_cat = mysqli_real_escape_string($conn, $_POST['q_cat']);
  $q_scat = mysqli_real_escape_string($conn, $_POST['q_scat']);
  $question = mysqli_real_escape_string($conn, $_POST['question']);
  $choice1 = mysqli_real_escape_string($conn, $_POST['choice1']);
  $choice2 = mysqli_real_escape_string($conn, $_POST['choice2']);
  $choice3 = mysqli_real_escape_string($conn, $_POST['choice3']);
  $choice4 = mysqli_real_escape_string($conn, $_POST['choice4']);
  $ans = mysqli_real_escape_string($conn, $_POST['ans']);

  $admin_id = $_SESSION['id'];
  $activity = 'Added new question';

  $sql = "INSERT INTO questions (q_cat, q_scat, question, choice1, choice2, choice3, choice4, answerQ) VALUES('$q_cat', '$q_scat', '$question', '$choice1', '$choice2', '$choice3', '$choice4', '$ans')";
  if ($conn->query($sql) == TRUE) {

    $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
    $conn->query($audit);

    $_SESSION['addQuestionSuccess'] = true;
    header("Location: manage_questions.php?id=" . $q_scat . '&cid=' . $q_cat);
    exit();
  } else {
    echo $conn->error;
  }
} else {
  $_SESSION['addQuestionFailed'] = true;
  header("Location: manage_questions.php?id=" . $q_scat . '&cid=' . $q_cat);
  exit();
}
