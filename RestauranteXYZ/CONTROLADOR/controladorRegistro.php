<?php
    // Establece el nombre de la sesión como "restaurante"
    session_name("restaurante");

    // Inicia la sesión si no está iniciada
    session_start();

    // Incluye el archivo modelo.php que contiene las funciones relacionadas con la base de datos
    include '../MODELO/modelo.php';

    // Se inicializan las variables de sesión para los avisos relacionados con el correo y el registro
    $_SESSION["avisoCorreo"] = "";
    $_SESSION["avisoRegistro"] = "";

    // Función para verificar si el correo electrónico tiene un formato válido
    function verificarCorreo($correo){
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
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
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        // Verifica si el correo ya está registrado como cliente
        if(verificarCliente($correo, $password)){
            $_SESSION["avisoCorreo"] = "El correo ya ha sido registrado anteriormente.";
        }
        else{
            // Si el correo no está registrado, verifica el formato del correo y la contraseña
            if (verificarCorreo($correo) && verificarContraseña($password)){
                // Si el correo y la contraseña tienen formatos válidos, intenta registrar al cliente
                if (registrarCliente($correo,$password)){
                    $_SESSION["avisoRegistro"] = "No se ha podido registrar.";
                }else{
                    // Si el registro es exitoso, redirige al usuario al inicio
                    header('Location: controladorInicio.php');
                    exit; // Finaliza la ejecución del script
                }
            } else {
                // Si el formato del correo o la contraseña no son válidos, muestra un mensaje de aviso correspondiente
                if(!verificarCorreo($correo)){
                    $_SESSION["avisoCorreo"] = "El correo es incorrecto. Ejemplo: alguien@email.es";
                }
                else if(!verificarContraseña($password)){
                    $_SESSION["avisoCorreo"] = "La contraseña no es correcta. Al menos 8 caracteres";
                }
            }
        }
    }
    // Se define la ruta del archivo de vista para la página de registro de cliente
    $data['registro'] = '../VISTA/vistaRegistroCliente.php';

    // Se incluye el archivo de diseño/layout para la página de registro de cliente
    include '../VISTA/LAYOUT/layoutRegistroCliente.php';
?>
