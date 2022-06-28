<?php

include_once '../../db/database.php';
$init = new database;

$styles = $init->connect()->query("SELECT * FROM styles");



if ($styles->num_rows > 0) {
    while ($style = $styles->fetch_object()) {
        echo '<tr>
        <td>' . $style->name . '</td>
    </tr>';
    }
}
