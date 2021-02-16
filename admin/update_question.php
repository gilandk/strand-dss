<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

    $q_id = mysqli_real_escape_string($conn, $_POST['q_id']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $choice1 = mysqli_real_escape_string($conn, $_POST['choice1']);
    $choice2 = mysqli_real_escape_string($conn, $_POST['choice2']);
    $choice3 = mysqli_real_escape_string($conn, $_POST['choice3']);
    $choice4 = mysqli_real_escape_string($conn, $_POST['choice4']);
    $ans = mysqli_real_escape_string($conn, $_POST['ans']);
    $groupQ = mysqli_real_escape_string($conn, $_POST['groupQ']);
    $groupIndex = mysqli_real_escape_string($conn, $_POST['groupIndex']);

    if ($groupQ == 'no') {
        $groupIndex = NULL;
    }

    $sql = "UPDATE questions SET question='$question', choice1='$choice1', choice2='$choice2', choice3='$choice3', choice4='$choice4', answerQ='$ans', groupQ='$groupQ', groupIndex='$groupIndex' WHERE q_id='$q_id'";
    if ($conn->query($sql) == TRUE) {

        $_SESSION['updateQuestionSuccess'] = true;
        header("Location: manage_question_edit.php?id=" . $q_id);
        exit();
    } else {
        echo $conn->error;
    }
} else {
    $_SESSION['updateQuestionFailed'] = true;
    header("Location: manage_questions_edit.php?id=" . $q_id);
    exit();
}
