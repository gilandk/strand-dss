<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {


  $strand_name = mysqli_real_escape_string($conn, $_POST['strand_name']);
  $strand_abr = mysqli_real_escape_string($conn, $_POST['strand_abr']);
  $strand_description = mysqli_real_escape_string($conn, $_POST['strand_description']);

  $title = "SELECT * FROM strands WHERE strand_name = '$strand_name'";
  $result = $conn->query($title);

  if ($result->num_rows == 0) {

    $sql = "INSERT INTO strands (strand_name, strand_abr, strand_description) VALUES ('$strand_name', '$strand_abr', '$strand_description')";
    if ($conn->query($sql) == TRUE) {

      $_SESSION['addStrandSuccess'] = true;
      header("Location: manage_strands.php");
      exit();
    } else {
      //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else {
    //if email found in database then show email already exists error.
    $_SESSION['addStrandFailed'] = true;
    header("Location: manage_strands.php");
    exit();
  }
  //Close database connection. Not compulsory but good practice.
  $conn->close();
} else {
  //redirect them back to register page if they didn't click register button
  header("Location: manage_strands.php");
  exit();
}
