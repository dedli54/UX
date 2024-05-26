<?php

$conexion = mysqli_connect("localhost", "root", "", "taqueriajuarezdb");

if ($conexion) {
    if (isset($_SESSION['id_usuario'])) {
        // Recuperar datos del formulario
        $correo = $_SESSION['correo_usuario'];
        $filtrardatos = mysqli_query($conexion, "SELECT * FROM vista_pedido_productos WHERE correo_electronico='$correo' ORDER BY cantidad_total DESC LIMIT 1;");
        if (mysqli_num_rows($filtrardatos) !== 0) {

            $fila = $filtrardatos->fetch_assoc();
            $id = $fila['id_producto'];
            $filtrardatos = mysqli_query($conexion, "SELECT * FROM tablaproductos WHERE id_producto=$id;");
            $fila = $filtrardatos->fetch_assoc();
            $nombre_producto = $fila['nombre_producto'];
            $imagen_producto = $fila['imagen_producto'];
            $descripcion_producto = $fila['descripcion_producto'];
            $precio_producto = $fila['precio_producto'];
            $categoria_producto = $fila['categoria_producto'];

            $_SESSION['nombre_producto_usuario'] = $nombre_producto;
            $_SESSION['imagen_producto_usuario'] = $imagen_producto;
            $_SESSION['descripcion_producto_usuario'] = $descripcion_producto;
            $_SESSION['precio_producto_usuario'] = $precio_producto;
            $_SESSION['categoria_producto_usuario'] = $categoria_producto;

            $usuario_conFeed = true;
        }
        else{
        $usuario_conFeed = false;
        }
    } else {
        $usuario_conFeed = false;
    }
    $filtrardatos2 = mysqli_query($conexion, "SELECT * FROM vista_pedido_productos ORDER BY cantidad_total DESC LIMIT 1;");
    if (mysqli_num_rows($filtrardatos2) !== 0) {

        $fila = $filtrardatos2->fetch_assoc();
        $id = $fila['id_producto'];
        $filtrardatos = mysqli_query($conexion, "SELECT * FROM tablaproductos WHERE id_producto=$id;");
        $fila = $filtrardatos->fetch_assoc();
        $nombre_producto = $fila['nombre_producto'];
        $imagen_producto = $fila['imagen_producto'];
        $descripcion_producto = $fila['descripcion_producto'];
        $precio_producto = $fila['precio_producto'];
        $categoria_producto = $fila['categoria_producto'];

        $_SESSION['nombre_producto_global'] = $nombre_producto;
        $_SESSION['imagen_producto_global'] = $imagen_producto;
        $_SESSION['descripcion_producto_global'] = $descripcion_producto;
        $_SESSION['precio_producto_global'] = $precio_producto;
        $_SESSION['categoria_producto_global'] = $categoria_producto;

        $global_conFeed = true;
    } else {
        $global_conFeed = false;
    }
} else {
    echo "FALLÓ DE CONEXIÓN";
    echo '
    <script>
        window.location = "../HTML/IndexTaqueria.php";
    </script>
    ';
}
mysqli_close($conexion);
