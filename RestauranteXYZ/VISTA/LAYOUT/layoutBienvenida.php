<?php
    session_name("restaurante");
    session_start();
    session_destroy(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante XYZ</title>
    <link rel="stylesheet" href="VISTA/LAYOUT/layout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <h2><a href="index.php" class=title>Restaurante XYZ</a></h2>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="">Reservas</a></li>
                <li><a href="">Menu</a></li>
                <li><a href="">Contacto</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Bienvenido a Restaurante XYZ</h1>
        <p>Por favor, selecciona tu rol:</p>
        <a href="CONTROLADOR/controladorRegistro.php" class="btn btn-dark">Cliente</a>
        <a href="CONTROLADOR/controladorInicioPersonal.php" class="btn btn-dark">Empleado</a>
    </div>

    <footer class="footer">
        <p>&copy;
            <?php echo date('Y'); ?> Restaurante XYZ | Todos los derechos reservados
        </p>
    </footer>

</body>

</html>
