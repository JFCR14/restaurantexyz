<?php
// Se incluye el archivo de configuración que contiene los datos de conexión a la base de datos
include 'config.php';

// Función para establecer una conexión a la base de datos utilizando PDO
function crear_conexion()
{
   // Se utiliza la función new PDO para crear un objeto de conexión PDO
   // Se concatenan los datos de configuración obtenidos del archivo config.php para formar la cadena de conexión
   return new PDO("mysql:host=". DB_HOST .";dbname=".DB_NAME,DB_USER ,DB_PASSWORD);
}

// Función para ejecutar consultas SQL en la base de datos
function consultaBD($consulta, $conexion) {
   // Se ejecuta la consulta utilizando el método query() del objeto de conexión
   return $conexion->query($consulta);
}

// Función para obtener los resultados de una consulta SQL
function obtener_resultados($resultado)
{
    // Se utiliza el método fetch() del objeto resultado para obtener una fila de resultados
    // Se especifica PDO::FETCH_ASSOC para obtener un array asociativo
    return $resultado->fetch(PDO::FETCH_ASSOC);
}
?>
