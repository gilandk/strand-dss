<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

    //explode date-range
    $date_range = mysqli_real_escape_string($conn, $_POST['exam_sched']);
    $dates = explode("-", $date_range);

    $date_start = date('m-d-Y H:i', strtotime($dates[0]));
    $date_end = date('m-d-Y H:i', strtotime($dates[1]));

    $exam_type = mysqli_real_escape_string($conn, $_POST['exam_type']);
    $guide = mysqli_real_escape_string($conn, $_POST['guide']);
    $hour = mysqli_real_escape_string($conn, $_POST['hours']);
    $min = mysqli_real_escape_string($conn, $_POST['min']);

    $sql = "INSERT INTO exams (exam_type, exam_guide, exam_hour, exam_min, exam_date_s, exam_date_e) VALUES ('$exam_type', '$guide', '$hour', '$min', '$date_start', '$date_end')";
    if ($conn->query($sql) == TRUE) {

        $_SESSION['addExamSuccess'] = true;
        header("Location: exam_examination.php");
        exit();
    } else {
        //If data failed to insert then show that error. Note: This conditio n should not come unless we as a developer make mistake or someone tries to hack their way in and mess up
        echo "Error " . $sql . "<br>" . $conn->error;
    }
} else {
    //if email found in database then show email already exists error.
    $_SESSION['addExamFailed'] = true;
    header("Location: exam_examination.php");
    exit();
}
