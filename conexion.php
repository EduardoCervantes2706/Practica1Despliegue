<?php
$servername = "localhost";
$username = "root";
$password = "mYgB#NGdi*^1";
$database = "CRUD_Despliegue";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>