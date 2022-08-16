<?php require_once 'includes/header.php';
?>

<!-- BARRA LATERAL -->
<?php require_once 'includes/sidebar.php';
?>

<!-- CAJA PRINCIPAL -->
<div id='principal'>
    <h1>Ultimas entradas</h1>
    <article class='entrada'>
        <!-- ENTRADAS: -->
        <?php
$entradas = conseguirEntradas( $db );
if ( !empty( $entradas ) ) {
    while( $entrada = mysqli_fetch_assoc( $entradas ) ) {
        echo '<h2>'.$entrada[ 'titulo' ].'</h2>';
        echo "<span class='fecha'>".$entrada[ 'categoria' ].' | '.$entrada[ 'fecha' ].'</span>';
        echo '<p>'.substr( $entrada[ 'descripcion' ], 0, 100 );
        if ( strlen( $entrada[ 'descripcion' ] )>100 ) {
            echo '...</p>';
        } else {
            echo '</p>';
        }
    }
}
?>
    </article>
    <div id='ver-todas'>
        <a href=''> Ver todas las entradas</a>
    </div>
</div>

<!-- FOOTER -->
<?php require_once 'includes/footer.php';
?>