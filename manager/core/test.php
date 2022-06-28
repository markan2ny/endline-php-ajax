<?php
include_once '../../db/database.php';
$init = new database;


$conn = new mysqli('localhost','root','@ven2017','fashionwear');

$u = $conn->query("INSERT INTO users(name) VALUES('aa')");

if($u) {
    echo $conn->insert_id;
}