<?php
$conexion = mysqli_connect("localhost", "root", "Bisonte55", "guabosbd");

if ($conexion) {
    // Verificar si se recibieron datos del formulario
    if (isset($_POST['nombres']) && isset($_POST['apellidos']) && isset($_POST['correo_electronico']) && isset($_POST['telefono']) && isset($_POST['password'])) {
        // Recuperar datos del formulario
        $nombre = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $correo_electronico = $_POST['correo_electronico']; // Corrige el nombre del campo
        $telefono = $_POST['telefono'];
        $contrasena = $_POST['password']; // Puedes cambiar a $contrasena si lo prefieres

        // Insertar los datos en la base de datos
        $query = "INSERT INTO usuario (nombre, apellidos, correo_electronico,telefono ,contrasena) VALUES ('$nombre', '$apellidos', '$correo_electronico', '$telefono','$contrasena')";
        $result = mysqli_query($conexion, $query);

        if ($result) {
            echo "Registro exitoso!";
        } else {
            echo "Error en el registro: " . mysqli_error($conexion);
        }
    } else {
        echo "Faltan datos en el formulario.";
    }
} else {
    echo "FALLO DE CONEXIÓN";
}
// Después de procesar el formulario, redirecciona a dashboard.php
header("Location: dashboard.php");
exit; 
mysqli_close($conexion);

?>
