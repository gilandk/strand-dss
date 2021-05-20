<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  //explode date-range
  $strand_id = mysqli_real_escape_string($conn, $_POST['strand_id']);

  $formula = implode(', ', $_POST['formula']);

  $sql = "INSERT INTO strand_formula (strand_id, formula) VALUES ('$strand_id', '$formula')";
  if ($conn->query($sql) == TRUE) {

    $_SESSION['UpdateFormulaSuccess'] = true;
    header("Location: strand_formula.php?id=" . $strand_id);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //if email found in database then show email already exists error.
  $_SESSION['UpdateFormulaSuccess'] = true;
  header("Location: strand_formula.php?id=" . $strand_id);
  exit();
}
