<main class="contenedor seccion">
    <h2>Mas Sobre Nostros</h2>
    <?php include 'iconos.php';?>
</main>
<section class="seccion contenedor">
    <h2>Casas y Departamentos en Venta</h2>
    <?php
        include 'listado.php';
    ?>
    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-amarillo">Ver Todas</a>
    </div>
</section>
<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
    <a href="contacto.html" class="boton-verde">Contactanós</a>
</section>
<div class="contenedor seccion seccion-inferior">
    <seccion class="blog">
        <h3>Nuestro Blog</h3>
        
        <article class="entrada-blog">
            <div class="imagen">
                <picture >
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="texto Entrada blog" class="picture-img">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</por:span></p>
                    <p>
                        Consejos para construir una terraza en el techo de tu casa con los mejores materiales 
                        y ahorrando dinero
                    </p> 
                </a>
            </div>
        </article>
        <article class="entrada-blog">
              <div class="imagen">
                <picture class="picture-block">
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="texto Entrada blog" class="picture-img">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4>Guia para la decoración de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>28/01/2023</span> por: <span>Admin</por:span></p>
                    <p>
                        Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle
                        vida a tu espacio
                    </p> 
                </a>
            </div>
        </article>
    </seccion>
    <secition class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                EL personal se comporto de una excelente forma, muy buena la atencion 
                y la casa que me ofrecieron cumple con todas mis expectativas. 
            </blockquote>
            <p>- Agustin Segui</p>
        </div>
    </secition>
</div>