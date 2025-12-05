<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpass', '');
define('dbname', 'universidad');

try {
    $connect = new PDO("mysql:host=".dbhost.";dbname=".dbname, dbuser, dbpass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
