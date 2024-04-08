<?php
// Iniciar la sesión (si no está iniciada ya)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al inicio de sesión
header("Location: iniciosesion.php");
exit;
?>
