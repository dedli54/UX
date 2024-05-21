<?php
$conexion = mysqli_connect("localhost", "root", "", "taqueriajuarezdb");

if ($conexion) {
    // Verificar si se recibieron datos del formulario
    if (
        isset($_POST['nombres']) &&
        isset($_POST['apellidos']) &&
        isset($_POST['correo']) &&
        isset($_POST['telefono']) &&
        isset($_POST['fecha-nacimiento']) &&
        isset($_POST['password'])
    ) {
        // Recuperar datos del formulario
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $nacimiento = $_POST['fecha-nacimiento'];
        $contrasena = $_POST['password'];
        //Validar que el correo electronico ya no esté registrado en la base de datos
        $validarCorreo = mysqli_query($conexion, "SELECT * FROM tablausuarios WHERE correo_usuario='$correo'");
        if (mysqli_num_rows($validarCorreo) > 0) {
            echo '
            <script>
                alert("Ya hay un usuario registrado con ese correo electronico!");
                window.location = "../HTML/InicioSesionTaqueria.php";
            </script>
            ';
        } else {
            // Insertar los datos en la base de datos
            $query = "INSERT INTO tablausuarios(nombres_usuario,apellidos_usuario,correo_usuario,telefono_usuario,nacimiento_usuario,contrasena_usuario) 
            VALUES ('$nombres','$apellidos','$correo','$telefono','$nacimiento','$contrasena')";
            // Ejecucion de la Query
            $result = mysqli_query($conexion, $query);
            if ($result) {
                //Después de procesar el formulario, redirecciona a la pagina principal
                echo "Registro exitoso!";
                echo '
                <script>
                    alert("Se capturó el usuario de manera satisfactoria!");
                    window.location = "../HTML/InicioSesionTaqueria.php";
                </script>
                ';
            } else {
                echo "Error en el registro: " . mysqli_error($conexion);
                echo '
                <script>
                    alert("Error en la captura del nuevo Usuario");
                    window.location = "../HTML/RegistroTaqueria.php";
                </script>
                ';
            }
        }
    } else {
        echo "Faltan datos en el formulario.";
    }
} else {
    echo "FALLO DE CONEXIÓN";
    echo '
    <script>
        window.location = "../HTML/RegistroTaqueria.php";
    </script>
    ';
}
mysqli_close($conexion);
