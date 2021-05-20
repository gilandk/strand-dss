<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {


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

  $sql3 = "SELECT * FROM category WHERE cat_id = '$c_id'";
  $result3 = $conn->query($sql3);

  if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
      $cat_items = $row3['cat_items'];

      $percentile = ($score / $cat_items) * 100;

      if ($percentile == 0 or $percentile <= 20) {
        $apt = 'Very Low';
        $val = 0;
      } elseif ($percentile == 21 or $percentile <= 30) {
        $apt = 'Low';
        $val = 1;
      } elseif ($percentile == 31 or $percentile <= 40) {
        $apt = 'Below Average';
        $val = 2;
      } elseif ($percentile == 51 or $percentile <= 50) {
        $apt = 'Low Average';
        $val = 3;
      } elseif ($percentile == 51 or $percentile <= 60) {
        $apt = 'Average';
        $val = 4;
      } elseif ($percentile == 61 or $percentile <= 70) {
        $apt = 'High Average';
        $val = 5;
      } elseif ($percentile == 71 or $percentile <= 80) {
        $apt = 'Well Above Average';
        $val = 6;
      } elseif ($percentile == 81 or $percentile <= 90) {
        $apt = 'Superior';
        $val = 7;
      } elseif ($percentile == 91 or $percentile <= 100) {
        $apt = 'Very Superior';
        $val = 8;
      } else {
        $apt = '';
      }
    }
  }

  echo $score;
  echo $apt;
  echo $percentile;
  echo $val;

  $sql = "INSERT INTO exam_answers
      (exam_id, examinee_id, category_id, score, status, percentile, aptitude, value)
      VALUES
      ('$e_id', '$user_id', '$c_id', '$score', '$status', '$percentile', '$apt', '$val')";
  if ($conn->query($sql) == TRUE) {

    $_SESSION['submitExamSuccess'] = true;
    header("Location: exam_info.php?id=" . $e_id);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //if email found in database then show email already exists error.
  $_SESSION['submitExamFailed'] = true;
  header("Location: exam_info.php?id=" . $e_id);
  exit();
}
