<?php

include_once '../../db/database.php';
$init = new database;

$id = $_POST['hidden_id'];
$fixed_qty = $_POST['fixed_qty'];

$u = $init->connect()->query("UPDATE evaluations SET bad_qty = bad_qty - $fixed_qty WHERE id = $id");

if($u) {
    echo json_encode(['success' => 'Item has been updated!']);
} else {
    echo json_encode(['error' => 'Something wrong..']);
}