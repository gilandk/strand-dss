<?php

session_start();

require_once('db.php');

if (isset($_POST)) {

  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $status = 'Active';

  $emailcheck = "SELECT * FROM student_info WHERE user_email = '$email'";
  $result = $conn->query($emailcheck);

  if ($result->num_rows == 0) {

    $sql = "INSERT INTO student_info (firstname, lastname, user_email, user_pass, status)
                                    VALUES ('$fname', '$lname', '$email', '$password', '$status')";
    if ($conn->query($sql) == TRUE) {

      $sql1 = "SELECT * FROM student_info WHERE user_email='$email' AND user_pass='$password'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
          $_SESSION['logged_in'] = 'yes';
          $_SESSION['fullname'] = $row['firstname'] . ' ' . $row['lastname'] . ' ' . $row['allias'];
          $_SESSION['status'] = $row['status'];
          $_SESSION['id'] = $row['user_id'];
          $_SESSION['uid'] = $row['student_uid'];
          $_SESSION['role'] = 'User';
        }
      }

      $_SESSION['RegisterSuccess'] = true;
      header("Location: users/index.php");
      exit();
    } else {
      //If data failed to insert then show that error. Note: This condition should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
      echo "Error " . $sql . "<br>" . $conn->error;
    }
  } else {
    //if email found in database then show email already exists error.
    $_SESSION['RegisterFailed'] = true;
    header("Location: register.php");
    exit();
  }
  //Close database connection. Not compulsory but good practice.
  $conn->close();
} else {
  //redirect them back to register page if they didn't click register button
  header("Location: register.php");
  exit();
}
