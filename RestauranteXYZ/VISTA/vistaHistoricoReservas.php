<div class="container">
    <h2>Historico Reservas</h2> <!-- Encabezado para el historial de reservas -->
    <?php if ($reservas): ?> <!-- Verifica si hay reservas en el historial -->
        <table class="table"> <!-- Inicia una tabla para mostrar las reservas -->
            <thead>
                <tr>
                    <th>Fecha</th> <!-- Encabezado de la columna de fecha -->
                    <th>Hora</th> <!-- Encabezado de la columna de hora -->
                    <th>Mesa</th> <!-- Encabezado de la columna de mesa -->
                    <th>Descripción</th> <!-- Encabezado de la columna de descripción -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?> <!-- Itera sobre cada reserva en el historial -->
                    <tr>
                        <td><?php echo $reserva['fecha']; ?></td> <!-- Muestra la fecha de la reserva -->
                        <td><?php echo $reserva['hora']; ?></td> <!-- Muestra la hora de la reserva -->
                        <td><?php echo $reserva['mesa']; ?></td> <!-- Muestra la mesa de la reserva -->
                        <td><?php echo $reserva['descripcion']; ?></td> <!-- Muestra la descripción de la reserva -->
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_cliente" value="<?php echo $reserva['id_cliente']; ?>"> <!-- Campo oculto con el ID del cliente -->
                                <input type="hidden" name="fecha" value="<?php echo $reserva['fecha']; ?>"> <!-- Campo oculto con la fecha de la reserva -->
                                <input type="hidden" name="hora" value="<?php echo $reserva['hora']; ?>"> <!-- Campo oculto con la hora de la reserva -->
                                <input type="hidden" name="mesa" value="<?php echo $reserva['mesa']; ?>"> <!-- Campo oculto con la mesa de la reserva -->
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php 
        else:
            echo "<p>No has hecho ninguna reserva anteriormente </br>"; // Mensaje si no hay reservas en el historial
        endif; 
    ?>
</div>
