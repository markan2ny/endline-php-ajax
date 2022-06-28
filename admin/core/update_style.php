<?php
include_once '../../db/database.php';
$init = new database;


$id = $_POST['edit_hidden_id'];
$name = $_POST['edit_name'];

$update = $init->connect()->query("UPDATE styles SET name='$name' WHERE id = $id");

if ($update) {
    echo json_encode(['success' => 'Style has been updated!']);
} else {
    echo json_encode(['error' => 'Failed to update']);
}
