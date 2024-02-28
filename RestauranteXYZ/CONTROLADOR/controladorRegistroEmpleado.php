<?php
// Establece el nombre de la sesión como "restaurante"
session_name("restaurante");
// Inicia la sesión si no está iniciada
session_start();
// Incluye el archivo modelo.php que contiene las funciones relacionadas con la base de datos
include '../MODELO/modelo.php';
// Inicializa las variables de sesión para los avisos relacionados con el usuario y el registro
$_SESSION["avisoUsuario"] = "";
$_SESSION["avisoRegistro"] = "";

// Función para verificar si el nombre de usuario tiene al menos 4 caracteres
function verificarUsuario($usuario){
    if (strlen($usuario) >= 4) {
        return true; 
    } else {
        return false; 
    }
}

// Función para verificar si la contraseña tiene al menos 8 caracteres
function verificarContraseña($contraseña){
    if (strlen($contraseña) >= 8) {
        return true; 
    } else {
        return false; 
    }
}

// Verifica si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Verifica si el nombre de usuario y la contraseña cumplen con los requisitos mínimos
    if (verificarUsuario($usuario) && verificarContraseña($password)){
        // Intenta registrar al usuario en la base de datos
        if (registrarUsuario($usuario, $password)) { // Función para registrar usuario en la base de datos
            $_SESSION["avisoRegistro"] = "No se ha podido registrar.";
        } else {
            // Si el registro es exitoso, redirige al usuario a la página de inicio de sesión de empleado
            header('Location: controladorSesionIniciadaEmpleado.php');
            exit;
        }
    } else {
        // Si el nombre de usuario o la contraseña no cumplen con los requisitos mínimos, muestra un mensaje de aviso correspondiente
        if (!verificarUsuario($usuario)){
            $_SESSION["avisoUsuario"] = "El nombre de usuario debe tener al menos 4 caracteres.";
        }
        else if (!verificarContraseña($password)){
            $_SESSION["avisoUsuario"] = "La contraseña debe tener al menos 8 caracteres.";
        }
    }
}

// Define la ruta del archivo de vista para el registro de empleado
$data['registroEmpleado'] = '../VISTA/vistaRegistroEmpleado.php';
// Incluye el archivo de diseño/layout para el registro de empleado
include '../VISTA/LAYOUT/layoutRegistroEmpleado.php';
?>
