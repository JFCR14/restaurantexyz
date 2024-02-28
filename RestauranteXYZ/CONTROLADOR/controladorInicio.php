<?php
    // Establece el nombre de la sesión como "restaurante"
    session_name("restaurante");

    // Inicia la sesión si no está iniciada
    session_start();

    // Incluye el archivo modelo.php que contiene las funciones relacionadas con la base de datos
    include '../MODELO/modelo.php';

    // Se inicializa una variable de sesión para los avisos relacionados con el inicio de sesión
    $_SESSION["avisoInicio"] = "";

    // Se crea un array para almacenar datos
    $data = array();

    // Verifica si la solicitud es de tipo POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Obtiene los datos de inicio de sesión enviados a través del formulario
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        // Verifica si el usuario es válido mediante la función verificarCliente del modelo
        if(verificarCliente($correo, $password)){
            // Consulta los datos del cliente
            $usuario = consultarCliente($correo, $password);
            
            // Verifica si la contraseña proporcionada coincide con la almacenada en la base de datos
            if($usuario["contraseña"] == $password){
                // Si la contraseña coincide, se establece la sesión para el usuario y se redirige a la página de inicio de sesión del cliente
                $_SESSION['usuario'] = $correo;
                $_SESSION["rol"] = "cliente";
                $_SESSION["idCliente"] = $usuario["id_cliente"];

                header("Location: controladorSesionIniciadaCliente.php");
                exit(); // Finaliza la ejecución del script
            }    
        } else {
            // Si el usuario no es válido, se muestra un mensaje de aviso
            $_SESSION["avisoInicio"] = "Ese usuario no existe.";
        }
    }

    // Se define la ruta del archivo de vista para la página de inicio de sesión del cliente
    $data['inicio'] = '../VISTA/vistaInicioCliente.php';

    // Se incluye el archivo de diseño/layout para la página de inicio de sesión del cliente
    include '../VISTA/LAYOUT/layoutInicioCliente.php';
?>
