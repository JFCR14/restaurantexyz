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
        // Obtiene las reservas del cliente actual y las asigna a la variable $reservas
        $reservas = obtenerReservasDelCliente($_SESSION['idCliente']);

        // Verifica si se ha enviado el formulario de cancelación de reserva
        if (isset($_POST['cancelar'])) {
            // Obtiene los datos de la reserva a cancelar del formulario
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $mesa = $_POST['mesa'];

            // Intenta borrar la reserva utilizando la función borrarReserva del modelo
            if (borrarReserva($fecha, $hora, $mesa)) {
                // Si se borra correctamente, se muestra un mensaje de éxito
                $_SESSION["avisoReservas"] = "Eliminado Correctamente. Le esperamos de vuelta";
                // Se actualizan las reservas del cliente
                $reservas = obtenerReservasDelCliente($_SESSION['idCliente']);
            } else {
                // Si hay un error al borrar la reserva, se muestra un mensaje de error
                $_SESSION["avisoReservas"] = "Ha habido un error. Por favor, inténtelo de vuelta";
            }
        }

        // Se define la ruta del archivo de vista para gestionar reservas
        $data['gestionarReservas'] = '../VISTA/vistaGestionarReservas.php';

        // Se incluye el archivo de diseño/layout para la gestión de reservas
        include '../VISTA/LAYOUT/layoutGestionarReservas.php';
    } else {
        // Si el usuario no tiene el rol de cliente, se redirige a la página de inicio
        header("Location: ../index.php");
        // Se finaliza la ejecución del script
        exit;
    }
?>
