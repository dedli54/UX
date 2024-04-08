<?php
// Iniciar sesión
session_start();

// Verificar si el usuario ha iniciado sesión y si hay información de teléfono
if (isset($_SESSION["nombre"]) && isset($_SESSION["telefono"]) && isset($_SESSION["id_usuario"])) {
    $nombre = $_SESSION["nombre"];
    // Obtener el teléfono de la sesión
    $telefono = $_SESSION["telefono"];
    $id_usuario = $_SESSION["id_usuario"];

} else {
    // Si no ha iniciado sesión o no hay información de teléfono, redirigir a la página de inicio de sesión
    header("Location: iniciosesion.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Guabos | Carrito</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/Pagar.css">
</head>
<body>
    <header>
        <nav id="opciones">
            <a href="dashboard.php" class="RegresarInicio"><img id="Logo_p" src="../Imagenes/Guabos_logo.png"
                    alt="logo" /></a>
            <a><?php echo $nombre; ?></a>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="form-box">
            <h2 class="mb-4">Compra</h2>

            <hr class="mb-4">

             <form class="Compra" action="../PHP/dashboard.php" onsubmit="return validarFormulario();">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="telefono">Confirmar Teléfono</label>
                            <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>" readonly>
                        </div>

                        <hr class="mb-4">
    
                        <div class="form-group">
                        <label for="input_tipoOrden">Tipo de orden</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="domicilio" type="radio" name="TipoOrden" value="domicilio" checked onchange="toggleDireccionVisibility()">
                            <label class="form-check-label" for="domicilio">A domicilio (+$30)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="recoger" type="radio" name="TipoOrden" value="recoger" onchange="toggleDireccionVisibility()">
                            <label class="form-check-label" for="recoger">Para recoger</label>
                        </div>
                        </div>
    
                      <!-- Div que se ocultará/mostrará -->
                        <div class="form-group" id="direccionDiv">
                            <label for="input_Direccion">Dirección</label>
                            <input type="text" id="input_Direccion" class="">
                        </div>
                        
                        <hr class="mb-4">

                        <div class="form-group">
                            <label for="input_Metodo">Método de pago</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Metodo" value="efectivo" checked>
                                <label class="form-check-label" for="efectivo">Efectivo</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="Metodo" value="terminal">
                                <label class="form-check-label" for="terminal">Transferencia</label>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Cuenta">Cuenta</label>

                            <div class="ListaItems">
                                <!-- <div class="itemCarrito">
                                    <p class="itemNombre">Nombre $<span class="itemprecio">1000</span></p>
                                    <p class="itempapas">papas</p>
                                    <p class="itembebida">bebida</p>
                                    <p class="itemcantidad">cantidad: <span class="itemcannum"> 1</span></p>
                                </div>
                                <hr class="mb-4">
                                <div class="itemCarrito">
                                    <p class="itemNombre">Nombre $<span class="itemprecio">1000</span></p>
                                    <p class="itempapas">papas</p>
                                    <p class="itembebida">bebida</p>
                                    <p class="itemcantidad">cantidad: <span class="itemcannum"> 1</span></p>
                                </div>
                                <hr class="mb-4">
                                <div class="itemCarrito">
                                    <p class="itemNombre">Nombre $<span class="itemprecio">1000</span></p>
                                    <p class="itempapas">papas</p>
                                    <p class="itembebida">bebida</p>
                                    <p class="itemcantidad">cantidad: <span class="itemcannum"> 1</span></p>
                                </div> -->
                            </div>

                            <hr class="mb-4">

                            <p class="Subtotal mt-3">Subtotal: $<span>0.00</span></p>
                            <p class="Total">Total: $<span>0.00</span></p>
                        </div>

                        <hr class="mb-4">

                        <button type="#" class="button" id="botonpagar" >Terminar Orden</button>
                    </div>
                </div>
            </form>
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
                    <p>Tu servicio de comida artesanal más confiable. ¡AHORA TENEMOS SERVICIOS! No te quedes con Hamburguesas
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
                <p>Estardo Guajardo #408 66604 <br>Apodaca, Nuevo León, México</p>
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

    <script>
            // Función para mostrar u ocultar el div según el tipo de orden seleccionado
            function toggleDireccionVisibility() {
                var tipoOrden = document.querySelector('input[name="TipoOrden"]:checked').value;
                var direccionDiv = document.getElementById('direccionDiv');

                // Si el tipo de orden es "recoger", oculta el div, de lo contrario, muéstralo
                direccionDiv.style.display = (tipoOrden === 'recoger') ? 'none' : 'block';
            }
    </script>
    <script src="../JS/validarCompra.js"></script>
</body>
</html>