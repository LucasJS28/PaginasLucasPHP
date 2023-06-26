<?php
include 'nav.php';  
require_once "conexiones/Conexion.php";
session_start();
$conexion = new Conexion();

if (isset($_POST['correoUsuario']) && isset($_POST['passUsuario'])) {
    $correoUsuario = $_POST['correoUsuario'];
    $passUsuario = $_POST['passUsuario'];
    $idRol = $conexion->login($correoUsuario, $passUsuario);/* Usa el metodo para el login que verifica si existe y devuelve true y el valor del idRol del Usuario */
    if ($idRol !== false) {
        $_SESSION["idUsuario"] = $idRol; // Guardar el ID del usuario en la sesión
        switch ($idRol) {
            case 1:
                header("Location: administracion/panelAdministrador.php");
                $_SESSION["Puesto"] = "Administrador"; //Asigna el Puesto para Posteriormente Validar que sea inicializado y usarlo en su Nav
                break;
            case 2:
                header("Location: administracion/panelTrabajador.php");
                $_SESSION["Puesto"] = "Trabajador";
                break;
            case 3:
                header("Location: administracion/panelJefe.php");
                $_SESSION["Puesto"] = "Jefe";
                break;
            case 4:
                header("Location: tienda.php");
                $_SESSION["Puesto"] = "Usuario";
                break;
            default:
                break;
        }
        exit;
    } else {
        echo "<div id='alerta' class='AlertaMala'>Credenciales incorrectas. Inténtalo nuevamente.</div>";
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
        <h2>Iniciar Sesion</h2>
        <p>Nuevo Usuario? <a href="registroUsuarios.php">!!Registrate!!</a></p>
        <form action="index.php" method="POST">
        <input type="email" id="correoUsuario" name="correoUsuario" placeholder="Ingrese su Correo Electronico:" required><br><br>
            <input type="password" id="passUsuario" name="passUsuario" placeholder="Ingrese la Contraseña"><br><br>
            <br><input type="submit" id="iniciar" value="Iniciar Sesion">
            <p>No tienes Cuenta? <a href="registroUsuarios.php">Registrate</a></p><br>
        </form>
    </section>
    <article>
        <h2>Bienvenido al Inicio de Sesion</h2>
    </article>
</body>

</html>