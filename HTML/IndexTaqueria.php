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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Taqueria Juarez | Menu</title>
<link rel="stylesheet" href="../Librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
<!---->    <link rel="stylesheet" href="../CSS/IndexTaqueria.css">
</head>

<body>
    <header>
        <div class="Presentacion">
            <img id="Logo_G" src="../Imagenes/Juarez-logo.jpg" alt="Logo Grande">
            <ul>
                <li class="_1">TACOS</li>
                <li class="_2">ENCHILADAS</li>
                <li class="_3">FLAUTAS</li>
                <li class="_4">SOPAS</li>
                <li class="_5">SOPES</li>
                <li class="_6">& MAS</li>
            </ul>
        </div>

        <nav id="opciones">
   
        
        <a href="../HTML/IndexTaqueria.php" class="RegresarInicio"><img id="Logo_p" src="../Imagenes/CerroSilla.png"
                    alt="logo" /></a>    <!--  NO SE VE COMO UN BOTON CAMBIAR PARA QUE SE VEA-->
            <?php if($usuario_autenticado):?>
            <a>Bienvenido: <?php echo $_SESSION['nombres_usuario']; ?></a>
            <a href="../PHP/CerrarSesionTaqueria.php">Cerrar Sesion</a>
            <?php else:?>
            <a href="../HTML/InicioSesionTaqueria.php">Iniciar Sesion</a>
            <a href="../HTML/RegistroTaqueria.php">Registrarse</a>

             <?php endif; ?>
        </nav>

        <div class="Menu">
            <nav id="menu">
                <ul>
                    <li><a href="#MasPopulares">Más Populares</a></li>
                    <li><a href="#Entradas">Entradas</a></li>
                    <li><a href="#Platillos">Platillos</a></li>
                    <li><a href="#Combos">Combos</a></li>
                   
                
                </ul>
            </nav>
        </div>
    </header>


    <div class="wrapper">
        <div class="MenuPrincipal ">
            <div class="contenedor_seccion">
                <section class="MasPopulares" id="MasPopulares">
                    <h1>Más Populares</h1>

                    <div class="contenedor_producto producto" data-item="1">
                        <img class="imagen_producto" src="../Imagenes/Flautas.jpeg" alt="Flautas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Flautas</h2>
                            <p class="descripcion_producto">Con crema y bañadas con salsa de aguacate. Orden de 5 piezas.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $238.00</p>
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
                                    <label>¿Desea extra?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_Extra"> Sin Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_crema"> Extra de crema ($18)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate">Extra de salsa de aguacate ($18)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                        <img class="imagen_producto" src="../Imagenes/enchiladas.jpeg" alt="enchiladas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Enchiladas</h2>
                            <p class="descripcion_producto"> Las tradicionales, servidas con o sin cebolla. Orden de 5 piezas.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $194.00</p>
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
                                    <label>¿Deseas cebolla en tus enchiladas?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="Cebolla">Con Cebolla</li>
                                        <li><input type="radio" name="papas" value="Sin_Cebolla"> Sin Cebolla</li>
                      
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola-Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca-cola-sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                        <img class="imagen_producto" src="../Imagenes/papadorada.jpeg" alt="papa dorada">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Papitas Doradas</h2>
                            <p class="descripcion_producto">Riquisima con salsa de aguacate
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $56.00</p>
                    </div>
                    <section class="modal modal-item" data-item="3">
                        <div class="modal__container">
                            <h2 class="modal__title">Nombre</h2>
                            <p class="modal__paragraph">Lorem ipsum </p>
                            <form id="pedidoForm">
                                <div class="form-group opciones_papas">
                                    <label>¿Cuantas quiere agregar?</label>  
                                </div>
                            </form>
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

                    <div class="contenedor_producto producto" data-item="4">
                        <img class="imagen_producto" src="../Imagenes/Cueritos.jpeg" alt="Cueritos">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Cueritos en Vinagre</h2>
                            <p class="descripcion_producto">Deliciosa combinación de tiras finas de piel de cerdo encurtida.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $56.00</p>
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
                                    <label>¿Cuantas quiere agregar?</label>  
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
                        <img class="imagen_producto" src="../Imagenes/Frijole.jpeg" alt="Frijoles Refritos con Queso">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Frijoles Refritos con Queso</h2>
                            <p class="descripcion_producto"> Frijoles refritos, acompañados de queso y servidos con totopos crujientes.
                        </div>
                        <p class="precio_producto">Precio: $56.00</p>
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
                                    <label>¿Cuantas quiere agregar?</label>  
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
                        <img class="imagen_producto" src="../Imagenes/aguacate.jpeg" alt="Barbie-Q">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Salsa de Aguacate</h2>
                            <p class="descripcion_producto">Perfecta para acompañar nuestras papitas doradas.
                               
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $70.00</p>
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
                                    <label>¿Cuantas quiere agregar?</label>  
                                </div>
                            </form>
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
                        <img class="imagen_producto" src="../Imagenes/papadorada.jpeg" alt="Jana">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Papitas Doradas</h2>
                            <p class="descripcion_producto">Riquisima con salsa de aguacate
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $56.00</p>
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
                                    <label>¿Cuantas quiere agregar?</label>  
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
                <section class="Platillos" id="Platillos">
                    <h1>Platillos</h1>
                    <div class="contenedor_producto producto" data-item="8">
                        <img class="imagen_producto" src="../Imagenes/sopes.jpeg" alt="sopes">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Orden de sopes</h2>
                            <p class="descripcion_producto">Elige entre deshebrada, picadillo con papa, chicharrón verde y chicharrón rojo. Orden de 3 piezas 
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $183.00</p>
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
                                        <li><input type="radio" name="papas" value="rojo"> Chicharrón rojo </li>
                                        <li><input type="radio" name="papas" value="verde"> Chicharrón verde </li>
                                        <li><input type="radio" name="papas" value="picadillo"> Picadillo con papa </li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                        <img class="imagen_producto" src="../Imagenes/Flautas.jpeg" alt="Flautas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Flautas</h2>
                            <p class="descripcion_producto">Con crema y bañadas con salsa de aguacate. Orden de 5 piezas
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $238.00</p>
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
                                    <label>¿Desea extra?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_Extra"> Sin Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_crema"> Extra de crema ($18)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate">Extra de salsa de aguacate ($18)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                        <img class="imagen_producto" src="../Imagenes/enchiladas.jpeg" alt="enchiladas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Enchiladas</h2>
                            <p class="descripcion_producto">Las tradicionales, servidas con o sin cebolla. Orden de 5 piezas
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $194.00</p>
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
                                        <li><input type="radio" name="papas" value="Cebolla">Con Cebolla</li>
                                        <li><input type="radio" name="papas" value="Sin_Cebolla"> Sin Cebolla</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                <section class="Combos" id="Combos">
                    <h1>Combos</h1>

                    <div class="contenedor_producto producto" data-item="11">
                        <img class="imagen_producto" src="../Imagenes/rey.jpeg" alt="rey">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Rey de la Juarez </h2>
                            <p class="descripcion_producto">Platillo surtido 8 piezas. Incluye 2 Enchiladas, 2 Flautas, 2 Tacos y 2 Tostadas
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $370.00</p>
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
                                    <label>¿Desea extra?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="papas" value="sin_Extra"> sin_Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_crema"> Extra de crema ($18)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate"> Extra de salsa de aguacate ($18)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                        <img class="imagen_producto" src="../Imagenes/plato.jpeg" alt="Alitas">
                        <div class="producto_info">
                            <h2 class="producto_nombre">Platillo</h2>
                            <p class="descripcion_producto">2 enchiladas, 2 tacos y 2 flautas.
                            </p>
                        </div>
                        <p class="precio_producto">Precio: $255.00</p>
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
                                        <li><input type="radio" name="papas" value="sin_Extra"> sin_Extra ($0)</li>
                                        <li><input type="radio" name="papas" value="con_crema"> Extra de crema ($18)</li>
                                        <li><input type="radio" name="papas" value="con_aguacate"> Extra de salsa de aguacate ($18)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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

                   

                        </div>
                    </section>
                </section>
            </div>
<!--
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
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($48)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div> 

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                            <p class="descripcion_producto">Papas a la francesa bañadas en salsa guabos, acompañadas
                                de aderezo ranch,queso amarillo y trozos de tocino.
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
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($48)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                            <p class="descripcion_producto">Papas a la francesa bañadas en salsa guabos, acompañadas
                                de aderezo ranch,queso amarillo,trozos de tocino y trocitos de tenders.
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
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($48)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                            <p class="descripcion_producto">Deliciosas bolitas crujientes de papa con queso y
                                trocitos
                                de jalapeño.
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
                                        <li><input type="radio" name="papas" value="con_papas"> Con papas ($48)</li>
                                        <li><input type="radio" name="papas" value="con_papas_preparadas"> Con papas
                                            preparadas ($30)</li>
                                    </ol>
                                </div>

                                <div class="form-group">
                                    <label>¿Desea bebida?</label>
                                    <ol class="opciones">
                                        <li><input type="radio" name="bebida" value="sin_bebida"> Sin Bebida ($0)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola"> Coca-Cola ($48)
                                        </li>
                                        <li><input type="radio" name="bebida" value="Coca-Cola Light"> Coca-Cola Light ($48)</li>
                                        <li><input type="radio" name="bebida" value="Coca cola sin-azucar"> Coca cola sin-azucar ($48)</li>
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
                <section class="Malteadas" id="Malteadas">
                    <h1>Malteadas</h1>
                </section>
            </div> -->

          <!--  <div class="contenedor_seccion">
                <section class="Bebidas" id="Bebidas">
                    <h1>Bebidas</h1>
                </section>
            </div>

             <div>
                <div class="contenedor_seccion">
    
                </div>
            </div> -->
        </div>

        <div class="carrito_box">
            <div id="carrito_lista">
                <!-- <div class="itemCarrito">
                    <p class="itemNombre">Nombre $<span class="itemprecio">1000</span></p>
                    <p class="itempapas">papas</p>
                    <p class="itembebida">bebida</p>
                    <p class="itemcantidad">cantidad: <span class="itemcannum"> 1</span></p>
                    <button type="button" class="botonEliminar">Eliminar</button>
                </div>
                <div class="itemCarrito">
                    <p class="itemNombre">Nombre $<span class="itemprecio">1000</span></p>
                    <p class="itempapas">papas</p>
                    <p class="itembebida">bebida</p>
                    <p class="itemcantidad">cantidad: <span class="itemcannum"> 1</span></p>
                    <button type="button" class="botonEliminar">Eliminar</button>
                </div> -->
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
                    <!-- <img src="../Imagenes/Guabos_logo.png" alt="logo" > -->
                </div>
                <div class="terminos">
                    <p>Empleamos para su preparación, ingredientes frescos dignos de deleitar el paladar de toda la familia, por ello también contamos con instalaciones que le harán sentir tan cómodo como si estuviera en casa </p>
                </div>
            </div>

            <div class="footer_box">
                <h3>Encuentranos en:</h3>
                <a id="_1" href="https://www.facebook.com/taqueriajuarezmx/">Facebook</a>
                <a id="_2" href="https://www.instagram.com/taqueria_juarez/">Instagram</a>
                <a id="_3" href="https://www.ubereats.com/mx-en/store/taqueria-juarez-centro/JU1Fo75wQyCK6QNwIt7AJQ">Uber Eats</a>            
            </div>

            <div class="footer_box">
                <h3>Direccion:</h3>
                <p>Galeana Nte 123<br>Centro, Monterrey, Nuevo León 64000</p>
                <br>
                <h3>Telefono:</h3>
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

    <script src="../JS/Jquery.js"></script>
   <script src="../JS/DespliegueHeader.js"></script>
    <script src="../JS/ModalesFuncionamiento.js"></script>
    <!-- <script src="../JS/CarritoItems.js"></script> -->
    <!--<script src="../Librerias/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>-->
    <!-- <script src="../JS/SumaFromularios.js"></script> -->
</body>

</html>