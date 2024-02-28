<?php
    // Establece el nombre de la sesión como "restaurante"
    session_name("restaurante");
    
    // Inicia la sesión si no está iniciada
    session_start();
    
    // Destruye la sesión actual, lo que elimina todos los datos asociados con ella
    session_destroy();
    
    // Redirige al usuario a la página de inicio (index.php) utilizando la función header()
    header("Location: ../index.php");
    
    // Finaliza la ejecución del script para asegurar que ninguna otra línea de código se ejecute después de la redirección
    exit;
?>
