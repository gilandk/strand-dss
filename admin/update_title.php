<?php

session_start();

require_once('../db.php');

$field = $_POST['field'];
$value = $_POST['value'];
$editid = $_POST['id'];

$query = "UPDATE question_set SET " . $field . "='" . $value . "' WHERE qs_id=" . $editid;
$result = $conn->query($query);