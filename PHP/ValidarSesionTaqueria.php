<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        $usuario_autenticado = isset($_SESSION['id_usuario']);
        session_destroy();
    }else
    {
        $usuario_autenticado = isset($_SESSION['id_usuario']);
    }
?>