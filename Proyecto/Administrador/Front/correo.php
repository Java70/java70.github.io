
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];


    $correo1 = $_POST["correo"];


    $comentario = $_POST["comentario"];

    $destinatario = "juanantoniovalenzuelaaguilera@gmail.com"; // Reemplaza con tu dirección de correo

    $asunto = "Nuevo comentario";
    $mensaje = "Nombre: $nombre\n";
    $mensaje .= "Correo: $correo\n";
    $mensaje .= "Comentario: $comentario\n";

    $cabeceras = "From: $correo1\r\n";
    $cabeceras .= "Reply-To: $correo\r\n";

    if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
        echo "El comentario se ha enviado correctamente.";
    } else {
        echo "Error al enviar el comentario.";
    }
}
?>