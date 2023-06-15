<?php
require_once "conexiones/Conexion.php";
include 'nav.php';  

if ($_POST) {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $repecontra = $_POST["repecontra"];
    $rol = $_POST["rol"];
    if ($contrasena == $repecontra) {
        $conexion = new Conexion();
        $registroExitoso = $conexion->register($correo, $contrasena, $rol);

        if ($registroExitoso) {
            echo "Registro exitoso";
        } else {
            echo "Error al registrar el usuario";
        }
    } else {
        echo "Ambas Contraseñas deben ser Identicas";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/styles2.css">
</head>

<body>
    <section>
        <h2>Registro de Usuarios</h2>
        <p>¿Ya tienes cuenta? <a href="index.php">¡Ir al inicio de sesión!</a></p>
        <form action="registroUsuarios.php" method="POST" class="formu">
            <input type="email" id="correo" name="correo" placeholder="Ingrese su correo electrónico:" required><br>
            <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña:" required><br>
            <input type="password" id="repecontra" name="repecontra" placeholder="Repita su Contraseña:" required><br>
            <input type="hidden" name="rol" value="4">
            <input type="checkbox" id="terminos" required>
            <label for="terminos">Acepto los Términos y Condiciones</label><br>
            <input type="submit" id="iniciar" value="Regístrate">
        </form>
    </section>
    <article>
        <h2>Bienvenido al Registro</h2>
    </article>
</body>

</html>