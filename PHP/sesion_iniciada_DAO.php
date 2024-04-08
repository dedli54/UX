<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (asegúrate de personalizar las credenciales)
    $conexion = new mysqli("localhost", "root", "Bisonte55", "guabosbd");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Recuperar los valores del formulario
    $correo = $_POST["correo"];
    $contrasena = $_POST["password"];

    // Consultar la base de datos para verificar las credenciales
    $consulta = "SELECT * FROM usuario WHERE correo_electronico = '$correo' AND contrasena = '$contrasena'";
    $resultado = $conexion->query($consulta);

    // Verificar si la consulta se ejecutó correctamente
    if (!$resultado) {
        die("Error en la consulta: " . $conexion->error);
    }

    // Verificar si las credenciales son correctas
    if ($resultado->num_rows > 0) {
        // Credenciales válidas, obtener el nombre de usuario
        $fila = $resultado->fetch_assoc();
        $id_usuario = $fila["id_usuario"];
        $nombre = $fila["nombre"]; 
        $telefono = $fila["telefono"];
        // Iniciar sesión y almacenar el nombre de usuario
        session_start();
        $_SESSION["id_usuario"] = $id_usuario;
        $_SESSION["nombre"] = $nombre;
        $_SESSION["telefono"] = $telefono;
        // Redirigir al dashboard
        header("Location: dashboard.php");
        exit;
    } else {
        // Credenciales incorrectas, mostrar un mensaje de error
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>