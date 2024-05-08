<?php
// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["nombre"])) {
    // Si no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: iniciosesion.php");
    exit;
}

// Obtener el nombre de usuario de la sesión
$nombre = $_SESSION["nombre"];

$conn = new mysqli("localhost", "root", "Bisonte55", "guabosbd");

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultar la vista
$sql = "SELECT * FROM v_productos_mas_pedidos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Guabos | Menu</title>
    <link rel="stylesheet" href="../Librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Guabos.css">
</head>

<body>
    <header>
        <div class="Presentacion">
            <img id="Logo_G" src="../Imagenes/guabos_diamante.png" alt="Logo Grande">
            <ul>
                <li class="_1">BONELESS</li>
                <li class="_2">TENDERS</li>
                <li class="_3">FRIES</li>
                <li class="_4">CRIMS</li>
                <li class="_5">GUABITS</li>
                <li class="_6">& MAS</li>
            </ul>
        </div>

        <nav id="opciones">
            <a class="RegresarInicio"><img id="Logo_p" src="../Imagenes/Guabos_logo.png"
                    alt="logo" /></a>
            <a><?php echo $nombre; ?></a> <!--AQUI ES EL INICIO DE SESION-->
            <a href="iniciosesion.php">Cerrar Sesión</a>
        </nav>

        <div class="Menu">
            <nav id="menu">
                <ul>
                    <li><a href="#MasVendidos">Más Vendidos</a></li>
                    <li><a href="#Hamburguesas">Hamburguesas</a></li>
                    <li><a href="#Boneless">Boneless</a></li>
                    <li><a href="#Alitas">Alitas</a></li>
                    <li><a href="#Entradas">Entradas</a></li>
                    <!-- <li><a href="#Malteadas">Malteadas</a></li> -->
                    <!--<li><a href="#Bebidas">Bebidas</a></li>-->
                </ul>
            </nav>
        </div>
    </header>

    <div class="wrapper">
        <div class="MenuPrincipal ">
            <div class="contenedor_seccion">
                <section class="MasVendidos" id="MasVendidos">
                    <h1>Más Vendidos</h1>

                    <?php
                    // Inicializar la variable para data-item
                    $dataItem = 1;

                    // Mostrar resultados
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Obtener toda la información del producto
                            $idProducto = $row["id_producto"];
                            $imagen= $row['imagen'];
                            $nombre = $row["nombre_producto"];
                            $categoria = $row["categoria"];
                            $descripcion =  $row["descripcion"];
                            $precio = $row["precio"];
                        
                            // Generar automáticamente las secciones HTML
                            if($categoria == 'Hamburguesas'){
                                echo '<div class="contenedor_producto producto" data-item="' . $dataItem . '">';
                                echo '<img class="imagen_producto" src="' . $imagen . '" alt="' . $nombre . '">';
                                echo '<div class="producto_info">';
                                echo '<h2 class="producto_nombre">' . $nombre . '</h2>';
                                echo '<p class="descripcion_producto">' . $descripcion . '</p>';
                                echo '</div>';
                                echo '<p class="precio_producto">Precio: $' . $precio . '</p>';
                                echo '</div>';
                                
                                echo '<section class="modal modal-item" data-item="' . $dataItem . '">';
                                echo '<div class="modal__container">';
                                echo '<h2 class="modal__title">Nombre</h2>';
                                echo '<p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam quas, culpa tempora. Veniam consectetur deleniti maxime.</p>';
                                echo '<form id="pedidoForm">';
                                echo '<div class="form-group opciones_papas">';
                                echo '<label>¿Desea papas?</label>';
                                echo '<ol class="opciones">';
                                echo '<li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>';
                                echo '<li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>';
                                echo '<li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas preparadas ($30)</li>';
                                echo '</ol>';
                                echo '</div>';
                                
                                echo '<div class="form-group">';
                                echo '<label>¿Desea bebida?</label>';
                                echo '<ol class="opciones">';
                                echo '<li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)</li>';
                                echo '<li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)</li>';
                                echo '<li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>';
                                echo '<li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>';
                                echo '</ol>';
                                echo '</div>';
                                echo '</form>';
                                
                                echo '<div id="resultado">';
                                echo '<h3>Precio: $<span id="total">0.00</span></h3>';
                                echo '</div>';
                                
                                echo '<div class="modal__button-container">';
                                echo '<button class="modal__close">Cancelar</a>';
                                echo '<button class="button_cantidad menos">-</button>';
                                echo '<span id="cantidad">1</span>';
                                echo '<button class="button_cantidad mas">+</button>';
                                echo '<button class="modal__add" id="agregarAlCarrito">Agregar</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</section>';
                                
                            }
                            elseif ($categoria == 'Alitas' || $categoria == 'Boneless') {
                                echo '<div class="contenedor_producto producto" data-item="' . $dataItem . '">';
                                echo '<img class="imagen_producto" src="' . $imagen . '" alt="' . $nombre . '">';
                                echo '<div class="producto_info">';
                                echo '<h2 class="producto_nombre">' . $nombre . '</h2>';
                                echo '<p class="descripcion_producto">' . $descripcion . '</p>';
                                echo '</div>';
                                echo '<p class="precio_producto">Precio: $' . $precio . '</p>';
                                echo '</div>';

                                echo '<section class="modal modal-item" data-item="' . $dataItem . '">';
                                echo '<div class="modal__container">';
                                echo '<h2 class="modal__title">Nombre</h2>';
                                echo '<p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam quas, culpa tempora. Veniam consectetur deleniti maxime.</p>';
                                echo '<form id="pedidoForm">';
                                echo '<div class="form-group opciones_papas">';
                                echo '<label>Salsa</label>';
                                echo '<ol class="opciones">';
                                echo '<li><input type="radio" name="papas" value="sin_papas"> Guabos ($0)</li>';
                                echo '<li><input type="radio" name="papas" value="con_papas"> BBQ ($0)</li>';
                                echo '<li><input type="radio" name="papas" value="con_papas_preparadas"> Lemon Pepper ($0)</li>';
                                echo '</ol>';
                                echo '</div>';

                                echo '<div class="form-group">';
                                echo '<label>¿Desea bebida?</label>';
                                echo '<ol class="opciones">';
                                echo '<li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)</li>';
                                echo '<li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)</li>';
                                echo '<li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>';
                                echo '<li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>';
                                echo '</ol>';
                                echo '</div>';
                                echo '</form>';

                                echo '<div id="resultado">';
                                echo '<h3>Precio: $<span id="total">0.00</span></h3>';
                                echo '</div>';

                                echo '<div class="modal__button-container">';
                                echo '<button class="modal__close">Cancelar</a>';
                                echo '<button class="button_cantidad menos">-</button>';
                                echo '<span id="cantidad">1</span>';
                                echo '<button class="button_cantidad mas">+</button>';
                                echo '<button class="modal__add" id="agregarAlCarrito">Agregar</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</section>';

                            }
                            elseif ($categoria == 'Entradas') {
                                echo '<div class="contenedor_producto producto entrada" data-item="' . $dataItem . '">';
                                echo '<img class="imagen_producto" src="' . $imagen . '" alt="' . $nombre . '">';
                                echo '<div class="producto_info">';
                                echo '<h2 class="producto_nombre">' . $nombre . '</h2>';
                                echo '<p class="descripcion_producto">' . $descripcion . '</p>';
                                echo '</div>';
                                echo '<p class="precio_producto">Precio: $' . $precio . '</p>';
                                echo '</div>';

                                echo '<section class="modal modal-item" data-item="' . $dataItem . '">';
                                echo '<div class="modal__container">';
                                echo '<h2 class="modal__title">Nombre</h2>';
                                echo '<p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam quas, culpa tempora. Veniam consectetur deleniti maxime.</p>';
                                echo '<form id="pedidoForm">';
                                echo '<div class="form-group opciones_papas">';
                                echo '<label>¿Desea papas?</label>';
                                echo '<ol class="opciones">';
                                echo '<li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>';
                                echo '<li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>';
                                echo '<li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas preparadas ($30)</li>';
                                echo '</ol>';
                                echo '</div>';

                                echo '<div class="form-group">';
                                echo '<label>¿Desea bebida?</label>';
                                echo '<ol class="opciones">';
                                echo '<li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)</li>';
                                echo '<li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)</li>';
                                echo '<li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>';
                                echo '<li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>';
                                echo '</ol>';
                                echo '</div>';
                                echo '</form>';

                                echo '<div id="resultado">';
                                echo '<h3>Precio: $<span id="total">0.00</span></h3>';
                                echo '</div>';

                                echo '<div class="modal__button-container">';
                                echo '<button class="modal__close">Cancelar</a>';
                                echo '<button class="button_cantidad menos">-</button>';
                                echo '<span id="cantidad">1</span>';
                                echo '<button class="button_cantidad mas">+</button>';
                                echo '<button class="modal__add" id="agregarAlCarrito">Agregar</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</section>';

                            }

                            $dataItem++;
                        }
                    } 
                    else {
                        echo '<p> No hay resultados. </p>';
                    }
                    ?>

                    <!-- <div class="contenedor_producto producto" data-item="1">
                        <img class="imagen_producto" src="../Imagenes/La_Guabos.jpg" alt="La Guabos">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Promocion 1</h2>
                            <p class="descripcion_producto">Esta viene con mas queso
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $70.00</p>
                    </div>
                    <section class="modal modal-item" data-item="1">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto" data-item="2">
                        <img class="imagen_producto" src="../Imagenes/La_Guabos.jpg" alt="La Guabos">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Promocion 2</h2>
                            <p class="descripcion_producto"> esta promo viene con mas aguacate
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $60.00</p>
                    </div>
                    <section class="modal modal-item" data-item="2">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto" data-item="3">
                        <img class="imagen_producto" src="../Imagenes/La_Guabos.jpg" alt="La Guabos">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Promocion 3</h2>
                            <p class="descripcion_producto">Y esta viene con pan recien hecho
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $60.00</p>
                    </div>
                    <section class="modal modal-item" data-item="3">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section> -->

                </section>
            </div>

            <div class="contenedor_seccion">
                <section class="Hamburguesas" id="Hamburguesas">
                    <h1>Hamburguesas</h1>

                    <div class="contenedor_producto producto" data-item="4">
                        <img class="imagen_producto" src="../Imagenes/La_Guabos.jpg" alt="La Guabos">
                        <div class="producto_info">
                            <h2 class="producto_nombre">La Guabos</h2>
                            <p class="descripcion_producto">Carne 100% de res 180 gramos hecha en casa, salami, jamón, queso amarillo, y una alita en salsa guabos clavada sobre nuestro tradicional pan artesanal.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $70.00</p>
                    </div>
                    <section class="modal modal-item" data-item="4">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto" data-item="5">
                        <img class="imagen_producto" src="../Imagenes/Dark_Bacon.jpg" alt="Dark Bacon">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Dark Bacon</h2>
                            <p class="descripcion_producto">Carne 100% res 200 gramos hecha en casa, rellena de queso mozzarella , envuelta en capas de tocino dorado con aderezo chipotle, en pan artesanal negro.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $105.00</p>
                    </div>
                    <section class="modal modal-item" data-item="5">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto" data-item="6" >
                        <img class="imagen_producto" src="../Imagenes/Barbie-Q.jpg" alt="Barbie-Q">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Barbie-Q</h2>
                            <p class="descripcion_producto">Carne 100% res de 180 gramos hecha en casa, aros de cebolla, jamón, queso amarillo y tocino, con salsa BBQ en nuestro exclusivo pan artesanal rosa.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $90.00</p>
                    </div>
                    <section class="modal modal-item" data-item="6">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto" data-item="7">
                        <img class="imagen_producto" src="../Imagenes/Jana_Burguer.jpg" alt="Jana">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Jana</h2>
                            <p class="descripcion_producto">180 gr de carne de res, más un exquisito queso mozzarella empanizado de DORITOS y un delicioso aderezo de jalapeño hecho en casa.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $115.00</p>
                    </div>
                    <section class="modal modal-item" data-item="7">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>
                </section>
            </div>

            <div class="contenedor_seccion">
                <section class="Boneless" id="Boneless">
                    <h1>Boneless</h1>
                    <div class="contenedor_producto producto" data-item="8">
                        <img class="imagen_producto" src="../Imagenes/boneless.jpg" alt="boneless">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Boneless 8 PZ</h2>
                            <p class="descripcion_producto">Con nuestras deliciosas y únicas salsas de guabos.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $99.00</p>
                    </div>
                    <section class="modal modal-item" data-item="8">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>Salsa</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Guabos ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> BBQ ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Lemon Pepper ($0)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto" data-item="9">
                        <img class="imagen_producto" src="../Imagenes/boneless.jpg" alt="boneless">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Boneless 12 PZ</h2>
                            <p class="descripcion_producto">Con nuestras deliciosas y únicas salsas de guabos.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $150.00</p>
                    </div>
                    <section class="modal modal-item" data-item="9">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>Salsa</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Guabos ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> BBQ ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Lemon Pepper ($0)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto" data-item="10">
                        <img class="imagen_producto" src="../Imagenes/boneless.jpg" alt="boneless">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Boneless 18 PZ</h2>
                            <p class="descripcion_producto">Con nuestras deliciosas y únicas salsas de guabos.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $210.00</p>
                    </div>
                    <section class="modal modal-item" data-item="10">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>Salsa</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Guabos ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> BBQ ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Lemon Pepper ($0)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>
                </section>
            </div>

            <div class="contenedor_seccion">
                <section class="Alitas" id="Alitas">
                    <h1>Alitas</h1>

                    <div class="contenedor_producto producto" data-item="11">
                        <img class="imagen_producto" src="../Imagenes/alitas.jpg" alt="Alitas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Alitas 8 PZ</h2>
                            <p class="descripcion_producto">Con nuestras deliciosas y únicas salsas de guabos.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $99.00</p>
                    </div>
                    <section class="modal modal-item" data-item="11">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>Salsa</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Guabos ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> BBQ ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Lemon Pepper ($0)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto" data-item="12">
                        <img class="imagen_producto" src="../Imagenes/alitas.jpg" alt="Alitas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Alitas 12 PZ</h2>
                            <p class="descripcion_producto">Con nuestras deliciosas y únicas salsas de guabos.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $150.00</p>
                    </div>
                    <section class="modal modal-item" data-item="12">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>Salsa</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Guabos ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> BBQ ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Lemon Pepper ($0)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto" data-item="13">
                        <img class="imagen_producto" src="../Imagenes/alitas.jpg" alt="Alitas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Alitas 18 PZ</h2>
                            <p class="descripcion_producto">Con nuestras deliciosas y únicas salsas de guabos.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $210.00</p>
                    </div>
                    <section class="modal modal-item" data-item="13">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>Salsa</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Guabos ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> BBQ ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Lemon Pepper ($0)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>
                </section>
            </div>

            <div class="contenedor_seccion">
                <section class="Entradas" id="Entradas">
                    <h1>Entradas</h1>

                    <div class="contenedor_producto producto entrada" data-item="14">
                        <img class="imagen_producto" src="../Imagenes/fries.jpg" alt="fries">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Fries</h2>
                            <p class="descripcion_producto">Papas a la francesa acompañadas con queso.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $45.00</p>
                    </div>
                    <section class="modal modal-item" data-item="14">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div> 

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto entrada" data-item="15">
                        <img class="imagen_producto" src="../Imagenes/guabosfries.jpg" alt="fries">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Guabos Fries</h2>
                            <p class="descripcion_producto">Papas a la francesa bañadas en salsa guabos, acompañadas de aderezo ranch,queso amarillo y trozos de tocino.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $75.00</p>
                    </div>
                    <section class="modal modal-item" data-item="15">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto entrada" data-item="16">
                        <img class="imagen_producto" src="../Imagenes/guabosfries_tenders.jpg" alt="fries">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Guabos Fries con tenders</h2>
                            <p class="descripcion_producto">Papas a la francesa bañadas en salsa guabos, acompañadas de aderezo ranch,queso amarillo,trozos de tocino y trocitos de tenders.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $120.00</p>
                    </div>
                    <section class="modal modal-item" data-item="16">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                    <div class="contenedor_producto producto entrada" data-item="17">
                        <img class="imagen_producto" src="../Imagenes/guabits.jpg" alt="guabits">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Guabits</h2>
                            <p class="descripcion_producto">Deliciosas bolitas crujientes de papa con queso y trocitos de jalapeño.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $65.00</p>
                    </div>
                    <section class="modal modal-item" data-item="17">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.</p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Desea papas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_papas"> Sin papas ($0)</li>
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($20)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="tamarindo"> Tamarindo ($20)
                                        </li>
                                        <li><input type="radio" name="bebida" value="orchata"> Orchata ($20)</li>
                                        <li><input type="radio" name="bebida" value="limon"> Limón ($20)</li>
                                    </ol>
                                </div>
                            </form>

                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>

                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</a>
                                    <button class="button_cantidad menos">-</button>
                                    <span id="cantidad">1</span>
                                    <button class="button_cantidad mas">+</button>
                                    <button class="modal__add" id="agregarAlCarrito">Agregar</a>
                            </div>

                        </div>
                    </section>

                </section>
            </div>
        </div>

        <div class="carrito_box">
            <div id="carrito_lista">
            </div>
            <div id="carrito_Total">
                <p id="totalCarrito">Total: $<span>0</span></p>
            </div>
            <div id="carrito_ordenar">
                <button type="button" class="btnPagar">Ir a Pagar</button>

            </div>
        </div>
    </div>

    <footer>
        <div class="footer_container">
            <div class="footer_box">
                <div class="logo">
                    <h1>GUABOS</h1>
                    <!-- <img src="../Imagenes/Guabos_logo.png" alt="logo" > -->
                </div>
                <div class="terminos">
                    <p>Tu servicio de comida artesanal mas confiable. ¡AHORA TENEMOS SERVICIOS! No te quedes con Hamburguesas
                        ¡¡¡¡¡EN LINEA PIDE YA!!!! </p>
                </div>
            </div>

            <div class="footer_box">
                <h3>Encuentranos en:</h3>
                <a id="_1" href="https://www.facebook.com/Guabos">Facebook</a>
                <a id="_2" href="https://www.ubereats.com/mx/store/guabos-foodtruck/fWOPdl9RS5GVWdxcUWDfQw">UberEats</a>
                <a id="_3"
                    href="https://www.didi-food.com/es-MX/food/store/5764607692065472592/Guabos-Foodtruck/">DiDiFood
                </a>
                <a id="_4" href="https://www.rappi.com.mx/restaurantes/1923218098-guabos-foodtruck">Rappi </a>
            </div>

            <div class="footer_box">
                <h3>Dirección:</h3>
                <p>Estardo Guajardo #408 66604 <br>Apodaca, Nuevo Leon, Mexico</p>
                <br>
                <h3>Teléfono:</h3>
                <p>81-1280-2457</p>
            </div>

            <div class="box__copyright">
                <hr>
                <p>Todos los derechos reservados © 2023 <b>GUABOS</b></p>
            </div>

        </div>
    </footer>

    <script src="../JS/Jquery.js"></script>
    <script src="../JS/DespliegueHeader.js"></script>
    <script src="../JS/ModalesFuncionamiento.js"></script>
    <!-- <script src="../JS/CarritoItems.js"></script> -->
    <script src="../Librerias/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../JS/SumaFromularios.js"></script> -->
<script>
  function redirigirAPagar() {
    // Puedes cambiar 'ruta-a-pagar.html' por la ruta real de tu archivo de pago.
    window.location.href = 'pagar_orden.php';
  }
</script>
</body>

</html>