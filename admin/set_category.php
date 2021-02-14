<?php

session_start();

require_once('../db.php');

$msg = '';

$exam_ID = $_REQUEST['eid'];
$cat_ID = $_REQUEST['cid'];

$q = "SELECT * FROM exam_category WHERE examID='$exam_ID' AND catID='$cat_ID'";
$r = $conn->query($q);

if ($r->num_rows == 0) {


    $sql = "INSERT INTO exam_category (examID, catID, cat_status) VALUES ('$exam_ID', '$cat_ID', 'active')";
    $result = $conn->query($sql);

    if ($result === TRUE) {

        header('location: manage_exam.php?id=' . $exam_ID);
    } else {

        $msg = "FAILED TO ADD";
        echo "<script type='text/javascript'>
    alert('$msg');
    window.location.href='manage_exam.php?id=' . $exam_ID';
    </script>";
    }
} else {

    $msg = "FAILED, ALREADY IN THE LIST";
    echo "<script type='text/javascript'>
    alert('$msg');
    window.location.href='manage_exam.php?id=' . $exam_ID';
    </script>";
}
