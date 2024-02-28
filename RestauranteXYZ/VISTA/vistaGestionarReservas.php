<div class="container">
    <h2>Reservas Activas</h2>
    <?php if ($reservas): ?> <!-- Verifica si hay reservas -->
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Mesa</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservas as $reserva): ?> <!-- Itera sobre cada reserva -->
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
                                <button type="submit" name="cancelar" class="btn btn-danger">Cancelar</button> <!-- Botón para cancelar la reserva -->
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php 
            if (isset($_SESSION["avisoReservas"])) { // Verifica si hay un aviso de reservas
                echo " <p><class=\"aviso\">$_SESSION[avisoReservas]</p>"; // Muestra el aviso
            }
        ?>
    <?php 
        else:
            echo "<p>No hay reservas activas por el momento. </br>"; // Mensaje si no hay reservas activas
            echo "<a href=\"controladorNuevaReserva.php\">Haga su reserva aquí</a>"; // Enlace para hacer una nueva reserva
        endif; 
    ?>
</div>
