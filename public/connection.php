<?php
// Database connection
$usuario = 'root';
$senha = '';
$database = 'gsus';
$host = 'localhost';


$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->connect_error) {
    die("Falha na conexão:" . $mysqli->connect_error);
}