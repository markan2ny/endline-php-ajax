<?php
session_start();

include_once '../database.php';

$init = new database;
$init->connect();