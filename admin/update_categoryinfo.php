<?php

session_start();

require_once('../db.php');


if (isset($_POST)) {

  $qs_id = mysqli_real_escape_string($conn, $_POST['qs_id']);
  $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $category2 = mysqli_real_escape_string($conn, $_POST['category2']);
  $instruction = mysqli_real_escape_string($conn, $_POST['instruction']);
  $items = mysqli_real_escape_string($conn, $_POST['items']);

  $admin_id = $_SESSION['id'];

  $title = "SELECT * FROM category WHERE cat_name ='$category'";
  $result = $conn->query($title);


  if ($category2 == $category) {
    $sql = "UPDATE category SET cat_name='$category', cat_instruct='$instruction', cat_items='$items' WHERE cat_id = '$cat_id'";
    if ($conn->query($sql) == TRUE) {

      $activity = 'Updated a category ' . $category;

      $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
      $conn->query($audit);

      $_SESSION['UpdateCategorySuccess'] = true;
      header("Location: exam_category.php?id=" . $qs_id);
      exit();
    } else {
      //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else if ($result->num_rows == 0) {

    $sql = "UPDATE category SET cat_name='$category', cat_instruct='$instruction', cat_items='$items' WHERE cat_id = '$cat_id'";
    if ($conn->query($sql) == TRUE) {

      $activity = 'Updated a category ' . $category2 . ' to ' . $category;

      $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
      $conn->query($audit);

      $_SESSION['UpdateCategorySuccess'] = true;
      header("Location: exam_category.php?id=" . $qs_id);
      exit();
    } else {
      //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else {

    //if name found in database then show email already exists error.
    $_SESSION['UpdateCategoryFailed'] = true;
    header("Location: exam_category_edit.php?id=" . $cat_id);
    exit();
  }
  //Close database connection. Not compulsory but good practice.
  $conn->close();
} else {
  //redirect them back to register page if they didn't click register button
  header("Location: exam_category_edit.php?id=" . $cat_id);
  exit();
}
