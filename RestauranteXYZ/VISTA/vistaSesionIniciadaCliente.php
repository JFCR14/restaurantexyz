<div class="container">
    <h1>Bienvenido <?php echo $data['correo'];?></h1> <!-- Mensaje de bienvenida que muestra el correo del usuario -->
    
    <p>Selecciona una opcion:</p> <!-- Mensaje que indica al usuario que seleccione una opción -->

    <!-- Enlaces a las diferentes opciones disponibles para el usuario -->
    <a href="../CONTROLADOR/controladorGestionarReservas.php"><button type="submit" class="btn btn-dark">Ver y Gestionar Reservas Activas</button></a> <!-- Botón para ver y gestionar las reservas activas -->

    <a href="../CONTROLADOR/controladorNuevaReserva.php"><button type="submit" class="btn btn-dark">Hacer Nuevas Reservas</button></a> <!-- Botón para hacer nuevas reservas -->

    <a href="../CONTROLADOR/controladorHistoricoReservas.php"><button type="submit" class="btn btn-dark">Ver Historico Reservas</button></a> <!-- Botón para ver el historial de reservas -->
</div>
