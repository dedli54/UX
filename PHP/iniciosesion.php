
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/InicioSesion.css">
    <title>Guabos | Inicio de sesión</title>
</head>
<body>
    <header>
        <nav id="opciones">
            <a class="RegresarInicio"><img id="Logo_p" src="../Imagenes/Guabos_logo.png"
                    alt="logo" /></a>
            <a href="registro.php">Registrarse</a>
        </nav>
    </header>

    <div class="container">
        <div class="form-box">
            <h2>Iniciar Sesión</h2>
            <form  action="sesion_iniciada_DAO.php" method="POST">
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="text" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
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
                <h1>GUABOS</h1>
            </div>
            <div class="terminos">
                <p>Los datos recopilados por nuestros clientes unicamente estaran guardados para fines relacionados al restaurantes.
                    Informacion personal y/o direcciones no seran ni siquiera almacenados todo con el fin de respetar la privacidad de nuestros
                    clientes como indica la ley Ley Federal de Protección de Datos Personales<a href="https://www.diputados.gob.mx/LeyesBiblio/pdf/LFPDPPP.pdf"></a>.
                </p>
            </div>
        </div>

        <div class="footer_box">
            <h3>Encuentranos en:</h3>
            <a id="_1" href="https://www.facebook.com/Guabos">Facebook</a>
            <a id="_2" href="https://www.ubereats.com/mx/store/guabos-foodtruck/fWOPdl9RS5GVWdxcUWDfQw">UberEats</a>
            <a id="_3" href="https://www.didi-food.com/es-MX/food/store/5764607692065472592/Guabos-Foodtruck/">DiDiFood </a>
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
</body>
</html>