<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {



  $sf_id = mysqli_real_escape_string($conn, $_POST['sf_id']);
  $mode = mysqli_real_escape_string($conn, $_POST['mode']);
  $strand_id = mysqli_real_escape_string($conn, $_POST['strand_id']);
  $category1 = mysqli_real_escape_string($conn, $_POST['category1']);
  $category2 = mysqli_real_escape_string($conn, $_POST['category2']);
  $category3 = mysqli_real_escape_string($conn, $_POST['category3']);
  $category4 = mysqli_real_escape_string($conn, $_POST['category4']);
  $category5 = mysqli_real_escape_string($conn, $_POST['category5']);
  $category6 = mysqli_real_escape_string($conn, $_POST['category6']);
  $category7 = mysqli_real_escape_string($conn, $_POST['category7']);
  $category8 = mysqli_real_escape_string($conn, $_POST['category8']);
  $category9 = mysqli_real_escape_string($conn, $_POST['category9']);
  $category10 = mysqli_real_escape_string($conn, $_POST['category10']);

  $checkedBoxes = 0;

  // Depending on the action, you set in the form, you have to either choose $_POST or $_POST
  if (isset($_POST["category1"])) {
    $checkedBoxes++;
  }
  if (isset($_POST["category2"])) {
    $checkedBoxes++;
  }
  if (isset($_POST["category3"])) {
    $checkedBoxes++;
  }
  if (isset($_POST["category4"])) {
    $checkedBoxes++;
  }
  if (isset($_POST["category5"])) {
    $checkedBoxes++;
  }
  if (isset($_POST["category6"])) {
    $checkedBoxes++;
  }
  if (isset($_POST["category7"])) {
    $checkedBoxes++;
  }
  if (isset($_POST["category8"])) {
    $checkedBoxes++;
  }
  if (isset($_POST["category9"])) {
    $checkedBoxes++;
  }
  if (isset($_POST["category10"])) {
    $checkedBoxes++;
  }

  $total = $checkedBoxes;


  if ($mode == 'edit') {
    $sql1 = "UPDATE strand_formula SET
      strand_id='$strand_id',
      category1='$category1',
      category2='$category2',
      category3='$category3',
      category4='$category4',
      category5='$category5',
      category6='$category6',
      category7='$category7',
      category8='$category8',
      category9='$category9',
      category10='$category10',
      total_category='$total'
      WHERE sf_id='$sf_id'";

    if ($conn->query($sql1) == TRUE) {
      $_SESSION['UpdateFormulaSuccess'] = true;
      header("Location: strand_formula.php?id=" . $strand_id);
      exit();
    } else {
      //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql1 . "<br>" . $conn->error;
    }
  } else {
    $sql = "INSERT INTO strand_formula (strand_id, category1, category2, category3, category4, category5, category6, category7, category8, category9, category10, total_category) VALUES
      ('$strand_id',
      '$category1',
      '$category2',
      '$category3',
      '$category4',
      '$category5',
      '$category6',
      '$category7',
      '$category8',
      '$category9',
      '$category10',
      '$total')";
    if ($conn->query($sql) == TRUE) {
      $_SESSION['UpdateFormulaSuccess'] = true;
      header("Location: strand_formula.php?id=" . $strand_id);
      exit();
    } else {
      //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  }
} else {

  $_SESSION['UpdateFormulaSuccess'] = true;
  header("Location: strand_formula.php?id=" . $strand_id);
  exit();
}
