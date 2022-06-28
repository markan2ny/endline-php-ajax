<?php
session_start();
include_once '../db/database.php';
$init = new database;

$username = $_POST['username'];
$password = $_POST['password'];

$username = $init->connect()->query("SELECT * FROM users WHERE username = '$username'");

if ($username->num_rows > 0) {
    $user = $username->fetch_object();

    if ($user->password == $password) {

        $get_role = $init->connect()->query("SELECT u.*,r.role_id,rn.role_desc FROM users as u RIGHT JOIN role as r on u.id = r.user_id RIGHT JOIN role_names as rn on rn.id = role_id WHERE u.id= $user->id");

        while ($d = $get_role->fetch_object()) {
            $_SESSION['login_id'] = $d->id;
            $_SESSION['name'] = $d->name;
            $_SESSION['role_desc'] = $d->role_desc;
            $_SESSION['role_id'] = $d->role_id;

            echo json_encode(['data' => $d, 'success' => 'Success Login!']);
        }
    } else {
        echo json_encode(['error' => 'Invalid Credentials']);
    }
} else {
    echo json_encode(['error' => 'Invalid Credentials!']);
}
