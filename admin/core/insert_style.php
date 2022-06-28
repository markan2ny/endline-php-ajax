<?php

include_once '../../db/database.php';
$init = new database;

$name = $_POST['name'];

$insert = $init->connect()->query("INSERT INTO styles(name) VALUES('$name')");

if($insert) {
    echo json_encode(['success' => 'New style has been inserted!']);
} else {
    echo json_encode(['error' => 'Failed to insert!']);
}