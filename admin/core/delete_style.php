<?php
include_once '../../db/database.php';
$init = new database;

$id = $_POST['id'];

$delete = $init->connect()->query("DELETE FROM styles WHERE id = $id");

if($delete) {
    echo json_encode(['success' => 'Style has been deleted!']);
} else {
    echo json_encode(['error' => 'Failed to delete!']);
}
