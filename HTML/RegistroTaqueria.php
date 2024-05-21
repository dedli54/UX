<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/RegistroTaqueria.css">
    <title>Taqueria Juarez | Registro</title>
</head>

<body>
    <header>
        <nav id="opciones">
            <input type="button" value="Regresar" onclick="history.go(-1)">
            <a href="../HTML/IndexTaqueria.php" class="RegresarInicio"><img id="Logo_p" src="../Imagenes/CerroSilla.png" alt="logo" /></a>
            <a href="../HTML/InicioSesionTaqueria.php">Iniciar Sesion</a>
            <a href="../HTML/RegistroTaqueria.php">Registrarse</a>

        </nav>
    </header>

    <div class="container">
        <div class="form-box">
            <h2>Registrarse</h2>
            <form action="../PHP/CapturaUsuarioTaqueria.php" method="POST">
                <div class="form-group">
                    <label for="nombres">Nombres:</label>
                    <input type="text" id="nombres" name="nombres" required>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electronico:</label>
                    <input type="text" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="fecha-nacimiento">Fecha de nacimiento:</label>
                    <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" oninput="checkPasswordMatch()" required>
                </div>
                <div class="form-group">
                    <label for="password">Confirmar Contraseña:</label>
                    <input type="password" id="password2" name="password2" oninput="checkPasswordMatch()" required>
                    <br>
                    <p id="message">Las contraseñas no coinciden.</p>
                </div>
                <button type="submit">Registrarse</button>
            </form>
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
                    <p>Empleamos para su preparación, ingredientes frescos dignos de deleitar el paladar de toda la familia, por ello también contamos con instalaciones que le harán sentir tan cómodo como si estuviera en casa</p>
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
    <script src="../JS/JS_RegistroTaqueria/ValidarContrasenaTaqueria.js"></script>
</body>

</html>