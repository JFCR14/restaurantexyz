<div class="container">
    <h2>Reservas para el día</h2> <!-- Título que indica que se muestran reservas para un día específico -->
    
    <!-- Formulario para filtrar las reservas por fecha -->
    <form action="" method="post">
        <div class="form-group">
            <label for="fecha_seleccionada">Seleccione la fecha:</label> <!-- Etiqueta para seleccionar la fecha -->
            <input type="date" id="fecha_seleccionada" name="fecha_seleccionada"> <!-- Campo para ingresar la fecha -->
        </div>
        <button type="submit" name="filtrar" class="btn btn-dark">Filtrar</button> <!-- Botón para enviar el formulario y filtrar las reservas -->
    </form>
    <br>
    
    <!-- Contenedor de la tabla de reservas -->
    <div class="table-container">
        <?php if ($reservas): ?> <!-- Verificar si hay reservas -->
            <!-- Tabla que muestra las reservas -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Correo del Cliente</th> <!-- Encabezado de la columna para el correo del cliente -->
                        <th>Fecha</th> <!-- Encabezado de la columna para la fecha de la reserva -->
                        <th>Hora</th> <!-- Encabezado de la columna para la hora de la reserva -->
                        <th>Descripción</th> <!-- Encabezado de la columna para la descripción de la reserva -->
                        <th>Acción</th> <!-- Encabezado de la columna para la acción (cancelar reserva) -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservas as $reserva): ?> <!-- Iterar sobre cada reserva -->
                        <tr>
                            <td><?php echo $reserva['correo_cliente']; ?></td> <!-- Mostrar el correo del cliente -->
                            <td><?php echo $reserva['fecha']; ?></td> <!-- Mostrar la fecha de la reserva -->
                            <td><?php echo $reserva['hora']; ?></td> <!-- Mostrar la hora de la reserva -->
                            <td><?php echo $reserva['descripcion']; ?></td> <!-- Mostrar la descripción de la reserva -->
                            <td>
                                <!-- Formulario para cancelar la reserva -->
                                <form action="" method="post">
                                    <!-- Campos ocultos con la información de la reserva -->
                                    <input type="hidden" name="fecha" value="<?php echo $reserva['fecha']; ?>">
                                    <input type="hidden" name="hora" value="<?php echo $reserva['hora']; ?>">
                                    <input type="hidden" name="mesa" value="<?php echo $reserva['mesa']; ?>">
                                    <!-- Botón para cancelar la reserva -->
                                    <button type="submit" name="cancelar" class="btn btn-danger">Cancelar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Mostrar mensaje de aviso si existe -->
            <?php 
                if (isset($_SESSION["avisoReservas"])) {
                    echo "<p class=\"aviso\">$_SESSION[avisoReservas]</p>";
                }
            ?>
        <?php else: ?>
            <p>No hay reservas para esta fecha.</p> <!-- Mensaje si no hay reservas para la fecha seleccionada -->
        <?php endif; ?>
    </div>
</div>
