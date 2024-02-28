<?php
    // Establece el nombre de la sesión como "restaurante"
    session_name("restaurante");

    // Inicia la sesión si no está iniciada
    session_start();

    // Incluye el archivo modelo.php que contiene las funciones relacionadas con la base de datos
    include '../MODELO/modelo.php';

    // Se inicializa una variable de sesión para los avisos relacionados con la reserva
    $_SESSION["avisoReserva"] = "";

    // Verifica si el rol de sesión es "cliente"
    if ($_SESSION["rol"] == "cliente") {
        
        // Verifica si la solicitud es de tipo POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Verifica si se han enviado los datos necesarios para la reserva
            if (isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['mesa'])) {
                
                // Obtiene los datos de la reserva del formulario
                $fecha = $_POST['fecha'];
                $hora = $_POST['hora'];
                $mesa =  $_POST['mesa'];
                $descripcion = $_POST['texto'];
                $idCliente = $_SESSION["idCliente"];

                // Verifica la disponibilidad de la mesa para la fecha y hora seleccionadas
                $respuesta = comprobarDisponibilidad($fecha, $hora, $mesa);

                // Si hay disponibilidad, se realiza la reserva
                if ($respuesta === "Queda disponibilidad") {
                    insertarReserva($fecha, $hora, $mesa, $descripcion, $idCliente);
                } else {
                    // Si no hay disponibilidad, se muestra un mensaje de aviso
                    $_SESSION["avisoReserva"] = $respuesta;
                }
            }
        }

        // Se define la ruta del archivo de vista para la página de nueva reserva
        $data['nuevaReserva'] = '../VISTA/vistaNuevaReserva.php';

        // Se incluye el archivo de diseño/layout para la página de nueva reserva
        include '../VISTA/LAYOUT/layoutNuevaReserva.php';
    } else {
        // Si el rol de sesión no es "cliente", se redirige al inicio
        header("Location: ../index.php");
        exit; // Finaliza la ejecución del script
    }
?>
