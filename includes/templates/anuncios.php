<?php
    use App\propiedad;

    
    if($_SERVER['SCRIPT_NAME'] === '/bienesraices_inicio/anuncios.php'){
        $propiedades = propiedad::all();
    }else{
        $propiedades = propiedad::get(3);
    }
    

    
?> 


<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad){?>
    <div class="anuncios">
        <img loading="lazy" src="/bienesraices_inicio/imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio" class="picture-img">
    
        <div class="contenido-anuncio">
            <h3><?php echo $propiedad->titulo ?></h3>
            <p><?php echo $propiedad->descripcion ?></p>
            <p class="precio"><?php echo $propiedad->precio ?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono icono_estacionamiento">
                    <p><?php echo $propiedad->estacionamiento ?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p><?php echo $propiedad->habitaciones?></p>
                </li>
            </ul>
            <a href="anuncio.php?id=<?php echo $propiedad->id?>" class="boton-verde-block">
                Ver propiedad
            </a>
        </div><!--contenido anuncio-->
    </div>    <!--anuncio-->
    <?php } ;?>
</div><!--contenedor-anuncios-->    

<?php

//cerrar la conexion
        mysqli_close($db);
?>
