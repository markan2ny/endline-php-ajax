<?php
include_once '../../db/database.php';
$init = new database;

$style_id = $_POST['id'];
$fetch_mo = $init->connect()->query("SELECT * FROM sales_orders WHERE style_id = $style_id ORDER BY id DESC");


$data = '';

if ($fetch_mo->num_rows > 0) {
    while ($mo = $fetch_mo->fetch_object()) {
        $data .= '
            <tr id="mo_row" data-id="' . $mo->id . '">
                <td>' . $mo->so_name . '</td>
                <td>' . $mo->so_description . '</td>
                <td>' . number_format($mo->order_qty) . '</td>
                <td>' . number_format($mo->qty_per_day) . '</td>
                <td>' . $mo->order_date . '</td>
                <td>' . $mo->order_shipment_date . '</td>
                <td>
                    <form id="form_delete" method="POST">
                        <button class="btn btn-flat btn-sm delete_me btn-danger">
                        <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        ';
    }
    echo json_encode($data);
} else {
    echo json_encode(['<tr><td colspan="7"><h1 class="text-muted text-center">NO DATA</h1></td></tr>']);
}
