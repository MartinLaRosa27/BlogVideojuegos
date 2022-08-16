<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';
    $titulo = isset( $_POST[ 'titulo' ] ) ? $_POST[ 'titulo' ] : false;
    $descripcion = isset( $_POST[ 'descripcion' ] ) ? $_POST[ 'descripcion' ] : false;
    $categoria = isset( $_POST[ 'categoria' ] ) ? ( int )$_POST[ 'categoria' ] : false;
    $usuario = $_SESSION[ 'usuario' ][ 'id' ];

    $errores = array();
    if ( empty( $titulo ) ) {
        $errores[ 'titulo' ] = 'El titulo no es válido';
    }
    if ( empty( $descripcion ) ) {
        $errores[ 'descripcion' ] = 'La descripción no es válida.';
    }
    if ( empty( $categoria ) && !is_numeric( $categoria ) ) {
        $errores[ 'categoria' ] = 'Error en la categoria.';
    }

    if ( count( $errores ) == 0 ) {
        $sql = "INSERT INTO entradas(usuario_id, categoria_id, titulo, descripcion, fecha) VALUES($usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
        try {
            $guardar = mysqli_query( $db, $sql );
        } catch( Exception $e ) {
            echo e;
        }
    } else {
        $_SESSION[ 'errores_entrada' ] = $errores;
    }
}

header( 'Location: index.php' );