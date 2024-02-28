<?php
    // Establece el nombre de la sesión como "restaurante"
    session_name("restaurante");

    // Inicia la sesión si no está iniciada
    session_start();

    // Incluye el archivo modelo.php que contiene las funciones relacionadas con la base de datos
    include '../MODELO/modelo.php';

    // Se inicializa una variable de sesión para los avisos relacionados con las reservas
    $_SESSION["avisoReservas"] = "";

    // Verifica si el usuario tiene el rol de cliente
    if ($_SESSION["rol"] == "cliente") {
        // Obtiene las reservas pasadas del cliente actual y las asigna a la variable $reservas
        $reservas = obtenerReservasPasadasDelCliente($_SESSION['idCliente']);
        
        // Se define la ruta del archivo de vista para el historial de reservas del cliente
        $data['historicoReservas'] = '../VISTA/vistaHistoricoReservas.php';
        
        // Se incluye el archivo de diseño/layout para el historial de reservas
        include '../VISTA/LAYOUT/layoutHistoricoReservas.php';
    } else {
        // Si el usuario no tiene el rol de cliente, se redirige a la página de inicio
        header("Location: ../index.php");
        // Se finaliza la ejecución del script
        exit;
    }
?>
