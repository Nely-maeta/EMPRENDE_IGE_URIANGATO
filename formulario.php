<!-- formulario.php - Agregar o editar contactos -->
<?php
$conexion = new mysqli("localhost", "root", "", "agenda_web");
if ($conexion->connect_error) die("Error de conexión");

$id = $_GET['id'] ?? null;
$nombre = $Apellidos = $Telefono = "";
if ($id) {
  $res = $conexion->query("SELECT * FROM contactos WHERE id=$id");
  $contacto = $res->fetch_assoc();
  $Nombre = $contacto['Nombre'];
  $Apellidos = $contacto['Apellidos'];
  $Telefono = $contacto['Telefono'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?php echo $id ? "Editar" : "Agregar"; ?> Contacto</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <h1><?php echo $id ? "✏️ Editar" : "➕ Agregar"; ?> Contacto</h1>
  <form method="POST" action="guardar.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Nombre:</label><input type="text" name="nombre" required value="<?php echo $nombre; ?>">
    <label>Apellidos:</label><input type="text" name="Apellidos" value="<?php echo $Apellidos; ?>">
    <label>Telefono:</label><input type="text" name="Telefono" value="<?php echo $Telefono; ?>">
    <button type="submit">💾 Guardar</button>
    <a href="index.php">⬅️ Volver</a>
  </form>
</body>
</html>