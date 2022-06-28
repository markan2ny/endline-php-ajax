<?php
include_once '../../db/database.php';
$init = new database;

$id = $_POST['id'];

$u = $init->connect()->query("UPDATE evaluations SET status = 1 WHERE id = $id");

if($u) {
    echo json_encode(['success' => 'Success']);
} else {
    echo json_encode(['error' => 'Error']);
}