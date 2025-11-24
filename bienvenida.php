<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bienvenido</title>
  <link rel="stylesheet" href="estilos.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="bienvenida">
  <div class="card-bienvenida">
    <center>
      <h1>¡Hola, <?php echo htmlspecialchars($_SESSION['usuario']); ?>! 👋</h1>
      <p class="mensaje">Te damos la bienvenida a tu agenda de contactos.</p>
      
      <div class="acciones">
        <a href="index.php" class="boton-accion">
          <i class="fas fa-address-book"></i> Ver Agenda
        </a>
        <a href="cerrar_sesion.php" class="boton-accion cerrar">
          <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </a>
      </div>
    </div>
  </center>
</body>
</html>