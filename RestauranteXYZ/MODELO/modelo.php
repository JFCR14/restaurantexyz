<?php
// Se incluye el archivo bbdd.php que contiene funciones de acceso a la base de datos
include('bbdd.php');

// Función para verificar si un cliente existe en la base de datos
function verificarCliente($correo, $contraseña)
{
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();

    // Se crea una consulta SQL para buscar un cliente por correo y contraseña
    $consulta = "SELECT * FROM clientes WHERE correo = '$correo' AND contraseña = '$contraseña'";
    
    // Se ejecuta la consulta y se obtiene el resultado
    $resultado = consultaBD($consulta, $conexion);

    // Si se encuentra al menos un resultado, se retorna verdadero, de lo contrario, falso
    if ($resultado->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

// Función para verificar si un empleado existe en la base de datos
function verificarEmpleado($usuario, $contraseña)
{
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();

    // Se crea una consulta SQL parametrizada para buscar un empleado por usuario y contraseña
    $consulta = "SELECT * FROM empleados WHERE usuario = ? AND contraseña = ?";
    
    // Se prepara la consulta
    $stmt = $conexion->prepare($consulta);
    
    // Se vinculan los parámetros a la consulta
    $stmt->bindParam(1, $usuario);
    $stmt->bindParam(2, $contraseña);
    
    // Se ejecuta la consulta
    $stmt->execute();
    
    // Si se encuentra al menos un resultado, se retorna verdadero, de lo contrario, falso
    if ($stmt->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

// Función para registrar un nuevo cliente en la base de datos
function registrarCliente($correo, $contraseña)
{
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();

    // Se prepara la consulta SQL para insertar un nuevo cliente
    $insert = "INSERT INTO clientes (correo, contraseña) VALUES (?, ?)";
    $consulta = $conexion->prepare($insert);

    // Se vinculan los parámetros a la consulta
    $consulta->bindParam(1, $correo); 
    $consulta->bindParam(2, $contraseña); 

    // Se ejecuta la consulta y se retorna verdadero si se realiza con éxito, de lo contrario, falso
    if(!$consulta->execute()){
        return false;
    }
}

// Función para consultar un cliente por correo y contraseña
function consultarCliente($correo, $contraseña)
{
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();

    // Se crea una consulta SQL para buscar un cliente por correo y contraseña
    $consulta = "SELECT * FROM clientes WHERE correo = '$correo' AND contraseña = '$contraseña'";
    
    // Se ejecuta la consulta y se obtiene el resultado
    $resultado = consultaBD($consulta, $conexion);
    
    // Se inicializa un array para almacenar la información del cliente
    $usuario = array();
    
    // Se recorren los resultados y se asignan al array
    while ($fila = obtener_resultados($resultado)) { 
        $usuario = $fila;
    }
    
    // Se retorna la información del cliente
    return $usuario;
}

// Función para consultar un empleado por usuario y contraseña
function consultarEmpleado($usuario, $contraseña)
{
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();

    // Se crea una consulta SQL parametrizada para buscar un empleado por usuario y contraseña
    $consulta = "SELECT * FROM empleados WHERE usuario = ? AND contraseña = ?";
    
    // Se prepara la consulta
    $stmt = $conexion->prepare($consulta);
    
    // Se vinculan los parámetros a la consulta
    $stmt->bindParam(1, $usuario);
    $stmt->bindParam(2, $contraseña);
    
    // Se ejecuta la consulta y se obtiene el resultado
    $stmt->execute();
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Se retorna la información del empleado
    return $empleado;
}

// Función para comprobar la disponibilidad de una reserva
function comprobarDisponibilidad($fecha, $hora, $mesa){
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();
    
    // Se crea una consulta SQL para verificar la disponibilidad de una reserva en una fecha y hora específicas
    $consulta = "SELECT * FROM reservas where fecha = '$fecha' AND hora = '$hora'";
    
    // Se ejecuta la consulta y se obtiene el resultado
    $resultado = consultaBD($consulta,$conexion);

    // Si hay más de 5 reservas para la misma fecha y hora, se retorna un mensaje de error
    if ($resultado->rowCount() > 5) {
       return "Lo sentimos, no queda hueco para esa fecha.";
    } else {
        // Si la mesa está reservada para la misma fecha y hora, se retorna un mensaje de error
        $consultaMesa = "SELECT * FROM reservas where fecha = '$fecha' AND hora = '$hora' AND mesa= '$mesa'";
        $resultadoMesa = consultaBD($consultaMesa,$conexion);
        if ($resultadoMesa->rowCount() >= 1 ) {
            return "Lo sentimos, esa mesa ya está reservada para esa hora, disculpen las molestias.";
        }else{
            // Si la mesa está disponible, se retorna un mensaje de disponibilidad
            return "Queda disponibilidad";
        }
    }
}

// Función para insertar una reserva en la base de datos
function insertarReserva($fecha, $hora, $mesa, $descripcion, $idCliente){
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();
    
    // Se prepara la consulta SQL para insertar una nueva reserva
    $insert = "INSERT INTO reservas (fecha, hora, mesa, descripcion, id_cliente) VALUES (?, ?, ?, ?, ?)";
    $consulta = $conexion->prepare($insert);

    // Se vinculan los parámetros a la consulta
    $consulta->bindParam(1, $fecha); 
    $consulta->bindParam(2, $hora);
    $consulta->bindParam(3, $mesa);
    $consulta->bindParam(4, $descripcion);
    $consulta->bindParam(5, $idCliente);

    // Se ejecuta la consulta y se retorna un mensaje de éxito si se realiza con éxito
    if($consulta->execute()){
        return "Se ha realizado la reserva. Gracias, les esperamos.";
    }
}

// Función para borrar una reserva de la base de datos
function borrarReserva($fecha, $hora, $mesa)
{
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();
    
    // Se prepara la consulta SQL para borrar una reserva
    $consulta = "DELETE FROM reservas WHERE fecha = ? AND hora = ? AND mesa = ?";
    $stmt = $conexion->prepare($consulta);
    
    // Se vinculan los parámetros a la consulta
    $stmt->bindParam(1, $fecha);
    $stmt->bindParam(2, $hora);
    $stmt->bindParam(3, $mesa);
    
    // Se ejecuta la consulta y se retorna verdadero si se realiza con éxito, de lo contrario, falso
    if ($stmt->execute()) {
        return true; 
    } else {
        return false; 
    }
}

// Función para obtener las reservas futuras de un cliente
function obtenerReservasDelCliente($idCliente)
{
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();
    
    // Se obtiene la fecha actual
    $fechaActual = date("Y-m-d");
    
    // Se prepara la consulta SQL para obtener las reservas futuras de un cliente
    $consulta = "SELECT * FROM reservas WHERE id_cliente = ? AND fecha >= ?";
    $stmt = $conexion->prepare($consulta);
    
    // Se vinculan los parámetros a la consulta
    $stmt->bindParam(1, $idCliente);
    $stmt->bindParam(2, $fechaActual);
    
    // Se ejecuta la consulta y se obtienen los resultados
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Se retorna el resultado
    return $reservas;
}

// Función para obtener las reservas pasadas de un cliente
function obtenerReservasPasadasDelCliente($idCliente)
{
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();
    
    // Se obtiene la fecha actual
    $fechaActual = date("Y-m-d");
    
    // Se prepara la consulta SQL para obtener las reservas pasadas de un cliente
    $consulta = "SELECT * FROM reservas WHERE id_cliente = ? AND fecha < ?";
    $stmt = $conexion->prepare($consulta);
    
    // Se vinculan los parámetros a la consulta
    $stmt->bindParam(1, $idCliente);
    $stmt->bindParam(2, $fechaActual);
    
    // Se ejecuta la consulta y se obtienen los resultados
    $stmt->execute();
    $reservas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Se retorna el resultado
    return $reservas;
}

// Función para obtener las reservas de una fecha específica
function obtenerReservasPorFecha($fechaSeleccionada) {
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();
    
    // Se prepara la consulta SQL para obtener las reservas de una fecha específica
    $consulta = "SELECT r.*, c.correo AS correo_cliente 
    FROM reservas AS r 
    INNER JOIN clientes AS c ON r.id_cliente = c.id_cliente
    WHERE r.fecha = :fecha";
    
    // Se prepara la consulta
    $stmt = $conexion->prepare($consulta);
    
    // Se vincula el parámetro a la consulta
    $stmt->bindParam(':fecha', $fechaSeleccionada);
    
    // Se ejecuta la consulta y se obtienen los resultados
    $stmt->execute();
    $fechas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Se retorna el resultado
    return $fechas;
}

// Función para obtener todas las reservas
function obtenerTodasLasReservas() {
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();
    
    // Se prepara la consulta SQL para obtener todas las reservas
    $consulta = "SELECT r.*, c.correo AS correo_cliente 
                 FROM reservas AS r 
                 INNER JOIN clientes AS c ON r.id_cliente = c.id_cliente";
    
    // Se ejecuta la consulta y se obtienen los resultados
    $resultado = consultaBD($consulta, $conexion);
    $reservas = array();

    // Se recorren los resultados y se asignan al array de reservas
    while ($fila = obtener_resultados($resultado)) { 
        $reservas[] = $fila;
    }
    
    // Se retorna el resultado
    return $reservas;
}

// Función para registrar un nuevo usuario en la base de datos (puede ser cliente o empleado)
function registrarUsuario($usuario, $contraseña)
{
    // Se establece una conexión a la base de datos
    $conexion = crear_conexion();
    
    // Se prepara la consulta SQL para insertar un nuevo usuario
    $insert = "INSERT INTO empleados (usuario, contraseña) VALUES (?, ?)";
    $consulta = $conexion->prepare($insert);

    // Se vinculan los parámetros a la consulta
    $consulta->bindParam(1, $usuario); 
    $consulta->bindParam(2, $contraseña); 

    // Se ejecuta la consulta y se retorna verdadero si se realiza con éxito, de lo contrario, falso
    if(!$consulta->execute()){
        return false;
    }
}
?>
