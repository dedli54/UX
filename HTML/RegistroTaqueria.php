<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Librerias/bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/RegistroTaqueria.css">
    <title>Taquería Juárez | Registro</title>
</head>

<body>
    <header>
        <nav id="opciones">
            <input type="button" value="Regresar" onclick="history.go(-1)">
            <a href="../HTML/IndexTaqueria.php" class="RegresarInicio"><img id="Logo_p" src="../Imagenes/CerroSilla.png" alt="logo" /></a>
            <a href="../HTML/InicioSesionTaqueria.php">Iniciar Sesión</a>
            <a href="../HTML/RegistroTaqueria.php">Registrarse</a>

        </nav>
    </header>

    <div class="container">
        <div class="form-box">
            <h2>Registrarse</h2>
            <form action="../PHP/CapturaUsuarioTaqueria.php" onsubmit="return validarFormulario()" method="POST">
                <div class="form-group">
                    <label for="nombres">Nombre(s):</label>
                    <input type="text" id="nombres" name="nombres" oninput="checkName()" required>
                    <br>
                    <p id="message-nombre">Favor de ingresar un nombre válido.</p>
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellido(s):</label>
                    <input type="text" id="apellidos" name="apellidos" oninput="checkLastName()" required>
                    <br>
                    <p id="message-apellido">Favor de ingresar un apellido válido.</p>
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="text" id="correo" name="correo" oninput="checkCorreo()" required>
                    <br>
                    <p id="message-correo">Favor de ingresar un correo válido.</p>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" oninput="checkTel()" required>
                    <br>
                    <p id="message-telefono">Favor de ingresar un teléfono válido.</p>
                </div>
                <div class="form-group">
                    <label for="fecha-nacimiento">Fecha de Nacimiento:</label>
                    <input type="date" id="fecha-nacimiento" name="fecha-nacimiento" oninput="checkDate()" required>
                    <br>
                    <p id="message-fecha">Favor de ingresar una fecha válida.</p>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" oninput="checkPassword()" required>
                    <br>
                    <p id="message-contrasena1">hola</p>
                </div>
                <div class="form-group">
                    <label for="password">Confirmar Contraseña:</label>
                    <input type="password" id="password2" oninput="checkPasswordMatch()" required>
                    <br>
                    <p id="message-contrasena">Las contraseñas no coinciden.</p>
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
    <script src="../JS/JS_RegistroTaqueria/ValidarRegistroTaqueria.js"></script>
</body>

</html>