<?php

include_once '../../database.php';

$init = new database;
$init->connect();

$date_from = $_POST['date_from'];
$date_to = $_POST['date_to'];

echo 'date from: '.$date_from.' date to: '.$date_to;