<div class="container">
    <div class="form-container">
        <h2>Registro CLIENTES</h2> <!-- Título del formulario de registro de clientes -->

        <form action="" method="post"> <!-- Formulario de registro -->
            <label for="correo">Correo Electronico:</label> <!-- Etiqueta para el campo de correo electrónico -->
            <input type="email" id="correo" name="correo" required> <!-- Campo de entrada para el correo electrónico -->

            <br>

            <label for="password">Contraseña:</label> <!-- Etiqueta para el campo de contraseña -->
            <input type="password" id="password" name="password" required> <!-- Campo de entrada para la contraseña -->

            <br>

            <button type="submit" class="btn btn-dark">Registrarse</button> <!-- Botón para enviar el formulario de registro -->

        </form>

        <p>¿Ya tienes cuenta? <a href="../CONTROLADOR/controladorInicio.php">Inicia sesión</a></p> <!-- Enlace para iniciar sesión -->

        <?php 
            if (isset($_SESSION["avisoCorreo"])) { // Verifica si hay un aviso relacionado con el correo electrónico
                echo " <p><class=\"aviso\">$_SESSION[avisoCorreo]</p>\n"; // Muestra el aviso relacionado con el correo electrónico
            }
            
            if (isset($_SESSION["avisoRegistro"])) { // Verifica si hay un aviso relacionado con el registro
                echo " <p><class=\"aviso\">$_SESSION[avisoRegistro]</p>\n"; // Muestra el aviso relacionado con el registro
            }
        ?>
    </div>
</div>
