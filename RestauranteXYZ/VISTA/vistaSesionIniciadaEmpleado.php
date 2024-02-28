<div class="container">
    <h1>Bienvenido <?php echo $data['usuario'];?></h1> <!-- Mensaje de bienvenida que muestra el nombre de usuario -->
    
    <p>Selecciona una opción:</p> <!-- Mensaje que indica al usuario que seleccione una opción -->

    <!-- Enlaces a las diferentes opciones disponibles para el usuario -->
    <a href="../CONTROLADOR/controladorRegistroEmpleado.php"><button type="submit" class="btn btn-dark">Añadir Nuevo Usuario</button></a> <!-- Botón para añadir un nuevo usuario -->
    <a href="../CONTROLADOR/controladorVisualizarReservas.php"><button type="submit" class="btn btn-dark">Visualizar Reservas</button></a> <!-- Botón para visualizar las reservas -->
</div>
