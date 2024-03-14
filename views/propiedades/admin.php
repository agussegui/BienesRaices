
<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php 
        $mensaje = mostrarNotificacion( intval( $resultado) );
        if($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje); ?></p>
        <?php } 
    ?>


    <h2>Propiedades</h2>
    <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
    <a href="/vendedores/crear" class="boton boton-verde">Nuevo Vendedor</a>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los Resultados -->
            <?php foreach( $propiedades as $propiedad ): ?>
            <tr>
                <td><?php echo $propiedad->id; ?></td>
                <td><?php echo $propiedad->titulo; ?></td>
                <td> <img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla"> </td>
                <td>$ <?php echo $propiedad->precio; ?></td>
                <td>
                    <form method="POST" action="propiedades/eliminar" class="w-100w-100 form-box">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="input-box boton-rojo-block" value="Eliminar">
                    </form>
                    <div class="box-input">
                        <a href="propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class=" input-box boton-amarillo-block">Actualizar</a>
                    </div>    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <h2>Vendedores</h2>
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los Resultados -->
            <?php foreach( $vendedores as $vendedor ): ?>
            <tr>
                <td><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <form method="POST" action="vendedor/eliminar" class="w-100 form-box ">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block input-box" value="Eliminar">
                    </form>
                    <div class="box-input">
                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class=" input-box boton-amarillo-block">Actualizar</a>
                    </div>    
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>

