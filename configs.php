<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "world_rowing_results";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}
?>
