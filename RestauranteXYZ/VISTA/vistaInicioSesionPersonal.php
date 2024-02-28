<div class="container">
    <div class="form-container">
        <h2>Inicio de Sesión</h2> <!-- Encabezado para el formulario de inicio de sesión -->
        <form action="" method="post"> <!-- Formulario para iniciar sesión -->
            <label for="username">Usuario:</label> <!-- Etiqueta para el campo de usuario -->
            <input type="text" id="usuario" name="usuario" required> <!-- Campo de entrada para el usuario -->
            <br>
            <label for="password">Contraseña:</label> <!-- Etiqueta para el campo de contraseña -->
            <input type="password" id="password" name="password" required> <!-- Campo de entrada para la contraseña -->
            <br>
            <button type="submit" class="btn btn-dark">Inicio Sesion</button> <!-- Botón para enviar el formulario de inicio de sesión -->
        </form>
        <?php 
            if (isset($_SESSION["avisoInicioPersonal"])) { // Verifica si hay un aviso de inicio de sesión personal
                echo " <p><class=\"aviso\">$_SESSION[avisoInicioPersonal]</p>\n"; // Muestra el aviso de inicio de sesión personal
            }
        ?>
        
    </div>
</div>
