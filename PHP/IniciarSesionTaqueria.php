<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "taqueriajuarezdb");

if ($conexion) 
{
    // Verificar si se recibieron datos del formulario
    if (isset($_POST['correo']) && 
        isset($_POST['password'])) 
    {
        // Recuperar datos del formulario
        $correo = $_POST['correo'];
        $contrasena = $_POST['password'];
        //Validar que el correo electronico ya está registrado en la base de datos
        $validarCorreoContra = mysqli_query($conexion, "SELECT * FROM tablausuarios WHERE correo_usuario='$correo' AND contrasena_usuario='$contrasena'");
        if  (mysqli_num_rows($validarCorreoContra)==0)
        {
            echo '
            <script>
                alert("Verifice sus credenciales y vuelta a intentar!");
                window.location = "../HTML/InicioSesionTaqueria.php";
            </script>
            ';            
        }else
        {
            // Credenciales válidas, obtener el nombre de usuario
            $fila = $validarCorreoContra->fetch_assoc();

            $id = $fila['id_usuario'];
            $nombres = $fila['nombres_usuario'];
            $apellidos = $fila['apellidos_usuario'];
            $correo = $fila['correo_usuario'];
            $telefono = $fila['telefono_usuario'];
            $nacimiento = $fila['nacimiento_usuario'];
            // Iniciar sesión y almacenar el nombre de usuario
            $_SESSION['id_usuario'] = $id;
            $_SESSION['nombres_usuario'] = $nombres;
            $_SESSION['apellidos_usuario'] = $apellidos;
            $_SESSION['correo_usuario'] = $correo;
            $_SESSION['telefono_usuario'] = $telefono;
            $_SESSION['nacimiento_usuario'] = $nacimiento;
            // Redirigir al dashboard
            echo '
            <script>
                alert("Sesión Iniciada de manera exitosa!");
                window.location = "../HTML/IndexTaqueria.php";
            </script>
            '; 
        }
    } else 
    {
        echo "Faltan datos en el formulario.";
    }
} else 
{
    echo "FALLO DE CONEXIÓN";
    echo '
    <script>
        window.location = "../HTML/InicioSesionTaqueria.php";
    </script>
    ';
}
mysqli_close($conexion);
?>
