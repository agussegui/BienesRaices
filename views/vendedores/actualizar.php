<main class="contenedor seccion">
    <h1>Actualizar Vendedor/a</h1>
    
    <a href="/admin" class="boton boton-verde">Volver</a>
    
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error?> 
        </div>
    <?php  endforeach;?>

    <form class="formulario" method="POST"> 
        <?php include 'formulario.php'?>
        <!-- lo que se hace con vendedor es concatenar nombre y apellido-->
        <input type="submit" value="Actualizar Vendedor" class="boton boton-verde">
    </form>
</main>
