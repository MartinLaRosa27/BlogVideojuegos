<?php require_once 'conexion.php';
?>
<?php require_once 'helpers.php';
?>

<!DOCTYPE html>
<html lang='es'>

<head>
    <meta charset='UTF-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link rel='stylesheet' type='text/css' href='./assets/css/style.css' />
    <title>Blog de Videojuegos</title>
</head>

<body>
    <!-- HEADER -->
    <header id='cabecera'>

        <!-- LOGO -->
        <div id='logo'>
            <a href='index.php'>Blog de Videojuegos</a>
        </div>

        <!-- MENU -->
        <nav id='menu'>
            <ul>
                <li><a href='index.php'>Inicio</a></li>

                <?php
$categorias = conseguirCategorias( $db );
if ( !empty( $categorias ) ) {
    while( $categoria = mysqli_fetch_assoc( $categorias ) ) {
        echo "<li>".$categoria[ 'nombre' ]."</li>";
    }
}
?>
                <li><a href='index.php'>Sobre mí</a></li>
                <li><a href='index.php'>Contacto</a></li>
            </ul>
        </nav>

    </header>

    <div id='contenedor'>