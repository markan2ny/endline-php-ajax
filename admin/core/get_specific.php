<?php
include_once '../../db/database.php';
$init = new database;

$id = $_POST['id'];

$get = $init->connect()->query("SELECT * FROM styles WHERE id = $id");

if ($get->num_rows > 0) {
    echo json_encode($get->fetch_object());
}
