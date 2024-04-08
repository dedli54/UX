<?php
/*$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$nombre = filter_var($_POST[ 'nombre'], FILTER SANITIZE STRING) ;
$texto = filter_var($_POST['texto'], FILTER SANITIZE STRING) ;
if( lempty($email) && lempty($nombre) && | empty($texto)){
$destino = 'davidemmanuelbc@gmail.com';
$asunto = 'Email de prueba';
$cuerpo = '
<html>
    <head>
    ‹title›Prueba de correo‹/title>
    </head>
‹body>
<h1>Email de: '.$nombre. '</h1>
<p› '.$texto. '</p>
</body>
</html>
';
//para el envio en formato HTML
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
//dirección del remitente
$headers .= "From: $nombre <$email>\r\n";
//ruta del mensaje desde origen a destino
$headers .= "Return-path: $destino\r\n";
mail ($destino, $asunto, $cuerpo, $headers) ;
echo "Email enviado correctamente";
}
else{

    echo"Error al enviar el mail";
}*/
?>