<?php

include_once '../../db/database.php';
$init = new database;

$id = $_POST['id'];

$get = $init->connect()->query("SELECT * FROM evaluations WHERE id = $id");
if($get->num_rows > 0) {
    echo json_encode(['data' => $get->fetch_object()]);
} else {
    echo json_encode(['error' => 'Something wrong..']);
}