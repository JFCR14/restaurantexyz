<?php
// Establece el nombre de la sesión como "restaurante"
session_name("restaurante");

// Inicia la sesión si no está iniciada
session_start();

// Incluye el archivo del modelo que contiene las funciones para interactuar con la base de datos
include '../MODELO/modelo.php';

// Inicializa la variable de sesión para el aviso de reservas
$_SESSION["avisoReservas"] = "";

// Verifica si el rol de la sesión es "Empleado"
if ($_SESSION["rol"] == "Empleado") {
    // Consulta inicial para obtener todas las reservas
    $reservas = obtenerTodasLasReservas();

    // Si se envió una fecha a través del formulario de filtrado, obtener las reservas para esa fecha
    if (isset($_POST['filtrar'])) {
        $fechaSeleccionada = $_POST['fecha_seleccionada'];
        $reservas = obtenerReservasPorFecha($fechaSeleccionada);
    }

    // Si se envió el formulario de cancelar reserva
    if (isset($_POST['cancelar'])) {
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $mesa = $_POST['mesa'];
        // Intenta cancelar la reserva
        if (borrarReserva($fecha, $hora, $mesa)) {
            $_SESSION["avisoReservas"] = "Reserva cancelada correctamente.";
            // Si se cancela una reserva, refrescar las reservas para la fecha seleccionada (o todas si no hay filtro)
            if (isset($_POST['fecha_seleccionada'])) {
                $reservas = obtenerReservasPorFecha($_POST['fecha_seleccionada']);
            } else {
                $reservas = obtenerTodasLasReservas();
            }
        } else {
            $_SESSION["avisoReservas"] = "Ha habido un error al cancelar la reserva. Por favor, inténtelo de nuevo.";
        }
    }

    // Define la ruta del archivo de vista para la página de visualizar reservas
    $data['gestionarReservas'] = '../VISTA/vistaVisualizarReservas.php';

    // Incluye el archivo de diseño/layout para la página de visualizar reservas
    include '../VISTA/LAYOUT/layoutVisualizarReservas.php';
} else {
    // Si el rol de la sesión no es "Empleado", redirige al usuario a la página de inicio
    header("Location: ../index.php");
    exit; // Finaliza la ejecución del script
}
?>
