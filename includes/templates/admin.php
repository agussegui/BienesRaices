<h1>Administrador de Bienes Raices</h1>
    <?php
        if($resultado){
            $mensaje = mostrarNotificacion(intval($resultado));
            if($mensaje){ ?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
            <?php }
        }
    ?>
    <a href="/propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
    <a href="/vendedores/crear" class="boton boton-verde">Nuevo Vendedor</a>
    <!--Esto se puede hacer con lista en vez de usar una fucking tabla-->
    <h2>Propiedades</h2>
    <div class="container">
        <div class="propiedades">
            <table class="propiedades-box">
                <thead class="container-admin">
                    <tr class="container-lista">
                        <th class="container-lista-item">ID</th>
                        <th class="container-lista-item">Titulo</th>
                        <th class="container-lista-item">Imagen</th>
                        <th class="container-lista-item">Precio</th>
                        <th class="container-lista-item">Editar</th>
                        <th class="container-lista-item">Eliminar</th>

                    </tr>
                </thead>
                <tbody><!-- Mostrar los resultados-->
                    <?php foreach($propiedades as $propiedad): ?>
                    <tr>
                        <td class="identificador identificador-dark"><?php echo $propiedad->id; ?></td>
                        <td><?php echo $propiedad->titulo; ?></td>
                        <td><img src="/imagenes/<?php echo $propiedad->imagen; ?>" class="imagen-tabla" alt="cargando"></td>
                        <td> $ <?php echo $propiedad->precio; ?></td>
                        <td>
                            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Editar</a>
                        </td>
                        <td>
                            <form method="POST" class="w-100" action="/propiedades/eliminar">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input type="submit" class="boton-rojo-block" value="Eliminar"> 
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <h2>Vendedores</h2>


    <table class="propiedades-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody><!-- Mostrar los resultados-->
            <?php foreach($vendedores as $vendedor): ?>
            <tr>
                <td class="identificador identificador-dark"><?php echo $vendedor->id; ?></td>
                <td><?php echo $vendedor->nombre . " " .$vendedor->apellido; ?></td>
                <td><?php echo $vendedor->telefono; ?></td>
                <td>
                    <form method="POST" class="w-100" action="vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id;?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Eliminar"> 
                    </form>
                    <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>