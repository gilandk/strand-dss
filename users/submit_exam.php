<?php

session_start();

require_once('../db.php');

if (isset($_POST['submit'])) {


  $e_id = mysqli_real_escape_string($conn, $_POST['e_id']);
  $user_id = $_SESSION['id'];
  $c_id = mysqli_real_escape_string($conn, $_POST['c_id']);
  $status = 1;


  if (!empty($_POST['ans'])) {

    $count = count($_POST['ans']);

    $score = 0;
    $i = 1;

    $selected = $_POST['ans'];
    print_r($selected);

    $q = "SELECT * FROM questions WHERE q_cat = '$c_id' ORDER BY q_item";
    $resultq = $conn->query($q);

    while ($q = $resultq->fetch_array()) {
      $answer = $q['answerQ'];
      print_r($answer);

      $checked = $answer == $selected[$i];

      if ($checked) {
        $score++;
      }
      $i++;
    }
  }

  $score;

  $sql = "INSERT INTO exam_answers
    (exam_id, examinee_id, category_id, score, status)
    VALUES
    ('$e_id', '$user_id', '$c_id', '$score', '$status')";
  if ($conn->query($sql) == TRUE) {

    $_SESSION['answerExamSuccess'] = true;
    header("Location: exam_info.php?id=" . $e_id);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //if email found in database then show email already exists error.
  $_SESSION['answerExamFailed'] = true;
  header("Location: exam_info.php?id=" . $e_id);
  exit();
}
