document.addEventListener('DOMContentLoaded', function() {
    eventListeners();

    darkMode();
});


function darkMode() {
    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode')
        //toggle funciona como un if y un else haciendo referencia a remove y add como en navegacionResponsive
    });
}

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive)

    //muestra los campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]')
    metodoContacto.forEach(input=> input.addEventListener('click', mostrarMetodosContacto)); 

}

function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');

    if(e.target.value === 'telefono'){
        
        contactoDiv.innerHTML = `
            <label for="telefono">Numero Telefono</label>
            <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

            <p> Elija la fecha y la hora para la llamada</p>
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="time">Hora:</label>
            <input type="time" id="time" min="09:00" max="18:00" name="contacto[hora]">
    
        `;
    }else{
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="contacto[email]" >
                    
        `;
    }

} 