<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

  $u_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  $student_id = mysqli_real_escape_string($conn, $_POST['st_id']);
  $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
  $middlename = mysqli_real_escape_string($conn, $_POST['mname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
  $allias = mysqli_real_escape_string($conn, $_POST['allias']);
  $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);

  $school = mysqli_real_escape_string($conn, $_POST['school']);
  $grade = mysqli_real_escape_string($conn, $_POST['grade']);
  $section = mysqli_real_escape_string($conn, $_POST['section']);
  $s_year = mysqli_real_escape_string($conn, $_POST['s_year']);
  $strand_opt1 = mysqli_real_escape_string($conn, $_POST['strand1']);
  $strand_opt2 = mysqli_real_escape_string($conn, $_POST['strand2']);

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $emailcomp = mysqli_real_escape_string($conn, $_POST['emailcomp']);

  $user_id = $_SESSION['id'];
  $activity = 'Update Student Account (' . $student_id . ')';


  $oldpassword = mysqli_real_escape_string($conn, $_POST['oldpassword']);
  $newpassword = mysqli_real_escape_string($conn, $_POST['newpassword']);

  if ($newpassword == NULL) {
    $password = $oldpassword;
  } else {
    $password = $newpassword;
  }


  $emailcheck = "SELECT * FROM student_info WHERE user_email='$email'";
  $result = $conn->query($emailcheck);

  if ($email == $emailcomp) {
    $sql = "UPDATE student_info SET
        
            user_pass='$password'

            WHERE user_id = '$u_id'";
    if ($conn->query($sql) == TRUE) {

      $audit = "INSERT INTO audit_trails (user_id, activity) VALUES ('$admin_id', '$activity')";
      $conn->query($audit);

      $_SESSION['updateStudentSuccess'] = true;
      header("Location: update_account.php?id=" . $u_id);
      exit();
    } else {
      //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else if ($result->num_rows == 0) {

    $sql = "UPDATE student_info SET
        
            user_pass='$password',
            user_email='$email'

            WHERE user_id = '$u_id'";
    if ($conn->query($sql) == TRUE) {

      $audit = "INSERT INTO audit_trails (user_id, activity) VALUES ('$user_id', '$activity')";
      $conn->query($audit);

      $_SESSION['updateStudentSuccess'] = true;
      header("Location: update_account.php?id=" . $u_id);
      exit();
    } else {
      //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else {

    //if name found in database then show email already exists error.
    $_SESSION['updateStudentFailed'] = true;
    header("Location: update_account.php?id=" . $u_id);
    exit();
  }
  //Close database connection. Not compulsory but good practice.
  $conn->close();
} else {
  //redirect them back to register page if they didn't click register button
  header("Location: update_account.php?id=" . $u_id);
  exit();
}
