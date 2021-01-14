<?php

session_start();

require_once('../../db.php');

if (isset($_POST)) {

    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $choice1 = mysqli_real_escape_string($conn, $_POST['choice1']);
    $choice2 = mysqli_real_escape_string($conn, $_POST['choice2']);
    $choice3 = mysqli_real_escape_string($conn, $_POST['choice3']);
    $choice4 = mysqli_real_escape_string($conn, $_POST['choice4']);
    $ans = mysqli_real_escape_string($conn, $_POST['ans']);


    $sql = "INSERT INTO questions (q_cat, question, q_A, q_B, q_C, q_D, q_Ans) VALUES ('$category', '$question', '$choice1', '$choice2', '$choice3', '$choice4', '$ans')";

    if ($conn->query($sql) == TRUE) {
        echo "<script type='text/javascript'>toastr.success('Have Fun')</script>";
        header("Location: ../question_add.php");
        exit();
    } else {
        echo "<script type='text/javascript'>toastr.danger('Have Fun')</script>";
    }
} else {
    header("Location: ../question_add.php");
    exit();
}
