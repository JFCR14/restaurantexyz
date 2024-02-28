<div class="container">
    <div class="form-container">
        <h2>Inicio de Sesión</h2> <!-- Encabezado para el formulario de inicio de sesión -->
        <form action="" method="post"> <!-- Formulario para iniciar sesión -->
            <label for="username">Correo:</label> <!-- Etiqueta para el campo de correo -->
            <input type="text" id="correo" name="correo" required> <!-- Campo de entrada para el correo -->
            <br>
            <label for="password">Contraseña:</label> <!-- Etiqueta para el campo de contraseña -->
            <input type="password" id="password" name="password" required> <!-- Campo de entrada para la contraseña -->
            <br>
            <button type="submit" class="btn btn-dark">Inicio Sesion</button> <!-- Botón para enviar el formulario de inicio de sesión -->
        </form>
        <p>¿No tienes cuenta? <a href="../CONTROLADOR/controladorRegistro.php">Registrate</a></p> <!-- Enlace para redirigir al usuario a la página de registro -->
        <?php 
            if (isset($_SESSION["avisoInicio"])) { // Verifica si hay un aviso de inicio de sesión
                echo " <p><class=\"aviso\">$_SESSION[avisoInicio]</p>\n"; // Muestra el aviso de inicio de sesión
            }
        ?>
    </div>
</div>
