<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $strand_id = $_REQUEST['id'];
  $qs_id = $_REQUEST['qid'];

  $sql = "INSERT INTO strand_formula (strand_id, qs_id) VALUES ('$strand_id', '$qs_id')";
  if ($conn->query($sql) == TRUE) {

    header("Location: strand_formula.php?id=" . $strand_id);
    exit();
  } else {

    echo "Error " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
} else {

  header("Location: manage_formula.php");
  exit();
}
