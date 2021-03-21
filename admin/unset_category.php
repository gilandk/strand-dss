<?php

session_start();

require_once('../db.php');

$msg = '';

$exam_ID = $_REQUEST['eid'];
$ec_id = $_REQUEST['id'];


$sql = "DELETE FROM exam_category WHERE ec_id='$ec_id'";
$result = $conn->query($sql);

if ($result === TRUE) {
    header('location: manage_exam.php?id=' . $exam_ID);
} else {

    $msg = "FAILED TO DELETE";
    echo "<script type='text/javascript'>
    alert('$msg');
    window.location.href='manage_exam.php?id=' . $exam_ID';
    </script>";
}
