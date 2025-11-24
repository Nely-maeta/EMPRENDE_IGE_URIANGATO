<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <h1>Iniciar Sesión</h1>

  <form action="procesar_login.php" method="POST">
    <input type="text" name="nombre" placeholder="Tu nombre" required>
    <input type="text" name="Telefono" placeholder="Tu telefono" required>
    <button type="submit">Ingresar</button>
  </form>

  <?php if (isset($_SESSION['error'])): ?>
    <p style="color:red; text-align:center;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
  <?php endif; ?>
</body>
</html>