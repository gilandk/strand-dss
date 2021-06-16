<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $strand_id = mysqli_real_escape_string($conn, $_POST['strand_id']);
  $strand_name = mysqli_real_escape_string($conn, $_POST['strand_name']);
  $strand_name2 = mysqli_real_escape_string($conn, $_POST['strand2']);
  $strand_abr = mysqli_real_escape_string($conn, $_POST['strand_abr']);
  $strand_description = mysqli_real_escape_string($conn, $_POST['strand_description']);

  $admin_id = $_SESSION['id'];

  $title = "SELECT * FROM strands WHERE strand_name = '$strand_name'";
  $result = $conn->query($title);

  if ($strand_name2 == $strand_name) {
    $sql = "UPDATE strands SET strand_name='$strand_name', strand_abr='$strand_abr', strand_description='$strand_description' WHERE strand_id = '$strand_id'";
    if ($conn->query($sql) == TRUE) {

      $activity = 'Updated a strand ' . $strand_name;
      $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
      $conn->query($audit);

      $_SESSION['UpdateStrandSuccess'] = true;
      header("Location: manage_strands.php");
      exit();
    } else {
      //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else if ($result->num_rows == 0) {

    $sql = "UPDATE strands SET strand_name='$strand_name', strand_abr='$strand_abr', strand_description='$strand_description' WHERE strand_id = '$strand_id'";
    if ($conn->query($sql) == TRUE) {

      $activity = 'Updated a strand ' . $strand_name2 . '  to ' . $strand_name;
      $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
      $conn->query($audit);

      $_SESSION['UpdateStrandSuccess'] = true;
      header("Location: manage_strands.php");
      exit();
    } else {
      //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else {

    //if name found in database then show email already exists error.
    $_SESSION['UpdateStrandFailed'] = true;
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
