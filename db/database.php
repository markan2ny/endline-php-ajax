<?php
class database {

    function connect() {

        $conn = new mysqli('localhost', 'root', '@ven2017', 'endline_db');

        if(!$conn->connect_errno) {
            return $conn;
        } else {
            echo "FAILED";
            exit();
        }
    }
}