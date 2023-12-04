
document.addEventListener('DOMContentLoaded', function () {
    inciarApp();
})

function inciarApp() {
    scrollnav();
    navegacionFija();
    menuResponsive();
}

function scrollnav(params) {
    const enlaces = document.querySelectorAll('.nav a');
    const homeLink = document.querySelector('.nav .home');

    homeLink.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0, // Ir al principio de la página
            behavior: "smooth"
        });
    });

    enlaces.forEach(function(enlace) {
        if (enlace !== homeLink) { // Evitar que el enlace "home" se procese dos veces
            enlace.addEventListener('click', function(e) {
                e.preventDefault();
                const seccionscroll = e.target.attributes.href.value;
                const seccion = document.querySelector(seccionscroll);
                seccion.scrollIntoView({ behavior: "smooth" });
            });
        }
    });
}


function navegacionFija(params) {

    const barra = document.querySelector('.contenedor-nav');
    const sobreProducto = document.querySelector('.contenedor-productos');
    const body = document.querySelector('body');

    window.addEventListener('scroll', function () {
        // Obtener la posición de sobreProducto
        const rect = sobreProducto.getBoundingClientRect();

        // Verificar si está a 90px o más por encima de la parte superior de la ventana
        if (rect.top - 110 < 0) {
            barra.classList.add('fijo');
            body.classList.add('body-scroll');
        } else {
            barra.classList.remove('fijo');
            body.classList.remove('body-scroll');
        }
    });

}
function menuResponsive(params) {
    const mobile = document.querySelector('.mobile-menu');
    mobile.addEventListener('click', navegacionResponsive);
}
function navegacionResponsive(params) {
    const menuResponsive = document.querySelector('.nav');
    menuResponsive.classList.toggle('mostrar');

}