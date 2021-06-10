<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $instruction = mysqli_real_escape_string($conn, $_POST['instruction']);
  $items = mysqli_real_escape_string($conn, $_POST['items']);

  $title = "SELECT * FROM category WHERE cat_name = '$category'";
  $result = $conn->query($title);

  if ($result->num_rows == 0) {

    $sql = "INSERT INTO category (cat_name, cat_instruct, cat_items) VALUES ('$category', '$instruction', '$items')";
    if ($conn->query($sql) == TRUE) {

      $_SESSION['addCategorySuccess'] = true;
      header("Location: exam_category.php");
      exit();
    } else {
      //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else {
    //if email found in database then show email already exists error.
    $_SESSION['addCategoryFailed'] = true;
    header("Location: exam_category.php");
    exit();
  }
  //Close database connection. Not compulsory but good practice.
  $conn->close();
} else {
  //redirect them back to register page if they didn't click register button
  header("Location: exam_category.php");
  exit();
}
