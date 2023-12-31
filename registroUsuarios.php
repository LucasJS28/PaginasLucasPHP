<?php
require_once "conexiones/Conexion.php";
include 'nav.php';
$conexion = new Conexion();
if ($_POST) {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];
    $repecontra = $_POST["repecontra"];
    $rol = 4; /* Especifica que el registro es un usuario */
    try {
        if ($contrasena == $repecontra) { //Verifica que las contraseñas sean iguales
            $registroExitoso = $conexion->register($correo, $contrasena, $rol);
            if ($registroExitoso) {
                echo "<div id='alerta' class='AlertaBuena'>Registro exitoso</div>";
            } else {
                echo "<div id='alerta' class='AlertaMala'>El correo está siendo usado por otro usuario</div>";
            }
        } else {
            echo "<div id='alerta' class='AlertaMala'>Ambas contraseñas deben ser idénticas.</div>";
        }
    } catch (PDOException $e) {
        echo "<div id='alerta' class='AlertaMala'>El Correo ya se encuentra Registrado</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/styles2.css">
    <script src="scripts/scriptsValidaciones.js"></script>
</head>

<body>
    <section>
        <h2>Registro de Usuarios</h2>
        <p>¿Ya tienes cuenta? <a href="index.php">¡Ir al inicio de sesión!</a></p>
        <form action="registroUsuarios.php" method="POST" class="formu" onsubmit="return validarFormularioRegistro()">
            <input type="email" id="correo" name="correo" placeholder="Ingrese su correo electrónico:" required><br>
            <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña:" required><br>
            <input type="password" id="repecontra" name="repecontra" placeholder="Repita su Contraseña:" required><br>
            <input type="checkbox" id="terminos" required>
            <label for="terminos"><a href="terminosycondiciones.php">Acepto los Términos y Condiciones</a></label><br>
            <input type="submit" id="iniciar" value="Regístrate">
        </form>
    </section>
    <article>
        <h2>Bienvenido</h2>
    </article>
</body>

</html>