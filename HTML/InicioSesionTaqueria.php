<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/InicioSesion.css">
    <title>Taquer&iacute;a Juarez | Inicio de sesion</title>
</head>
<body>
    <header>
        <nav id="opciones">
            <a href="../HTML/IndexTaqueria.php" class="RegresarInicio"><img id="Logo_p" src="../Imagenes/CerroSilla.png"
                    alt="logo" /></a>
            <a href="../HTML/InicioSesionTaqueria.php">Iniciar Sesion</a>
            <a href="../HTML/RegistroTaqueria.php">Registrarse</a>
        </nav>
    </header>

    <div class="container">
        <div class="form-box">
            <h2>Iniciar Sesion</h2>
            <form action="../PHP/IniciarSesionTaqueria.php" method="POST">
                <div class="form-group">
                    <label for="correo">Correo Electronico:</label>
                    <input type="text" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="password">Contrasena:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Iniciar</button>
            </form>
        </div>
    </div>
</body>

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
</body>
</html>