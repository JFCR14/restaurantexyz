<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../VISTA/LAYOUT/layout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Visualizar Reservas</title>
</head>
<body>
<header class="header">
        <h2><a href="../CONTROLADOR/controladorSesionIniciadaEmpleado.php" class=title>Restaurante XYZ--AREA PERSONAL</a></h2>
        <nav>
            <ul>
                <li><a href="../CONTROLADOR/controladorSesionIniciadaEmpleado.php">Inicio</a></li>
                <li><a href="../CONTROLADOR/controladorRegistroEmpleado.php">Nuevo Empleado</a></li>
                <li><a href="../CONTROLADOR/controladorVisualizarReservas.php">Ver Reservas</a></li>
                <li><a href="../CONTROLADOR/controladorCerrarSesion.php">Cerrar Sesion</a></li>
            </ul>
    </header>
    <?php include $data['gestionarReservas']; ?>
    <footer class="footer">
        <p>&copy;
            <?php echo date('Y'); ?> Restaurante XYZ | Todos los derechos reservados
        </p>
    </footer>
    
</body>
</html>