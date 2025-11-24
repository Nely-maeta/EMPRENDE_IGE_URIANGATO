<!-- guardar.php - Procesa la inserción o actualización -->
<?php
$conn = new mysqli("localhost", "root", "", "agenda_web");
if ($conn->connect_error) die("Error de conexión");

$id = $_POST['id'] ?? null;
$nombre = $conn->real_escape_string($_POST['nombre']);
$Apellidos = $conn->real_escape_string($_POST['Apellidos']);
$Telefono = $conn->real_escape_string($_POST['Telefono']);

if ($id) {
  $sql = "UPDATE contactos SET nombre='$nombre', Apellidos='$Apellidos', Telefono='$Telefono' WHERE id=$id";
} else {
  $sql = "INSERT INTO contactos (nombre, Apellidos, Telefono) VALUES ('$nombre', '$Apellidos', '$Telefono')";
}
$conn->query($sql);
$conn->close();
header("Location: index.php");
?>