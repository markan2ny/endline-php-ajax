<?php
include_once '../../db/database.php';
$init = new database;

$conn = new mysqli('localhost', 'root', '@ven2017', 'endline_db');


$mo_name = trim($_POST['mo_name']);
$bundle_tag = trim($_POST['bundle_tag']);
$quantity = trim($_POST['quantity']);
$remark = trim($_POST['radio_1']);
$bad_qty = !empty($_POST['bad_qty']) ? $_POST['bad_qty'] : 0;
$status = !empty($_POST['bad_qty']) ? 0 : 1;
$evaluator = trim($_POST['evaluator']);
$eval_id = $_POST['eval_id'];

$bad1 = isset($_POST['bad_1']) ? trim($_POST['bad_1']) : null;
$bad2 = isset($_POST['bad_2']) ? trim($_POST['bad_2']) : null;
$bad3 = isset($_POST['bad_3']) ? trim($_POST['bad_3']) : null;
$bad4 = isset($_POST['bad_4']) ? trim($_POST['bad_4']) : null;
$bad5 = isset($_POST['bad_5']) ? trim($_POST['bad_5']) : null;


// $av = ($quantity - $bad1);

$total_good =  ($quantity - $bad_qty);


$i = $conn->query("INSERT INTO evaluations (mo_name, bundle_tag, quantity, remark, bad_qty, date, bad1,bad2, bad3, bad4, bad5, evaluate_by, evaluator_id, status) VALUES ('$mo_name', $bundle_tag, $quantity, '$remark', $bad_qty, now(), '$bad1', '$bad2', '$bad3', '$bad4', '$bad5', '$evaluator', $eval_id, $status)");


if ($i) {


    $last_id = $conn->insert_id;

    $ui = $conn->query("INSERT INTO logs(good_qty, bad_qty, submit_at, e_id, bundle_tag) VALUES($total_good, $bad_qty, now(), $last_id, $bundle_tag)");
    if ($ui) {
        echo json_encode(['success' => 'Evaluation has been saved!']);
    } else {
        echo json_encode(['error' => 'Something wrong..']);
    }
} else {
    echo json_encode(['error' => 'Something wrong..']);
}

$conn->close();
