CREATE DATABASE taqueriajuarezdb;
USE taqueriajuarezdb;

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `taqueriajuarezdb`.`tablausuarios` (
`id_usuario` INT NOT NULL AUTO_INCREMENT COMMENT 'ID AUTOMATICO DEL USUARIO' , 
`nombres_usuario` VARCHAR(60) NOT NULL COMMENT 'NOMBRE O NOMBRES DEL USUARIO' , 
`apellidos_usuario` VARCHAR(60) NOT NULL COMMENT 'APELLIDO O APELLIDOS DEL USUARIO' ,
`correo_usuario` VARCHAR(60) NOT NULL COMMENT 'CORREO ELECTRONICO DEL USUARIO' , 
`telefono_usuario` BIGINT NOT NULL COMMENT 'TELEFONO A 10 DIGITOS DEL USUARIO' , 
`nacimiento_usuario` DATE NOT NULL COMMENT 'FECHA DE NACIMIENTO DEL USUARIO' , 
`contrasena_usuario` VARCHAR(15) NOT NULL COMMENT 'CONTRASEÑA DEL USUARIO' , 
PRIMARY KEY (`id_usuario`)) 
ENGINE = InnoDB COMMENT = 'TABLA CON LOS USUARIOS REGISTRADOS A LA PAGINA DE TAQUERIA';
SELECT * FROM tablausuarios;
--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellidos`, `correo_electronico`, `contrasena`, `telefono`) VALUES
('a', '$a', 'ao', 'a', 8115146651),
('babu', 'castillo', 'babu', 'abcd', 2147483647),
('David2', 'Castillo2', 'davidemmanuelbc2@gmail.com', 'adaefe', 2147483647),
('David Emmanuel', 'Bustamante Castillo', 'davidemmanuelbc@gmail.com', 'ARCHEr011', 2147483647),
('Jose ', 'Wilson', 'josewilson@gmail.com', 'santi', 8122964247);

-- Crear tabla de productos
CREATE TABLE `producto` (
  `id_producto` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(255) NOT NULL,
  `imagen` VARCHAR(400), 
  `descripcion` TEXT,
  `precio` DECIMAL(10, 2) NOT NULL,
  `categoria` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SELECT * FROM producto;

UPDATE producto 
set descripcion = 'Con nuestras deliciosas y únicas salsas de guabos.' where id_producto = 5 AND id_producto = 6 AND id_producto = 7 AND id_producto = 8 AND id_producto = 9 AND id_producto = 10;
-- Insertar algunos datos de ejemplo en la tabla de productos
INSERT INTO `producto` (`nombre`, `descripcion`,`imagen`, `precio`, `categoria`) VALUES
('La Guabos', 
'Carne 100% de res 180 gramos hecha en casa, salami, jamón, queso amarillo, y una alita en salsa guabos clavada sobre nuestro tradicional pan artesanal.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/La_Guabos.jpg', 70.00,'Hamburguesas'),
('Dark Bacon', 
'Carne 100% res 200 gramos hecha en casa, rellena de queso mozzarella , envuelta en capas de tocino dorado con aderezo chipotle, en pan artesanal negro.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/Dark_Bacon.jpg', 105.00,'Hamburguesas'),
('Barbie-Q', 
'Carne 100% res de 180 gramos hecha en casa, aros de cebolla, jamón, queso amarillo y tocino, con salsa BBQ en nuestro exclusivo pan artesanal rosa.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/Barbie-Q.jpg', 90.00,'Hamburguesas'),
('Jana', 
'180 gr de carne de res, más un exquisito queso mozzarella empanizado de DORITOS y un delicioso aderezo de jalapeño hecho en casa.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/Jana_Burguer.jpg', 115.00,'Hamburguesas'),
-- ----------------------------------------------------------------------
('Boneless 8 PZ', 
'Con nuestras deliciosas y únicas salsas de guabos.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/boneless.jpg', 99.00,'Boneless'),
('Boneless 12 PZ', 
'Con nuestras deliciosas y únicas salsas de guabos.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/boneless.jpg', 150.00,'Boneless'),
('Boneless 18 PZ', 
'Con nuestras deliciosas y únicas salsas de guabos.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/boneless.jpg', 210.00,'Boneless'),
-- -----------------------------------------------------------------------
('Alitas 8 PZ', 
'Con nuestras deliciosas y únicas salsas de guabos.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/alitas.jpg', 99.00,'Alitas'),
('Alitas 12 PZ', 
'Con nuestras deliciosas y únicas salsas de guabos.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/alitas.jpg', 150.00,'Alitas'),
('Alitas 18 PZ', 
'Con nuestras deliciosas y únicas salsas de guabos.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/alitas.jpg', 210.00,'Alitas'),
-- -----------------------------------------------------------------------
('Fries', 
'Papas a la francesa acompañadas con queso.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/fries.jpg', 45.00,'Entradas'),
('Guabos Fries', 
'Papas a la francesa bañadas en salsa guabos, acompañadas de aderezo ranch,queso amarillo y trozos de tocino.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/guabosfries.jpg', 75.00,'Entradas'),
('Guabos Fries con tenders', 
'Papas a la francesa bañadas en salsa guabos, acompañadas de aderezo ranch,queso amarillo,trozos de tocino y trocitos de tenders.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/guabosfries_tenders.jpg', 120.00,'Entradas'),
('Guabits', 
'Deliciosas bolitas crujientes de papa con queso y trocitos de jalapeño.'
,'C:/xampp/htdocs/Front_Guabos/Front_Guabos/Imagenes/guabits.jpg', 65.00,'Entradas');

-- Crear tabla de pedidos
CREATE TABLE `pedido` (
  `id_pedido` INT AUTO_INCREMENT PRIMARY KEY,
  `id_usuario` INT,
  `tipo_orden` VARCHAR(255) NOT NULL,
  `direccion` VARCHAR(255),
  `metodo_pago` VARCHAR(255) NOT NULL,
  `subtotal` DECIMAL(10, 2) NOT NULL,
  `total` DECIMAL(10, 2) NOT NULL,
  `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`id_usuario`) REFERENCES `usuario`(`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SELECT * FROM pedido;

-- Crear tabla de detalles del pedido
CREATE TABLE `detalle_pedido` (
  `id_detalle` INT AUTO_INCREMENT PRIMARY KEY,
  `id_pedido` INT,
  `id_producto` INT,
  `cantidad` INT NOT NULL,
  FOREIGN KEY (`id_pedido`) REFERENCES `pedido`(`id_pedido`),
  FOREIGN KEY (`id_producto`) REFERENCES `producto`(`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SELECT * FROM detalle_pedido;

CREATE VIEW v_productos_mas_pedidos AS
SELECT
    p.id_producto,
    p.nombre AS nombre_producto,
    p.imagen,
    p.descripcion,
    p.categoria,
    p.precio,
    SUM(dp.cantidad) AS total_pedidos
FROM
    producto p
JOIN
    detalle_pedido dp ON p.id_producto = dp.id_producto
GROUP BY
    p.id_producto, p.nombre, p.categoria
ORDER BY
    total_pedidos DESC
LIMIT 3;

SELECT * FROM v_productos_mas_pedidos;
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo_electronico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
