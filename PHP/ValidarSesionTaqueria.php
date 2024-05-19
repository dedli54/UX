<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        echo '
        <script>
            alert("Se le recomienda iniciar sesión, para tener una experiencia más personalizada!");
        </script>
        ';
        $usuario_autenticado = isset($_SESSION['id_usuario']);
        session_destroy();
    }else
    {
        $usuario_autenticado = isset($_SESSION['id_usuario']);
    }
?>