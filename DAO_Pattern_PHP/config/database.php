<?php
// config/database.php
$host = 'localhost';
$dbname = 'usuarios_db';
$username = 'root'; // Cambia si es necesario
$password = ''; // Cambia si es necesario

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
