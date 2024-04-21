document.addEventListener('DOMContentLoaded', function () {

    // Obtén referencias a los elementos relevantes
    const agregarAlCarritoBtn = document.getElementById('agregarAlCarrito');
    const carritoLista = document.getElementById('carrito_lista');
    const totalCarrito = document.getElementById('totalCarrito');
    actualizarTotalCarrito();

    // Maneja el clic en el botón "Agregar" en la ventana modal
    agregarAlCarritoBtn.addEventListener('click', function () {
        // Obtén la información de la ventana modal
        const modalActual = document.querySelector('.modal--show');
        const numeroProducto = modalActual.dataset.item;
        const nombre = modalActual.querySelector('.modal__title').textContent;
        const precio = parseFloat(modalActual.querySelector('#total').textContent);
        const papas = modalActual.querySelector('input[name="papas"]:checked').parentElement.innerText;
        const bebida = modalActual.querySelector('input[name="bebida"]:checked').parentElement.innerText;
        const cantidad = parseInt(modalActual.querySelector('#cantidad').textContent);
        // const numeroProducto = document.querySelector('.modal--show').dataset.item;
        // const nombre = document.querySelector(`.modal-item[data-item="${numeroProducto}"] .modal__title`).textContent;
        // const precio = parseFloat(document.getElementById('total').textContent);
        // const papas = document.querySelector(`input[name="papas"]:checked`).parentElement.innerText;
        // const bebida = document.querySelector(`input[name="bebida"]:checked`).parentElement.innerText;
        // const cantidad = parseInt(document.getElementById('cantidad').textContent);

        // Calcula el precio total del item en el carrito
        //const precioTotalItem = precio * cantidad;

        // Crea un nuevo elemento para el carrito
        const nuevoItemCarrito = document.createElement('div');
        nuevoItemCarrito.classList.add('itemCarrito');

        nuevoItemCarrito.innerHTML = `
            <p class="itemNombre">${nombre} $<span class="itemprecio">${precio.toFixed(2)}</span></p>
            <p class="itempapas">${papas}</p>
            <p class="itembebida">${bebida}</p>
            <p class="itemcantidad">Cantidad: <span class="itemcannum">${cantidad}</span></p>
            <button type="button" class="botonEliminar">Eliminar</button>
        `;

        // Agrega el nuevo elemento al carrito
        carritoLista.appendChild(nuevoItemCarrito);

        // Actualiza el total del carrito
        actualizarTotalCarrito();
    });

    // Función para actualizar el total del carrito
    function actualizarTotalCarrito() {
        const itemsCarrito = carritoLista.getElementsByClassName('itemprecio');
        let total = 0;

        // Suma los precios de todos los items en el carrito
        for (let item of itemsCarrito) {
            total += parseFloat(item.textContent);
        }

        // Actualiza el contenido del total del carrito
        totalCarrito.innerHTML = `Total: $<span>${total.toFixed(2)}</span>`;

        // Muestra el mensaje si el carrito está vacío
        if (itemsCarrito.length === 0 ) {
            carritoLista.innerHTML = '<p id="mensajevacio">Carrito sin productos</p>';
        }
        else{
            const mensajeVacio = document.getElementById('mensajevacio');
            if (mensajeVacio) {
                mensajeVacio.remove();
            }
        }
    }

    // Maneja clics en los botones "Eliminar"
    carritoLista.addEventListener('click', function (event) {
        if (event.target.classList.contains('botonEliminar')) {
            // Elimina el elemento del carrito
            event.target.parentElement.remove();

            // Actualiza el total del carrito
            actualizarTotalCarrito();
        }
    });
});
