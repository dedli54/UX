DROP DATABASE taqueriajuarezdb;
CREATE DATABASE taqueriajuarezdb;
USE taqueriajuarezdb;
CREATE TABLE `taqueriajuarezdb`.`tablausuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT COMMENT 'ID AUTOMATICO DEL USUARIO',
  `nombres_usuario` VARCHAR(60) NOT NULL COMMENT 'NOMBRE O NOMBRES DEL USUARIO',
  `apellidos_usuario` VARCHAR(60) NOT NULL COMMENT 'APELLIDO O APELLIDOS DEL USUARIO',
  `correo_usuario` VARCHAR(60) NOT NULL COMMENT 'CORREO ELECTRONICO DEL USUARIO',
  `telefono_usuario` BIGINT NOT NULL COMMENT 'TELEFONO A 10 DIGITOS DEL USUARIO',
  `nacimiento_usuario` DATE NOT NULL COMMENT 'FECHA DE NACIMIENTO DEL USUARIO',
  `contrasena_usuario` VARCHAR(15) NOT NULL COMMENT 'CONTRASEÑA DEL USUARIO',
  PRIMARY KEY (`id_usuario`)
) ENGINE = InnoDB COMMENT = 'TABLA CON LOS USUARIOS REGISTRADOS A LA PAGINA DE TAQUERIA';
INSERT INTO `tablausuarios` (
    `nombres_usuario`,
    `apellidos_usuario`,
    `correo_usuario`,
    `telefono_usuario`,
    `nacimiento_usuario`,
    `contrasena_usuario`
  )
VALUES (
    'MIGUEL',
    'LOPEZ',
    'miguelopez123@hotmail.com',
    8115146651,
    '1999-06-29',
    '1234561!'
  );
SELECT *
FROM tablausuarios;
CREATE TABLE `taqueriajuarezdb`.`tablaproductos` (
  `id_producto` INT NOT NULL AUTO_INCREMENT COMMENT 'ID AUTOMATICO DEL PRODUCTO',
  `nombre_producto` VARCHAR(255) NOT NULL COMMENT 'NOMBRE DEL PRODUCTO',
  `imagen_producto` VARCHAR(400) COMMENT 'PATH DE LA IMAGEN DEL PRODUCTO',
  `descripcion_producto` TEXT COMMENT 'DESCRIPCION DETALLADA DEL PRODUCTO',
  `precio_producto` DECIMAL(10, 2) NOT NULL COMMENT 'PRECIO DEL PRODUCTO',
  `categoria_producto` VARCHAR(50) NOT NULL COMMENT 'CATEGORIA DEL PRODUCTO',
  PRIMARY KEY (`id_producto`)
) ENGINE = InnoDB COMMENT = 'TABLA CON LOS PRODUCTOS DE LA PAGINA DE LA TAQUERIA';
INSERT INTO `tablaproductos` (
    `nombre_producto`,
    `descripcion_producto`,
    `imagen_producto`,
    `precio_producto`,
    `categoria_producto`
  )
VALUES (
    'Cueritos en Vinagre',
    'Deliciosa combinación de tiras finas de piel de cerdo y zanahorias encurtidas.',
    'D:/XAMPP/htdocs/UX/Imagenes/Cueritos.jpeg',
    56.00,
    'Entrada'
  ),
  (
    'Frijoles Refritos con Queso',
    'Frijoles refritos, acompañados de queso y servidos con totopos crujientes.',
    'D:/XAMPP/htdocs/UX/Imagenes/Frijole.jpeg',
    56.00,
    'Entrada'
  ),
  (
    'Papitas Doradas',
    'Riquisima con salsa de aguacate.',
    'D:/XAMPP/htdocs/UX/Imagenes/papadorada.jpeg',
    56.00,
    'Entrada'
  ),
  (
    'Orden de sopes',
    'Elige entre deshebrada, picadillo con papa, chicharrón verde y chicharrón rojo. Orden de 3 piezas.',
    'D:/XAMPP/htdocs/UX/Imagenes/sopes.jpeg',
    183.00,
    'Platillo'
  ),
  (
    'Flautas',
    'Con crema y bañadas con salsa de aguacate. Orden de 5 piezas.',
    'D:/XAMPP/htdocs/UX/Imagenes/Flautas.jpeg',
    238.00,
    'Platillo'
  ),
  (
    'Enchiladas',
    'Las tradicionales, servidas con o sin cebolla. Orden de 5 piezas.',
    'D:/XAMPP/htdocs/UX/Imagenes/enchiladas.jpeg',
    194.00,
    'Platillo'
  ),
  (
    'Rey de la Juarez',
    'Platillo surtido 8 piezas. Incluye 2 Enchiladas, 2 Flautas, 2 Tacos y 2 Tostadas.',
    'D:/XAMPP/htdocs/UX/Imagenes/rey.jpeg',
    370.00,
    'Combo'
  ),
  (
    'Platillo',
    '2 enchiladas, 2 tacos y 2 flautas.',
    'D:/XAMPP/htdocs/UX/Imagenes/plato.jpeg',
    255.00,
    'Combo'
  );
SELECT *
FROM tablaproductos;
CREATE TABLE `taqueriajuarezdb`.`tablapedidos` (
  `id_pedido` INT NOT NULL AUTO_INCREMENT COMMENT 'ID AUTOMATICO DEL PEDIDO',
  `correo_usuario_pedido` VARCHAR(60) NOT NULL COMMENT 'CORREO ELECTRONICO DEL USUARIO QUE REALIZO EL PEDIDO',
  `nombre_usuario_pedido` VARCHAR(60) NOT NULL COMMENT 'NOMBRE COMPLETO DEL USUARIO QUE REALIZO EL PEDIDO',
  `telefono_usuario_pedido` BIGINT NOT NULL COMMENT 'TELEFONO DEL USUARIO QUE REALIZO EL PEDIDO',
  `tipo_orden_pedido` VARCHAR(255) COMMENT 'TIPO DE LA ORDEN',
  `direccion_pedido` TEXT COMMENT 'DIRECCION A DONDE SE ENVIARA EL PEDIDO EN CASO DE',
  `metodo_pago_pedido` VARCHAR(60) NOT NULL COMMENT 'PUEDE SER EFECTIVO O TRANSFERENCIA',
  `subtotal_pedido` DECIMAL(10, 2) NOT NULL COMMENT 'SUBTOTAL A PAGAR DEL PEDIDO',
  `total_pedido` DECIMAL(10, 2) NOT NULL COMMENT 'TOTAL A PAGAR DEL PEDIDO',
  `fecha_pedido` TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT 'FECHA DE SOLICITUD DEL PEDIDO',
  PRIMARY KEY (`id_pedido`)
) ENGINE = InnoDB COMMENT = 'TABLA CON LOS PEDIDOS REALIZADOS DE LA PAGINA DE LA TAQUERIA';
SELECT *
FROM tablapedidos;
CREATE TABLE `taqueriajuarezdb`.`tabladetallepedido` (
  `id_detallepedido` INT NOT NULL AUTO_INCREMENT COMMENT 'ID AUTOMATICO DEL DETALLE DEL PEDIDO',
  `id_pedido_detallepedido` INT NOT NULL COMMENT 'FK DEL ID DEL PEDIDO',
  `id_producto_detallepedido` INT NOT NULL COMMENT 'FK DEL ID DEL PRODUCTO',
  `cantidad_detallepedido` INT NOT NULL COMMENT 'CANTIDAD DE PRODUCTOS PEDIDOS',
  PRIMARY KEY (`id_detallepedido`),
  FOREIGN KEY (`id_pedido_detallepedido`) REFERENCES `tablapedidos`(`id_pedido`),
  FOREIGN KEY (`id_producto_detallepedido`) REFERENCES `tablaproductos`(`id_producto`)
) ENGINE = InnoDB COMMENT = 'TABLA CON EL DETALLE DE LOS PEDIDOS REALIZADOS DE LA PAGINA DE LA TAQUERIA';
SELECT *
FROM tabladetallepedido;
CREATE VIEW v_productos_mas_pedidos AS
SELECT tablaproductos.id_producto,
  tablaproductos.nombre_producto AS nombre_producto,
  tablaproductos.imagen_producto,
  tablaproductos.descripcion_producto,
  tablaproductos.categoria_producto,
  tablaproductos.precio_producto,
  SUM(tabladetallepedido.cantidad_detallepedido) AS total_pedidos
FROM tablaproductos
  JOIN tabladetallepedido ON tablaproductos.id_producto = tabladetallepedido.id_pedido_detallepedido
GROUP BY tablaproductos.id_producto,
  tablaproductos.nombre_producto,
  tablaproductos.categoria_producto
ORDER BY total_pedido DESC
LIMIT 3;
SELECT *
FROM v_productos_mas_pedidos;
SELECT *
FROM v_productos_mas_pedidos;