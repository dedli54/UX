<?php
// Conecta con la base de datos
$conexion = mysqli_connect("localhost", "root", "", "taqueriajuarezdb");

// Obtiene los datos del pedido y la cuenta desde la solicitud POST
$data = json_decode(file_get_contents("php://input"), true);

$telefono = $data['pedido']['telefono'];
$nombre = $data['pedido']['nombre'];
$correo = $data['pedido']['correo'];
$tipoOrden = $data['pedido']['tipoOrden'];
$direccion = $data['pedido']['direccion'];
$metodopago = $data['pedido']['metodopago'];
$subtotal = $data['pedido']['subtotal'];
$total = $data['pedido']['total'];
// Inserta los datos del pedido en la tabla 'pedido'
$insertarPedido = mysqli_query($conexion, "INSERT INTO tablapedidos(correo_usuario_pedido,nombre_usuario_pedido,telefono_usuario_pedido,tipo_orden_pedido,direccion_pedido,metodo_pago_pedido,subtotal_pedido,total_pedido) 
VALUES ('$correo', '$nombre', $telefono, '$tipoOrden', '$direccion', '$metodopago', $subtotal, $total)");

// Obtiene el ID del pedido recién insertado
$idPedido = $conexion->insert_id;

// Ahora, necesitas insertar los detalles del pedido en la tabla 'detalle_pedido'
foreach ($data['cuenta'] as $detalle) {

    // Obtén el ID del producto basado en el nombre
    $idProducto = obtenerIdProducto($conexion, $detalle['nombre']);

    // Inserta los detalles del pedido en la tabla 'detalle_pedido'
    $insertarDetalle = $conexion->prepare("INSERT INTO tabladetallepedido (id_pedido_detallepedido, id_producto_detallepedido, cantidad_detallepedido) VALUES (?, ?, ?)");
    $insertarDetalle->bind_param("iii", $idPedido, $idProducto, $detalle['cantidad']);
    $insertarDetalle->execute();
    $insertarDetalle->close();
}

// Cierra la conexión a la base de datos
$conexion->close();

// Función para obtener el ID del producto por su nombre
function obtenerIdProducto($conexion, $nombreProducto)
{
    $nombreProducto = str_replace(' $', '', $nombreProducto);
    $idProducto = 0;
    $consulta = $conexion->prepare("SELECT id_producto FROM tablaproductos WHERE nombre_producto = ?");
    $consulta->bind_param("s", $nombreProducto);
    $consulta->execute();
    $consulta->bind_result($idProducto);
    $consulta->fetch();
    $consulta->close();

    return $idProducto;
}
