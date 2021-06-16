<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $category_id = $_REQUEST['id'];

  $act = "SELECT * FROM category WHERE cat_id = '$category_id'";
  $actres = $conn->query($act);
  $row = mysqli_fetch_assoc($actres);

  $admin_id = $_SESSION['id'];
  $activity = 'Deleted a category ' . $row['cat_name'];


  $sql = "DELETE FROM category WHERE cat_id = '$category_id';";
  if ($conn->query($sql) == TRUE) {

    $sql1 = "DELETE FROM sub_category WHERE main_cat = '$category_id'";
    $conn->query($sql1);

    $sql2 = "DELETE FROM questions WHERE q_cat = '$category_id'";
    $conn->query($sql2);

    $audit = "INSERT INTO audit_trails (admin_id, activity) VALUES ('$admin_id', '$activity')";
    $conn->query($audit);

    $_SESSION['deleteCategorySuccess'] = true;
    header("Location: exam_category.php");
    exit();
  } else {
    //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
  //Close database connection. Not compulsory but good practice.
  $conn->close();
} else {
  //redirect them back to register page if they didn't click register button
  header("Location: exam_category.php");
  exit();
}
