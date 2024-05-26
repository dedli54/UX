<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Taquería Juárez | Menú</title>
    <link rel="stylesheet" href="../Librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/IndexTaqueria.css">
</head>

<body>
    <?php
    include '../PHP/ValidarSesionTaqueria.php';
    ?>
    <?php
    include '../PHP/MostrarFeedTaqueria.php';
    ?>
    <header>
        <div class="Presentacion">
            <img id="Logo_G" src="../Imagenes/Juarez-logo.jpg" alt="Logo Grande">
            <ul>
                <li class="_1">TACOS</li>
                <li class="_2">ENCHILADAS</li>
                <li class="_3">FLAUTAS</li>
                <li class="_4">SOPES</li>
                <li class="_5">& MÁS</li>
            </ul>
        </div>
        <nav id="opciones">
            <a href="../HTML/IndexTaqueria.php" class="RegresarInicio"><img id="Logo_p" src="../Imagenes/CerroSilla.png" alt="logo"></a>
            <?php if ($usuario_autenticado) : ?>
                <a id="aBienvenidoUsuario">Bienvenido: <?php echo $_SESSION['nombres_usuario']; ?></a>
                <a href="../PHP/CerrarSesionTaqueria.php">Cerrar Sesión</a>
            <?php else : ?>
                <a id="aIniciarSesion" href="../HTML/InicioSesionTaqueria.php">Iniciar Sesión</a>
                <a href="../HTML/RegistroTaqueria.php">Registrarse</a>
            <?php endif; ?>
        </nav>
        <div class="Menu">
            <nav id="menu">
                <ul>
                    <?php if ($usuario_conFeed) : ?>
                        <li><a id="liamaspedido" href="#MasPedido">Lo Más Pedido por Ti</a></li>
                    <?php endif; ?>
                    <?php if ($global_conFeed) : ?>
                        <li><a href="#MasPopular">Más Popular</a></li>
                    <?php endif; ?>
                    <li><a href="#Entradas">Entradas</a></li>
                    <li><a href="#Platillos">Platillos</a></li>
                    <li><a href="#Combos">Combos</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="wrapper">
        <div class="MenuPrincipal">
            <?php if ($usuario_conFeed) : ?>
                <div class="contenedor_seccion">
                    <section class="MasPedido" id="MasPedido">
                        <h1>Lo Más Pedido por Ti</h1>
                        <div class="contenedor_producto productomaspedido" id="divLoMasPedido">
                            <img class="imagen_producto" src="<?php echo $_SESSION['imagen_producto_usuario']; ?>" alt="FeedUsuario">
                            <div class="producto_info">
                                <h2 class="producto_nombre"><?php echo $_SESSION['nombre_producto_usuario']; ?></h2>
                                <p class="descripcion_producto"><?php echo $_SESSION['descripcion_producto_usuario']; ?></p>
                            </div>
                            <p class="precio_producto" id="categoria_maspedido">Categoría: <?php echo $_SESSION['categoria_producto_usuario']; ?></p>
                        </div>
                    </section>
                </div>
            <?php endif; ?>
            <?php if ($global_conFeed) : ?>
                <div class="contenedor_seccion">
                    <section class="MasPopular" id="MasPopular">
                        <h1>Más Popular</h1>
                        <div class="contenedor_producto productomaspedido" id="divLoMasPedido"> <!-- FeedUsuario -->
                            <img class="imagen_producto" src="<?php echo $_SESSION['imagen_producto_global']; ?>" alt="FeedUsuario">
                            <div class="producto_info">
                                <h2 class="producto_nombre"><?php echo $_SESSION['nombre_producto_global']; ?></h2>
                                <p class="descripcion_producto"><?php echo $_SESSION['descripcion_producto_global']; ?></p>
                            </div>
                            <p class="precio_producto" id="categoria_maspopular">Categoría: <?php echo $_SESSION['categoria_producto_global']; ?></p>
                        </div>
                    </section>
                </div>
            <?php endif; ?>
            <div class="contenedor_seccion">
                <section class="Entradas" id="Entradas">
                    <h1>Entradas</h1>
                    <div class="contenedor_producto producto" data-item="4"> <!-- Cueritos en Vinagre -->
                        <img class="imagen_producto" src="../Imagenes/Cueritos.jpeg" alt="Cueritos">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Cueritos en Vinagre</h2>
                            <p class="descripcion_producto">Deliciosa combinación de tiras finas de piel de cerdo y zanahorias encurtidas.</p>
                        </div>
                        <p class="precio_producto">Precio: $56.00</p>
                    </div>
                    <section class="modal modal-item" data-item="4">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.
                            </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label for="form-group opciones_papas">¿Desea Extra?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_Extra"> Sin Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate"> Extra de Zanahorias ($18)</li>
                                    </ol>
                                </div>
                                <div class="form-group">
                                    <label for="form-group">¿Desea Incrementar el Tamaño?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Orden para 1 Persona ($0)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Orden para 2 Personas ($24)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Orden Familiar ($48)</li>
                                    </ol>
                                </div>
                            </form>
                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>
                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</button>
                                <button class="button_cantidad menos">-</button>
                                <span id="cantidad">1</span>
                                <button class="button_cantidad mas">+</button>
                                <button class="modal__add" id="agregarAlCarrito">Agregar</button>
                            </div>
                        </div>
                    </section>
                    <div class="contenedor_producto producto" data-item="5"> <!-- FRIJOLES REFRITOS -->
                        <img class="imagen_producto" src="../Imagenes/Frijole.jpeg" alt="Frijoles Refritos con Queso">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Frijoles Refritos con Queso</h2>
                            <p class="descripcion_producto"> Frijoles refritos, acompañados de queso y servidos con totopos crujientes.</p>
                        </div>
                        <p class="precio_producto">Precio: $56.00</p>
                    </div>
                    <section class="modal modal-item" data-item="5">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.
                            </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label for="form-group opciones_papas">¿Desea Extra?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_Extra"> Sin Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate"> Extra de Queso ($18)</li>
                                    </ol>
                                </div>
                                <div class="form-group">
                                    <label for="form-group">¿Desea Incrementar el Tamaño?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Orden para 1 Persona ($0)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Orden para 2 Personas ($24)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Orden Familiar ($48)</li>
                                    </ol>
                                </div>
                            </form>
                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>
                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</button>
                                <button class="button_cantidad menos">-</button>
                                <span id="cantidad">1</span>
                                <button class="button_cantidad mas">+</button>
                                <button class="modal__add" id="agregarAlCarrito">Agregar</button>
                            </div>
                        </div>
                    </section>
                    <div class="contenedor_producto producto" data-item="6"> <!-- Papitas Doradas -->
                        <img class="imagen_producto" src="../Imagenes/papadorada.jpeg" alt="Jana">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Papitas Doradas</h2>
                            <p class="descripcion_producto">Riquísimas con salsa de aguacate.</p>
                        </div>
                        <p class="precio_producto">Precio: $56.00</p>
                    </div>
                    <section class="modal modal-item" data-item="6">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.
                            </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label for="form-group opciones_papas">¿Desea Extra?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_Extra"> Sin Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate"> Extra de Salsa de Aguacate ($18)</li>
                                    </ol>
                                </div>
                                <div class="form-group">
                                    <label for="form-group">¿Desea Incrementar el Tamaño?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Orden para 1 Persona ($0)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Orden para 2 Personas ($24)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Orden Familiar ($48)</li>
                                    </ol>
                                </div>
                            </form>
                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>
                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</button>
                                <button class="button_cantidad menos">-</button>
                                <span id="cantidad">1</span>
                                <button class="button_cantidad mas">+</button>
                                <button class="modal__add" id="agregarAlCarrito">Agregar</button>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
            <div class="contenedor_seccion">
                <section class="Platillos" id="Platillos">
                    <h1>Platillos</h1>
                    <div class="contenedor_producto producto" data-item="7"> <!-- Orden de sopes -->
                        <img class="imagen_producto" src="../Imagenes/sopes.jpeg" alt="sopes">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Orden de Sopes</h2>
                            <p class="descripcion_producto">Elige entre deshebrada, picadillo con papa, chicharrón verde y chicharrón rojo. Orden de 3 piezas.</p>
                        </div>
                        <p class="precio_producto">Precio: $183.00</p>
                    </div>
                    <section class="modal modal-item" data-item="7">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.
                            </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label for="form-group opciones_papas">¿De qué Guiso Desea sus Sopes?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="rojo"> Chicharrón Rojo </li>
                                        <li><input type="radio" name="papas" value="verde"> Chicharrón Verde </li>
                                        <li><input type="radio" name="papas" value="picadillo"> Picadillo con Papas </li>
                                    </ol>
                                </div>
                                <div class="form-group">
                                    <label for="form-group">¿Desea Bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca-Cola Sin-Azúcar ($48)</li>
                                    </ol>
                                </div>
                            </form>
                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>
                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</button>
                                <button class="button_cantidad menos">-</button>
                                <span id="cantidad">1</span>
                                <button class="button_cantidad mas">+</button>
                                <button class="modal__add" id="agregarAlCarrito">Agregar</button>
                            </div>
                        </div>
                    </section>
                    <div class="contenedor_producto producto" data-item="8"> <!-- Flautas -->
                        <img class="imagen_producto" src="../Imagenes/Flautas.jpeg" alt="Flautas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Flautas</h2>
                            <p class="descripcion_producto">Con crema y bañadas con salsa de aguacate. Orden de 5 piezas.</p>
                        </div>
                        <p class="precio_producto">Precio: $238.00</p>
                    </div>
                    <section class="modal modal-item" data-item="8">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.
                            </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label for="form-group opciones_papas">¿Desea Extra?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_Extra"> Sin Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_crema"> Extra de Crema ($18)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate"> Extra de Salsa de Aguacate ($18)</li>
                                    </ol>
                                </div>
                                <div class="form-group">
                                    <label for="form-group">¿Desea Bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca-Cola Sin-Azúcar ($48)</li>
                                    </ol>
                                </div>
                            </form>
                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>
                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</button>
                                <button class="button_cantidad menos">-</button>
                                <span id="cantidad">1</span>
                                <button class="button_cantidad mas">+</button>
                                <button class="modal__add" id="agregarAlCarrito">Agregar</button>
                            </div>
                        </div>
                    </section>
                    <div class="contenedor_producto producto" data-item="9"> <!-- Enchiladas -->
                        <img class="imagen_producto" src="../Imagenes/enchiladas.jpeg" alt="enchiladas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Enchiladas</h2>
                            <p class="descripcion_producto">Las tradicionales, servidas con o sin cebolla. Orden de 5 piezas.</p>
                        </div>
                        <p class="precio_producto">Precio: $194.00</p>
                    </div>
                    <section class="modal modal-item" data-item="9">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.
                            </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label for="form-group opciones_papas">Las Desea</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="Cebolla"> Con Cebolla</li>
                                        <li><input type="radio" name="papas" value="Sin_Cebolla"> Sin Cebolla</li>
                                    </ol>
                                </div>
                                <div class="form-group">
                                    <label for="form-group">¿Desea Bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca-Cola Sin-Azúcar ($48)</li>
                                    </ol>
                                </div>
                            </form>
                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>
                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</button>
                                <button class="button_cantidad menos">-</button>
                                <span id="cantidad">1</span>
                                <button class="button_cantidad mas">+</button>
                                <button class="modal__add" id="agregarAlCarrito">Agregar</button>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
            <div class="contenedor_seccion">
                <section class="Combos" id="Combos">
                    <h1>Combos</h1>
                    <div class="contenedor_producto producto" data-item="10"> <!-- Rey de la Juarez -->
                        <img class="imagen_producto" src="../Imagenes/rey.jpeg" alt="rey">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Rey de la Juárez</h2>
                            <p class="descripcion_producto">Platillo surtido 8 piezas. Incluye 2 Enchiladas, 2 Flautas, 2 Tacos y 2 Tostadas.</p>
                        </div>
                        <p class="precio_producto">Precio: $370.00</p>
                    </div>
                    <section class="modal modal-item" data-item="10">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.
                            </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label for="form-group opciones_papas">¿Desea Extra?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_Extra"> Sin Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_crema"> Extra de Crema ($18)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate"> Extra de Salsa de Aguacate ($18)</li>
                                    </ol>
                                </div>
                                <div class="form-group">
                                    <label for="form-group">¿Desea Bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca-Cola Sin-Azúcar ($48)</li>
                                    </ol>
                                </div>
                            </form>
                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>
                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</button>
                                <button class="button_cantidad menos">-</button>
                                <span id="cantidad">1</span>
                                <button class="button_cantidad mas">+</button>
                                <button class="modal__add" id="agregarAlCarrito">Agregar</button>
                            </div>
                        </div>
                    </section>
                    <div class="contenedor_producto producto" data-item="11"> <!-- Flautas -->
                        <img class="imagen_producto" src="../Imagenes/plato.jpeg" alt="Alitas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Platillo</h2>
                            <p class="descripcion_producto">2 Enchiladas, 2 Tacos y 2 Flautas.</p>
                        </div>
                        <p class="precio_producto">Precio: $255.00</p>
                    </div>
                    <section class="modal modal-item" data-item="11">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Deleniti nobis nisi quibusdam doloremque expedita quae ipsam accusamus quisquam
                                quas,
                                culpa tempora. Veniam consectetur deleniti maxime.
                            </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label for="form-group opciones_papas">¿Desea Extra?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_Extra"> Sin Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_crema"> Extra de Crema ($18)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate"> Extra de Salsa de Aguacate ($18)</li>
                                    </ol>
                                </div>
                                <div class="form-group">
                                    <label for="form-group">¿Desea Bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca-Cola Sin-Azúcar ($48)</li>
                                    </ol>
                                </div>
                            </form>
                            <div id="resultado">
                                <h3>Precio: $<span id="total">0.00</span></h3>
                            </div>
                            <div class="modal__button-container">
                                <button class="modal__close">Cancelar</button>
                                <button class="button_cantidad menos">-</button>
                                <span id="cantidad">1</span>
                                <button class="button_cantidad mas">+</button>
                                <button class="modal__add" id="agregarAlCarrito">Agregar</button>
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
                    <h1> Taquería Juárez </h1>
                </div>
                <div class="terminos">
                    <p>Empleamos para su preparación, ingredientes frescos dignos de deleitar el paladar de toda la familia,
                        por ello también contamos con instalaciones que le harán sentir tan cómodo como si estuviera en casa.
                    </p>
                </div>
            </div>
            <div class="footer_box">
                <h3>Encuéntranos en:</h3>
                <a id="_1" href="https://www.facebook.com/taqueriajuarezmx/">Facebook</a>
                <a id="_2" href="https://www.instagram.com/taqueria_juarez/">Instagram</a>
                <a id="_3" href="https://www.ubereats.com/mx-en/store/taqueria-juarez-centro/JU1Fo75wQyCK6QNwIt7AJQ">Uber Eats</a>
            </div>
            <div class="footer_box">
                <h3>Dirección:</h3>
                <p>Galeana Nte 123<br>Centro, Monterrey, Nuevo León 64000</p>
                <br>
                <h3>Teléfono:</h3>
                <p>81-8340-1956</p>
                <h3>Correo:</h3>
                <p>taqueria-juarez@prodigy.net.mx</p>
            </div>
            <div class="box__copyright">
                <hr>
                <p>Todos los derechos reservados © 2024 <b>Taquería Juárez </b></p>
            </div>
        </div>
    </footer>
    <script src="../JS/JS_IndexTaqueria/JqueryIndexTaqueria.js"></script>
    <script src="../JS/JS_IndexTaqueria/DespliegueHeaderTaqueria.js"></script>
    <script src="../JS/JS_IndexTaqueria/ModalesFuncionamientoTaqueria.js"></script>
    <script src="../JS/JS_IndexTaqueria/MostrarMisMasPedidosTaqueria.js"></script>
</body>

</html>