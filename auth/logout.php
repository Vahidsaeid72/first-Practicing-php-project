<?php
session_start();
require_once '../functions/helpers.php';
require_once '../functions/pdo_connection.php';

if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
    redirect('auth/login.php');
}