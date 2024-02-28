<div class="form-container">
    <h2>Realizar Nuevas Reservas</h2> <!-- Título del formulario para realizar nuevas reservas -->

    <form action="" method="post"> <!-- Formulario para enviar la reserva -->
        <div class="form-group">
            <label for="fecha">Fecha:</label> <!-- Etiqueta para seleccionar la fecha -->
            <input type="date" id="fecha" name="fecha" required> <!-- Campo de entrada para la fecha -->
        </div>

        <div class="form-group">
            <label for="hora">Horas:</label> <!-- Etiqueta para seleccionar la hora -->
            <select name="hora" id="hora"> <!-- Menú desplegable para seleccionar la hora -->
                <option>20:30</option>
                <option>21:00</option>
                <option>21:30</option>
                <option>22:00</option>
                <option>22:30</option>
                <option>23:00</option>
            </select>
        </div>

        <div class="form-group">
            <label for="mesa">Mesa:</label> <!-- Etiqueta para seleccionar la mesa -->
            <select name="mesa" id="mesa"> <!-- Menú desplegable para seleccionar la mesa -->
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <div class="form-group">
            <label for="texto">Descripción (Opcional):</label> <!-- Etiqueta para ingresar una descripción opcional -->
            <textarea name="texto" id="texto" rows="4" cols="45" placeholder="Añade una descripción"></textarea> <!-- Campo de entrada para la descripción -->
        </div>

        <button type="submit" class="btn btn-dark">Reservar</button> <!-- Botón para enviar la reserva -->
        <?php 
        if (isset($_SESSION["avisoReserva"])) { // Verifica si hay un aviso de reserva
            echo " <p><class=\"aviso\">$_SESSION[avisoReserva]</p>\n"; // Muestra el aviso de reserva
        }
    ?>
    </form>
</div>
