// Mostrar mensaje de envío
document.getElementById('formulario-contacto').addEventListener('submit', function (e) {
    e.preventDefault();
    document.getElementById('mensaje-enviado').classList.remove('oculto');
    this.reset();
});

// Animaciones al hacer scroll
const secciones = document.querySelectorAll("section");

const mostrarElemento = (entry) => {
    if (entry.isIntersecting) {
        entry.target.classList.add("animado");
    }
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(mostrarElemento);
}, {
    threshold: 0.2,
});

secciones.forEach(sec => {
    observer.observe(sec);
});

// Menú hamburguesa toggle
document.getElementById('menu-icon').addEventListener('click', function () {
    document.getElementById('nav-links').classList.toggle('show');
});
