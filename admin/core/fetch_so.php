<?php

include_once '../../db/database.php';
$init = new database;

$id = $_POST['id'];

$so = $init->connect()->query("SELECT * FROM sales_orders WHERE style_id = $id ORDER BY id DESC");

// print_r($g->fetch_all());
$data = '';
if ($so->num_rows > 0) {
    while ($s = $so->fetch_object()) {
        $data .= "
            <tr>
                <td>$s->so_name</td>
                <td>$s->so_description</td>
                <td>
                    <div class='progress progress-xs'>
                    <div class='progress-bar progress-bar-danger' style='width: 55%'></div>
                <td>
                    <span class='badge badge-success'>90%</span>
                </td>
            </tr>
        ";
    }

    echo json_encode($data);
} else {
    echo json_encode('<tr><td colspan="5"><h1 class="text-muted text-center mt-2 mb-2">NO DATA FOUND</h1></td></tr>');
}
