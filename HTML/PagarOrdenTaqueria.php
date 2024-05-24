<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Taqueria Juarez | Carrito</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/PagarTaqueria.css">
</head>

<body>
    <?php
    include '../PHP/ValidarSesionTaqueria.php';
    ?>
    <header>
        <nav id="opciones">
            <input type="button" value="Regresar" onclick="history.go(-1)" style="background-color: #1d5635; color: black; border-radius: 5px; padding-left: 10px; padding-right: 10px;" onmouseover="this.style.backgroundColor='#c5b198'" onmouseout="this.style.backgroundColor='#1d5635'">
            <a href="../HTML/IndexTaqueria.php" class="RegresarInicio"><img id="Logo_p" src="../Imagenes/CerroSilla.png" alt="logo"></a>
        </nav>
    </header>
    <div class="container mt-4">
        <div class="form-box">
            <h2 class="mb-4">Compra</h2>
            <hr class="mb-4">
            <form class="Compra" action="../HTML/IndexTaqueria.php" onsubmit="return validarFormulario()" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono">Confirmar Teléfono</label>
                            <input type="text" id="telefono" name="telefono" oninput="ValidarTelefono()" value="<?php if ($usuario_autenticado) : echo $_SESSION['telefono_usuario']; endif;?>">
                            <p id="message-telefono">Verifique que el telefono sea válido.</p>
                        </div>
                        <hr class="mb-4">
                        <div class="form-group">
                            <label for="nombre">Confirmar Nombre</label>
                            <input type="text" id="nombres" name="nombres" oninput="checkName()" value="<?php if ($usuario_autenticado) : echo $_SESSION['nombres_usuario']; endif;?>">
                            <p id="message-nombre">Verifique que el nombre sea válido.</p>
                        </div>
                        <hr class="mb-4">
                        <div class="form-group">
                            <label for="nombre">Confirmar Correo Electrónico</label>
                            <input type="text" id="correo" name="correo" oninput="checkCorreo()" value="<?php if ($usuario_autenticado) : echo $_SESSION['correo_usuario']; endif;?>">
                            <p id="message-correo">Verifique que el correo sea válido.</p>
                        </div>
                        <hr class="mb-4">
                        <div class="form-group">
                            <label for="domicilio">Tipo de Orden</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="domicilio" type="radio" name="TipoOrden" value="domicilio" checked onchange="toggleDireccionVisibility()">
                                <label class="form-check-label" for="domicilio">A Domicilio (+$30)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="recoger" type="radio" name="TipoOrden" value="recoger" onchange="toggleDireccionVisibility()">
                                <label class="form-check-label" for="recoger">Para Recoger</label>
                            </div>
                        </div>
                        <!-- Div que se ocultará/mostrará -->
                        <div class="form-group" id="direccionDiv">
                            <label for="input_Direccion">Dirección</label>
                            <input type="text" id="input_Direccion" class="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="efectivo">Método de Pago</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="efectivo" type="radio" name="Metodo" value="efectivo" checked>
                                <label class="form-check-label" for="efectivo">Efectivo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" id="terminal" type="radio" name="Metodo" value="terminal">
                                <label class="form-check-label" for="terminal">Transferencia</label>
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="form-group">
                            <label>Cuenta</label>
                            <div class="ListaItems">
                            </div>
                            <hr class="mb-4">
                            <p class="Subtotal mt-3">Subtotal: $<span>0.00</span></p>
                            <p class="Total">Total: $<span>0.00</span></p>
                        </div>
                        <hr class="mb-4">
                        <button type="#" class="button" id="botonpagar">Terminar Orden</button>
                    </div>
                </div>
            </form>
            <hr class="mb-4">
        </div>
    </div>

    <footer>
        <div class="footer_container">
            <div class="footer_box">
                <div class="logo">
                    <h1> Taquería Juárez </h1>
                </div>
                <div class="terminos">
                    <p>Empleamos para su preparación, ingredientes frescos dignos de deleitar el paladar de toda la familia, por ello también contamos con instalaciones que le harán sentir tan cómodo como si estuviera en casa.</p>
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
    <script src="../JS/JS_PagarOrdenTaqueria/validarCompraTaqueria.js"></script>
    <script src="../JS/JS_PagarOrdenTaqueria/validarTelefonoTaqueria.js"></script>
    <script src="../JS/JS_PagarOrdenTaqueria/mostrarOcultarDireccionTaqueria.js"></script>
</body>

</html>