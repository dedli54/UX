<?php
// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión y si hay información de teléfono
if (isset($_SESSION["nombre"]) && isset($_SESSION["telefono"]) && isset($_SESSION["id_usuario"])) {
    $nombre = $_SESSION["nombre"];
    $id_usuario = $_SESSION["id_usuario"];
} else {
    // Si no ha iniciado sesión o no hay información de teléfono, redirigir a la página de inicio de sesión
    header("Location: iniciosesion.php");
    exit;
}

// Conecta con la base de datos
$conexion = new mysqli("localhost", "root", "Bisonte55", "guabosbd");

// Obtiene los datos del pedido y la cuenta desde la solicitud POST
$data = json_decode(file_get_contents("php://input"), true);
//echo $data;

// Inserta los datos del pedido en la tabla 'pedido'
$insertarPedido = $conexion->prepare("INSERT INTO pedido (id_usuario, tipo_orden, direccion, subtotal, total, metodo_pago) VALUES (?, ?, ?, ?, ?, ?)");
$insertarPedido->bind_param("issdds", $id_usuario, $data['pedido']['tipoOrden'], $data['pedido']['direccion'], $data['pedido']['subtotal'], $data['pedido']['total'], $data['pedido']['metodopago']);
$insertarPedido->execute();
// if ($insertarPedido->execute()) {
//     echo 1;
// } else {
//     echo 0;
// }
$insertarPedido->close();

// Obtiene el ID del pedido recién insertado
$idPedido = $conexion->insert_id;

// Ahora, necesitas insertar los detalles del pedido en la tabla 'detalle_pedido'
foreach ($data['cuenta'] as $detalle) {
    // Conecta nuevamente con la base de datos
    //$conexion = new mysqli("localhost", "root", "Bisonte55", "guabosbd");

    // Obtén el ID del producto basado en el nombre
    $idProducto = obtenerIdProducto($conexion, $detalle['nombre']);

    // Inserta los detalles del pedido en la tabla 'detalle_pedido'
    $insertarDetalle = $conexion->prepare("INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad) VALUES (?, ?, ?)");
    $insertarDetalle->bind_param("iii", $idPedido, $idProducto, $detalle['cantidad']);
    $insertarDetalle->execute();
    // if ($insertarDetalle->execute()) {
    //     echo $idProducto;
    // } else {
    //     echo 0;
    // }
    $insertarDetalle->close();

    // Cierra la conexión a la base de datos
    //$conexion->close();
}

// Cierra la conexión a la base de datos
$conexion->close();

// Función para obtener el ID del producto por su nombre
function obtenerIdProducto($conexion, $nombreProducto) {
    $nombreProducto = str_replace(' $', '', $nombreProducto);

    $consulta = $conexion->prepare("SELECT id_producto FROM producto WHERE nombre = ?");
    $consulta->bind_param("s", $nombreProducto);
    $consulta->execute();
    $consulta->bind_result($idProducto);
    $consulta->fetch();
    $consulta->close();

    return $idProducto;
}
?>