<?php
session_start();
include 'conexion.php';

$nombre = trim($_POST['nombre']);
$Telefono= trim($_POST['Telefono']);

$sql = "SELECT * FROM contactos WHERE nombre = ? AND Telefono = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nombre, $Telefono);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $_SESSION['usuario'] = $nombre;
    header("Location: bienvenida.php");
} else {
    $_SESSION['error'] = "Datos incorrectos. Intenta de nuevo.";
    header("Location: login.php");
}
?>