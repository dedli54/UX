<?php
session_start();

if (isset($_SESSION['id_usuario'])) {

    session_start();
    if (isset($_SESSION['id_usuario'])) {
        $usuario_autenticado = isset($_SESSION['id_usuario']);
        session_destroy();
        echo '
        <script>
            alert("Sesión Cerrada Correctamente!");
            window.location = "../HTML/IndexTaqueria.php";
        </script>
        ';
    }
}
