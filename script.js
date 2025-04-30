function actualizarHoraYFecha() {
    const ahora = new Date();
    const hora = ahora.toLocaleTimeString();
    const fecha = ahora.toLocaleDateString();

    document.getElementById('hora').textContent = hora;
    document.getElementById('fecha').textContent = fecha;
}

// Obtener ubicación geográfica del navegador
function obtenerUbicacion() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            position => {
                const lat = position.coords.latitude.toFixed(4);
                const lon = position.coords.longitude.toFixed(4);
                document.getElementById('ubicacion').textContent = `${lat}, ${lon}`;
            },
            error => {
                document.getElementById('ubicacion').textContent = 'No se pudo obtener la ubicación.';
            }
        );
    } else {
        document.getElementById('ubicacion').textContent = 'Geolocalización no soportada.';
    }
}

// Inicializar
actualizarHoraYFecha();
setInterval(actualizarHoraYFecha, 1000);
obtenerUbicacion();
