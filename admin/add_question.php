<?php

session_start();

require_once('../db.php');

if (isset($_POST)) {

    $q_cat = mysqli_real_escape_string($conn, $_POST['q_cat']);
    $q_scat = mysqli_real_escape_string($conn, $_POST['q_scat']);
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $choice1 = mysqli_real_escape_string($conn, $_POST['Choice1']);
    $choiceb = mysqli_real_escape_string($conn, $_POST['choiceb']);
    $choicec = mysqli_real_escape_string($conn, $_POST['choicec']);
    $choice4 = mysqli_real_escape_string($conn, $_POST['choice4']);
    $ans = mysqli_real_escape_string($conn, $_POST['ans']);
    $groupQ = mysqli_real_escape_string($conn, $_POST['groupQ']);
    $groupIndex = mysqli_real_escape_string($conn, $_POST['groupIndex']);

    if ($groupQ == 'no') {
        $groupIndex = NULL;
    }

    $sql = "INSERT INTO questions (q_cat, q_scat, question, choice1, choiceb, choicec, choice4, answerQ, groupQ, groupIndex) VALUES('$q_cat', '$q_scat', '$question', '$choice1', '$choiceb', '$choicec', '$choice4', '$ans', '$groupQ', '$groupIndex')";
    if ($conn->query($sql) == TRUE) {

        $_SESSION['addQuestionSuccess'] = true;
        header("Location: manage_questions.php?id=" . $q_scat);
        exit();
    } else {
        echo $conn->error;
    }
} else {
    $_SESSION['addQuestionFailed'] = true;
    header("Location: manage_questions.php?id=" . $q_scat);
    exit();
}
