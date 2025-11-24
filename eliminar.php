<!-- eliminar.php - Elimina un contacto -->
<?php
$conn = new mysqli("localhost", "root", "", "agenda_web");
if ($conn->connect_error) die("Error de conexión");

$id = $_GET['id'] ?? null;
if ($id) {
  $conn->query("DELETE FROM contactos WHERE id=$id");
}
$conn->close();
header("Location: index.php");
?>