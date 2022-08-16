<aside id='sidebar'>

    <!-- NOMBRE DE USUARIO y CERRAR SESION-->
    <?php if ( isset( $_SESSION[ 'usuario' ] ) ): ?>
    <div id='usuario-logueado' class='bloque'>
        <?php echo
'<h3>Bienvenido, '.$_SESSION[ 'usuario' ][ 'nombre' ].' '.$_SESSION[ 'usuario' ][ 'apellidos' ].
'</h3>'?>
        <a href='crear-entrada.php' class='boton boton-verde'>Crear Entradas</a>
        <a href='cerrar.php' class='boton boton-rojo'>Cerrar Sesión</a>
    </div>
    <?php endif;
?>

    <?php 
    if(!isset($_SESSION['usuario'])):
    ?>
    <!-- LOGIN DE USUARIO -->
    <div id='login' class='bloque'>
        <h3>Identificate</h3>
        <?php if ( isset( $_SESSION[ 'error_login' ] ) ) {
    echo '<div class="alerta alerta-error">'.$_SESSION[ 'error_login' ].'</div>';
}
?>
        <form action='login.php' method='POST'>
            <label for='email'>Email:</label>
            <input type='email' name='email' required />
            <label for='password'>Contraseña:</label>
            <input type='password' name='password' required />
            <input type='submit' value='Entrar' name='submit' />
        </form>
    </div>

    <!-- REGISTRO DE USUARIO -->
    <div id='register' class='bloque'>
        <h3>Registrate</h3>
        <?php if ( isset( $_SESSION[ 'errores' ] ) ) {
    foreach ( $_SESSION[ 'errores' ] as $error ) {
        echo '<div class="alerta alerta-error">'.$error.'</div>';
    }
}
?>
        <?php if ( isset( $_SESSION[ 'completado' ] ) ) {
    echo '<div class="alerta">'.$_SESSION[ 'completado' ].'</div>';
}
?>
        <form action='registro.php' method='POST'>
            <label for='nombre'>Nombre:</label>
            <input type='text' name='nombre' required />
            <label for='apellido'>Apellido:</label>
            <input type='text' name='apellido' required />
            <label for='email'>Email:</label>
            <input type='email' name='email' required />
            <label for='password'>Contraseña:</label>
            <input type='password' name='password' minlength='8' maxlength='50' required />
            <input type='submit' value='Registrar' name='submit' />
        </form>
    </div>
    <?php
    endif;
    ?>
</aside>

<?php borrarErrores();
?>