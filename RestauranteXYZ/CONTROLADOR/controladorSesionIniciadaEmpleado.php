<?php
// Establece el nombre de la sesión como "restaurante"
session_name("restaurante");

// Inicia la sesión si no está iniciada
session_start();

// Inicializa la variable de sesión para el aviso de inicio de sesión
$_SESSION["avisoInicio"] = "";

// Verifica si el rol de la sesión es "Empleado"
if ($_SESSION["rol"] == "Empleado"){
    // Verifica si se ha iniciado sesión anteriormente
    if (isset($_SESSION['usuario'])) {
        // Si se ha iniciado sesión, se pasa el nombre de usuario del empleado a la vista
        $data['usuario'] = $_SESSION['usuario'];
    }

    // Define la ruta del archivo de vista para la página de sesión iniciada del empleado
    $data['sesioniniciadaEmpleado'] = '../VISTA/vistaSesionIniciadaEmpleado.php';

    // Incluye el archivo de diseño/layout para la página de sesión iniciada del empleado
    include '../VISTA/LAYOUT/layoutSesionIniciadaEmpleado.php';
}
else{
    // Si el rol de la sesión no es "Empleado", redirige al usuario a la página de inicio
    header("Location: ../index.php");
    exit; // Finaliza la ejecución del script
}
?>
