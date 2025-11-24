<!-- index.php - Página principal: lista y búsqueda de contactos -->
<?php

// Inicia validación de inicio de sesión
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
// Termina validación de inicio de sesión

// Conexión a la base de datos
$conn = new mysqli('localhost', 'root', '', 'agenda_web');
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}
$resultado = $conn->query("SELECT * FROM contactos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agenda Web</title>
  <link rel="stylesheet" href="estilos.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<header class="cabecera">
  <div class="logo">📇 Mi Agenda Web</div>
  <nav>
    <a href="index.php">Inicio</a>
    <a href="formulario.php">Agregar Contacto</a>
  </nav>
</header>

<h1>Lista de Contactos</h1>

<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    <?php while($fila = $resultado->fetch_assoc()): ?>
    <tr>
      <td><?= $fila['Nombre'] ?></td>
      <td><?= $fila['Apellidos'] ?></td>
      <td><?= $fila['Telefono'] ?></td>
      <td>
        <a href="formulario.php?id=<?= $fila['id'] ?>">✏️ Editar</a>
        <a href="eliminar.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar este contacto?')">🗑️ Eliminar</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

</body>
</html>