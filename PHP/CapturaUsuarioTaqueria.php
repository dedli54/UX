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
                alert("Ya hay un usuario registrado con ese correo electrónico!");
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
                $cuerpo_correo = '
                <html lang="es">
                        <head>
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Confirmación de Registro - Taquería Juárez</title>
                        <style>
                            body {
                            font-family: Arial, sans-serif;
                            background-color: #f7f7f7;
                            margin: 0;
                            padding: 0;
                            }
                            .container {
                            max-width: 600px;
                            margin: 20px auto;
                            padding: 20px;
                            background-color: #cab5a1;
                            border-radius: 10px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            h1 {
                            text-align: center;
                            color: #333333;
                            }
                            p {
                            margin-bottom: 20px;
                            }
                        </style>
                        </head>
                        <body>
                        <div class="container">
                            <h1>¡Gracias por Registrarte '.$nombres.'!</h1>
                            <p>Bienvenido(a) a la Página Web de Taquería Juárez. Tu registro ha sido confirmado correctamente.</p>
                            <p>Ahora podrás disfrutar de nuestras deliciosas especialidades mexicanas.</p>
                            <p>¡Esperamos verte pronto!</p>
                            <p>Atentamente,<br>El Equipo del Taquería Juárez.</p>
                        </div>
                        </body>
                        </html>
                ';
                $micorreo = "migjorale@gmail.com";
                $asunto_correo = "Confirmación Registro Taquería Juárez";
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8\r\n";
                $headers .= "From: El Equipo del Taquería Juárez <$micorreo>/r/n";
                mail($correo,$asunto_correo,$cuerpo_correo,$headers);
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
    echo "FALLÓ DE CONEXIÓN";
    echo '
    <script>
        window.location = "../HTML/RegistroTaqueria.php";
    </script>
    ';
}
mysqli_close($conexion);
