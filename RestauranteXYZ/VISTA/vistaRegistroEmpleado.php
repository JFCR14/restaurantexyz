<div class="container">
    <div class="form-container">
        <h2>Añadir Nuevo Usuario</h2> <!-- Título del formulario para añadir un nuevo usuario -->

        <form action="../CONTROLADOR/controladorRegistroEmpleado.php" method="post"> <!-- Formulario para enviar los datos del nuevo usuario al controlador de registro de empleados -->
            <label for="usuario">Usuario:</label> <!-- Etiqueta para el campo de usuario -->
            <input type="text" id="usuario" name="usuario" required> <!-- Campo de entrada para el nombre de usuario -->

            <br>

            <label for="password">Contraseña:</label> <!-- Etiqueta para el campo de contraseña -->
            <input type="password" id="password" name="password" required> <!-- Campo de entrada para la contraseña -->

            <br>

            <button type="submit" class="btn btn-dark">Añadir Usuario</button> <!-- Botón para enviar el formulario y añadir el nuevo usuario -->

        </form>
        
    </div>
</div>
