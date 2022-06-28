<?php

include_once '../../db/database.php';
$init = new database;

$mo_name = $_POST['mo_name'];
$description = $_POST['description'];
$order_qty = $_POST['order_qty'];
$quota_per_day = $_POST['quota_per_day'];
$style_id = $_POST['style_id'];
$order_date = $_POST['order_date'];
$order_shipment_date = $_POST['order_shipment_date'];

$i = $init->connect()->query("INSERT INTO sales_orders(so_name, so_description, qty_per_day, style_id, order_date, order_shipment_date, order_qty) VALUES('$mo_name', '$description', $quota_per_day, $style_id, '$order_date', '$order_shipment_date', $order_qty)");

if($i) {
    echo json_encode(['success' => $mo_name.' has been saved!']);
} else {
    echo json_encode(['error' => 'Failed to insert!']);
}

