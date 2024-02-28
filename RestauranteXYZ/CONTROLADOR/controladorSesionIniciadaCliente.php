<?php
    // Establece el nombre de la sesión como "restaurante"
    session_name("restaurante");

    // Inicia la sesión si no está iniciada
    session_start();

    // Inicializa la variable de sesión para el aviso de inicio de sesión
    $_SESSION["avisoInicio"] = "";

    // Verifica si el rol de la sesión es "cliente"
    if ($_SESSION["rol"] == "cliente"){
        // Verifica si se ha iniciado sesión anteriormente
        if (isset($_SESSION['usuario'])) {
            // Si se ha iniciado sesión, se pasa el correo electrónico del usuario a la vista
            $data['correo'] = $_SESSION['usuario'];
        }

        // Define la ruta del archivo de vista para la página de sesión iniciada del cliente
        $data['sesioniniciada'] = '../VISTA/vistaSesionIniciadaCliente.php';

        // Incluye el archivo de diseño/layout para la página de sesión iniciada del cliente
        include '../VISTA/LAYOUT/layoutSesionIniciadaCliente.php';
    }
    else{
        // Si el rol de la sesión no es "cliente", redirige al usuario a la página de inicio
        header("Location: ../index.php");
        exit; // Finaliza la ejecución del script
    }
?>
