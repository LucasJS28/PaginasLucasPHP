<?php
session_start();
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="estilos/style.css">
</head>

<body>
    <section class="divContactos">
        <h2>Comunicate con Nosotros</h2>
        <section class="sectContacto">
            <h2>.</h2>
            <!-- Muestra un Mapa extraido desde google maps -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2733.8085462469676!2d-71.6710038350798!3d-35.428430353748354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9665c41f2b804f9f%3A0x4aef446b819b907d!2sUniversidad%20Santo%20Tom%C3%A1s!5e0!3m2!1ses!2scl!4v1680906638918!5m2!1ses!2scl" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
    </section>
    <div class="info">
        <p>Redes :<a href="#">Instagram </a><a href="#">Whatsapp</a>
        <p>Correo Electronico: contacto@empresa.com</p>
        <p>Dirección: Calle 123, Ciudad, Estado, Código Postal</p>
        <p>Teléfono: 555-555-5555</p>
        <p>Horario de atención: Lunes a Viernes de 9:00 am a 5:00 pm</p>
    </div>
</body>

</html>