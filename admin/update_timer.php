<?php

session_start();

require_once('../db.php');

$field = $_POST['field'];
$value = $_POST['value'];
$editid = $_POST['id'];

$query = "UPDATE exam_category SET " . $field . "='" . $value . "' WHERE ec_id=" . $editid;
$result = $conn->query($query);
