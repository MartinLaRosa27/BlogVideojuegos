<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';
    session_start();

    // Recoger los valores:
    $nombre = isset( $_POST[ 'nombre' ] ) ? $_POST[ 'nombre' ] : false;
    $apellido = isset( $_POST[ 'apellido' ] ) ? $_POST[ 'apellido' ] : false;
    $email = isset( $_POST[ 'email' ] ) ? trim( $_POST[ 'email' ] ) : false;
    $password = isset( $_POST[ 'password' ] ) ? $_POST[ 'password' ] : false;

    // Array de errores:
    $errores = array();

    // Validar los datos:
    if ( !empty( $nombre ) && !preg_match( '/[0-9]/', $nombre ) ) {
        $nombre_validado = true;
    } else {
        $errores[ 'nombre' ] = 'El nombre no es válido';
        $nombre_validado = false;
    }
    if ( !empty( $apellido ) && !preg_match( '/[0-9]/', $apellido ) ) {
        $apellido_validado = true;
    } else {
        $errores[ 'apellido' ] = 'El apellido no es válido';
        $apellido_validado = false;
    }
    if ( !empty( $email ) ) {
        $email_validado = true;
    } else {
        $errores[ 'email' ] = 'El email no es válido';
        $email_validado = false;
    }
    if ( !empty( $password ) && strlen( $password ) >= 8 ) {
        $password_validado = true;
    } else {
        $errores[ 'password' ] = 'El password no es válido';
        $password_validado = false;
    }

    // INSERTAR USUARIO EN BD:
    if ( count( $errores ) == 0 ) {
        $guardar_usuario = true;
        // CIFRAR LA CONTRASEÑA:
        $password_segura = password_hash( $password, PASSWORD_BCRYPT, [ 'cost'=>4 ] );
        // CONSULTA:
        $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, fecha) VALUES ('$nombre', '$apellido', '$email', '$password_segura', CURDATE());";
        try {
            $guardar = mysqli_query( $db, $sql );
        } catch( Exception $e ) {
            echo $e;
        }
        // DESPUES DE REALIZAR LA CONSULTA:
        if ( $guardar ) {
            $_SESSION[ 'completado' ] = 'El registro se ha completado con éxito';
        } else {
            $_SESSION[ 'errores' ][ 'general' ] = 'Fallo al guardar el usuario';
        }
    } else {
        $guardar_usuario = false;
        $_SESSION[ 'errores' ] = $errores;
    }
}

header( 'location: index.php' );