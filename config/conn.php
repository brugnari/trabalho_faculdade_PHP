<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$db   = 'burlesque';
$user = 'root';
$pass = 'admin';
$conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
