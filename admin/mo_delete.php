<?php

include_once '../db/database.php';
$init = new database;

$id = $_GET['mo_id'];


$delete = $init->connect()->query("DELETE FROM sales_orders WHERE id = $id");

if($delete) {

    header('location: mo.php');

}