<?php
session_destroy();
unset($_SESSION['name']);
unset($_SESSION['role_desc']);
unset($_SESSION['login_id']);
header('location:login.php');
