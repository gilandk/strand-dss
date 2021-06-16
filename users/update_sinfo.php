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

  $user_id = $_SESSION['id'];
  $activity = 'Update Student Account (' . $student_id . ')';

  $sql = "UPDATE student_info SET
        
            student_id='$student_id',
            firstname='$firstname',
            middlename='$middlename',
            lastname='$lastname',
            allias='$allias',
            birthdate='$birthdate',
            age='$age',
            contact='$contact',
            school='$school',
            s_year='$s_year',
            grade='$grade',
            section='$section',
            strand_opt1='$strand_opt1',
            strand_opt2='$strand_opt2'

            WHERE user_id = '$u_id'";
  if ($conn->query($sql) == TRUE) {


    $audit = "INSERT INTO audit_trails (user_id, activity) VALUES ('$user_id', '$activity')";
    $conn->query($audit);

    $_SESSION['updateStudentSuccess'] = true;
    header("Location: update_info.php?id=" . $u_id);
    exit();
  } else {
    //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
    echo "Error " . $sql . "<br>" . $conn->error;
  }
} else {
  //redirect them back to register page if they didn't click register button
  header("Location: update_info.php?id=" . $u_id);
  exit();
}
