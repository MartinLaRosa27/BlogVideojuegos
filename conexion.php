<?php
// Conexion a la base de datos:
$server = '';
$username = '';
$password = '';
$database = 'phpmysql';
$db = mysqli_connect( $server, $username, $password, $database );

// Codificacion de caracteres:
mysqli_query( $db, "SET NAMES 'utf8';" );

// Iniciar la session:
session_start();