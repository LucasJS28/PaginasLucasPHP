setTimeout(function() {
    var alerta = document.getElementById('alerta');
    if (alerta) {
        alerta.style.animation = 'desaparecer 5s forwards';
        setTimeout(function() {
            alerta.style.display = 'none';
        }, 10000);
    }
}, 10000);


document.getElementById('buscar').addEventListener('input', function() {
    var input = this.value.toLowerCase();
    var juegos = document.getElementsByClassName('juego');

    for (var i = 0; i < juegos.length; i++) {
        var titulo = juegos[i].getElementsByClassName('titulo')[0].textContent.toLowerCase();
        var descripcion = juegos[i].getElementsByClassName('descripcion')[0].textContent.toLowerCase();

        if (titulo.includes(input) || descripcion.includes(input)) {
            juegos[i].style.display = 'block';
        } else {
            juegos[i].style.display = 'none';
        }
    }
});


/* Ajax tienda.php */

// Manejador de evento clic para los botones "Agregar al Carrito"
var agregarCarritoButtons = document.getElementsByClassName('agregar-carrito');
for (var i = 0; i < agregarCarritoButtons.length; i++) {
    agregarCarritoButtons[i].addEventListener('click', function(event) {
        event.preventDefault(); // Evitar que se envíe el formulario

        var idJuego = this.getAttribute('data-id');
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Actualizar la interfaz de usuario si es necesario
                var response = xhr.responseText;
                var alertaDiv = document.getElementById('alerta');

                if (response === "<div id='alerta' class='AlertaBuena'>Se añadió una nueva copia al Carro</div>") {
                    // Mostrar mensaje de éxito
                    alertaDiv.innerHTML = "Se añadió una nueva copia al Carro";
                    alertaDiv.className = "AlertaBuena";
                } else if (response === "<div id='alerta' class='AlertaBuena'>Se añadió al Carrito</div>") {
                    // Mostrar otro mensaje de éxito
                    alertaDiv.innerHTML = "Se añadió al Carrito";
                    alertaDiv.className = "AlertaBuena";
                } else {
                    // Mostrar mensaje de error u otra respuesta desconocida
                    alertaDiv.innerHTML = response;
                    alertaDiv.className = "AlertaError";
                }
            }
        };
        xhr.send('agregarCarrito=true&idJuego=' + idJuego);
    });
}



