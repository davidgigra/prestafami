<?php
$nombre = $_POST['nombre'];
$mail = $_POST['email'];
$mail = $_POST['telefono'];
$mensaje = $_POST['mensaje'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este Nensaje Fue Enviado Por: " . $nombre . ",\r\n";
$mensaje .= "Su E-mail es: " . $mail . " \r\n";
$mensaje .= "Mensaje: " . $_POST['mensaje'] . " \r\n";
$mensaje .= "Enviado el: " . date('d/m/Y', time());

$para = 'camilo61@utp.edu..co';
$asunto = 'Información PrestaFami';

mail($para, $asunto, utf8_decode($mensaje), $header);

header("Location: /");
?>