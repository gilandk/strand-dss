<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $strand_id = $_REQUEST['id'];

  $sql1 = "SELECT * FROM strand_formula WHERE strand_id = '$strand_id'";
  $result = $conn->query($sql1);

  if ($result->num_rows == 0) {

    $sql = "INSERT INTO strand_formula (strand_id) VALUES ('$strand_id')";
    if ($conn->query($sql) == TRUE) {

      header("Location: strand_formula.php?id=" . $strand_id);
      exit();
    } else {

      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else {
    header("Location: strand_formula.php?id=" . $strand_id);
    exit();
  }
  $conn->close();
} else {

  header("Location: manage_strands.php");
  exit();
}
