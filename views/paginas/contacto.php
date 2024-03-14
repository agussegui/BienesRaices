<main class="contenedor seccion">
    <h2>Contacto</h2>

    <?php if($mensaje) { ?>
        <p class='alerta exito'> <?php echo $mensaje; ?> </p>;
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading=" lazy" src="build/img/destacada3.jpg" alt="imagen contacto" class="picture-img">
    </picture>

    <div class="box-title">
        <h2 class="box-title-form">Llene el Formulario de Contacto</h2>
    </div>    
    <div class="formulario-box">
        <form action="" class="formulario" action="/contacto" method="POST">
            <fieldset>
                <h3 class="formulario-line-title">Informacion Personal</h3>
                <div class="form-line-div"></div>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre"  name="contacto[nombre]" >

                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="contacto[mensaje]" ></textarea>
            </fieldset>

            <fieldset>
                <h3 class="formulario-line-title">Informacion sobre la Propiedad</h3>
                <div class="form-line-div"></div>

                <label for="opciones">Vende o Compra:</label>
                <select id="opciones" name="contacto[tipo]" > 
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto"  id="telefono" name="contacto[precio]" >
            </fieldset>

            <fieldset>
                <h3 class="formulario-line-title">Contacto</h3>
                <div class="form-line-div"></div>
                <p>Como de sea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input  type="radio" value="telefono" id="contactar-telefono"   name="contacto[contacto]" >

                    <label for="contactar-email">Email</label>
                    <input  type="radio" value="email" id="contactar-email"     name="contacto[contacto]" >
                </div>

                <div id="contacto"></div>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </div>
</main>