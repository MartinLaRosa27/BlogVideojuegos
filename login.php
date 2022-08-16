<?php
if ( isset( $_POST ) ) {
    // INICIAR LA SESIÓN Y CONEXIÓN:
    require_once 'conexion.php';
        
    // BORRAR ERROR ANTIGUO:
    if ( isset( $_SESSION[ 'error_login' ] ) ) {
        unset( $_SESSION[ 'error_login' ] );
    }

    // RECOGER DATOS FORM:
    $email = trim( $_POST['email']
    );
    $password = $_POST[ 'password' ];

    // CONSULTA A BD:
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $login = mysqli_query( $db, $sql );

    if ( $login && mysqli_num_rows( $login ) == 1 ) {
        // ARRAY CON LOS DATOS DEL USUARIO:
        $usuario = mysqli_fetch_assoc( $login );
        // COMPROBAR CONTRASEÑA:
        $verify = password_verify( $password, $usuario[ 'password' ] );
        if ( $verify ) {
            // SESSION PARA GUARDAR LOS DATOS DEL USUARIO LOGIADO:
            $_SESSION[ 'usuario' ] = $usuario;
        } else {
            // SESSION CON EL FALLO SI ES NECESARIO:
            $_SESSION[ 'error_login' ] = 'Login Incorrecto!';
        }
    } else {
        // SESSION CON EL FALLO SI ES NECESARIO:
        $_SESSION[ 'error_login' ] = 'Login Incorrecto!';
    }
}

// REDIRIGIR:
header( 'Location: index.php' );