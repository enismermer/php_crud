<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "php_crud";

$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}
?>
