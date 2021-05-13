<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $q_id = mysqli_real_escape_string($conn, $_POST['q_id']);
  $q_scat = mysqli_real_escape_string($conn, $_POST['q_scat']);
  $question = mysqli_real_escape_string($conn, $_POST['question']);
  $choice1 = mysqli_real_escape_string($conn, $_POST['choice1']);
  $choice2 = mysqli_real_escape_string($conn, $_POST['choice2']);
  $choice3 = mysqli_real_escape_string($conn, $_POST['choice3']);
  $choice4 = mysqli_real_escape_string($conn, $_POST['choice4']);
  $ans = mysqli_real_escape_string($conn, $_POST['ans']);
  $q_item = mysqli_real_escape_string($conn, $_POST['q_item']);

  $sql = "UPDATE questions SET question='$question', choice1='$choice1', choice2='$choice2', choice3='$choice3', choice4='$choice4', answerQ='$ans', q_item='$q_item' WHERE q_id='$q_id'";
  if ($conn->query($sql) == TRUE) {

    $_SESSION['updateQuestionSuccess'] = true;
    header("Location: manage_questions.php?id=" . $q_scat);
    exit();
  } else {
    echo $conn->error;
  }
} else {
  $_SESSION['updateQuestionFailed'] = true;
  header("Location: manage_questions.php?id=" . $q_scat);
  exit();
}
