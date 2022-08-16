<?php
require_once 'includes/header.php';
?>
<?php require_once 'includes/sidebar.php';
?>


<div id='principal'>
    <h1>Crear Entradas</h1>
    <p>
        Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutas de nuestro contenido.
    </p>
    <br />
    <form action='guardar-entrada.php' method='POST'>
        <label for='titulo'>Titulo: </label>
        <input type='text' name='titulo' required />
        <label for='descripcion'>Descripción: </label>
        <textarea name='descripcion' required></textarea>
        <label for='categoria'>Categoria: </label>
        <select name='categoria'>
            <?php
$categorias = conseguirCategorias( $db );
if ( !empty( $categorias ) ):
while( $categoria = mysqli_fetch_assoc( $categorias ) ):
?>
            <option value="<?=$categoria['id']?>">
                <?= $categoria[ 'nombre' ]?>
            </option>
            <?php
endwhile;
endif;
?>
        </select>
        <input type='submit' value='Guardar' />
    </form>
</div>

<!-- FOOTER -->
<?php
require_once 'includes/footer.php';
?>