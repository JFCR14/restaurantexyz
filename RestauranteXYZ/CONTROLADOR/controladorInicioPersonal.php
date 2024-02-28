<?php
    // Establece el nombre de la sesión como "restaurante"
    session_name("restaurante");

    // Inicia la sesión si no está iniciada
    session_start();

    // Incluye el archivo modelo.php que contiene las funciones relacionadas con la base de datos
    include '../MODELO/modelo.php';

    // Se inicializa una variable de sesión para los avisos relacionados con el inicio de sesión del personal
    $_SESSION["avisoInicioPersonal"] = "";

    // Se crea un array para almacenar datos
    $data = array();

    // Verifica si la solicitud es de tipo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Obtiene los datos de inicio de sesión enviados a través del formulario
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        // Verifica si el empleado es válido mediante la función verificarEmpleado del modelo
        if(verificarEmpleado($usuario, $password)){
            // Consulta los datos del empleado
            $usuario = consultarEmpleado($usuario, $password);
            
            // Verifica si la contraseña proporcionada coincide con la almacenada en la base de datos
            if($usuario["contraseña"] == $password){
                // Si la contraseña coincide, se establece la sesión para el empleado y se redirige a la página de inicio de sesión del empleado
                $_SESSION['usuario'] = $usuario['usuario'];
                $_SESSION["rol"] = "Empleado";
                $_SESSION["idEmpleado"] = $usuario["id_empleado"];

                header("Location: controladorSesionIniciadaEmpleado.php");
                exit(); // Finaliza la ejecución del script
            }    
        } else {
            // Si el empleado no es válido, se muestra un mensaje de aviso
            $_SESSION["avisoInicioPersonal"] = "Este empleado no existe";
        }
    }

    // Se define la ruta del archivo de vista para la página de inicio de sesión del personal
    $data['inicioEmpleados'] = '../VISTA/vistaInicioSesionPersonal.php';

    // Se incluye el archivo de diseño/layout para la página de inicio de sesión del personal
    include '../VISTA/LAYOUT/layoutInicioPersonal.php';
?>
