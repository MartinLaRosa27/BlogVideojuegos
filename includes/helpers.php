<?php

function borrarErrores() {
    if ( isset( $_SESSION[ 'errores' ] ) ) {
        $_SESSION[ 'errores' ] = null;
        unset( $_SESSION[ 'errores' ] );
    }
    if ( isset( $_SESSION[ 'completado' ] ) ) {
        $_SESSION[ 'completado' ] = null;
        unset( $_SESSION[ 'completado' ] );
    }
}

function conseguirCategorias( $conexion ) {
    $sql = 'SELECT * FROM categorias ORDER BY id ASC;';
    $categorias = mysqli_query( $conexion, $sql );
    $resultado = array();
    if ( $categorias && mysqli_num_rows( $categorias ) >= 1 ) {
        $resultado = $categorias;
    }
    return $resultado;
}

function conseguirEntradas( $conexion ) {
    $sql = 'SELECT e.*, c.nombre AS "categoria" FROM entradas as e INNER JOIN categorias AS c ON c.id = e.categoria_id ORDER BY e.fecha ASC';
    $entradas = mysqli_query( $conexion, $sql );
    $resultado = array();
    if ( $entradas && mysqli_num_rows( $entradas ) >= 1 ) {
        $resultado = $entradas;
    }
    return $resultado;
}