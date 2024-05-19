// Selecciona todos los elementos con la clase "producto"
const productos = document.querySelectorAll('.producto');

// Agrega un evento de clic a cada elemento de producto
productos.forEach(producto => {
    producto.addEventListener('click', (e) => {
        e.preventDefault();

        // Obtiene el número del artículo a partir del atributo "data-item"
        const itemNumber = producto.getAttribute('data-item');

        // Selecciona la modal correspondiente
        const modal = document.querySelector(`.modal-item[data-item="${itemNumber}"]`);

        // Agrega o quita la clase para mostrar/ocultar la modal
        modal.classList.toggle('modal--show');
    });
});

// Selecciona todos los elementos con la clase "modal__close"
const closeButtons = document.querySelectorAll('.modal__close');

// Agrega un evento de clic a cada botón de cierre
closeButtons.forEach(closeButton => {
    closeButton.addEventListener('click', (e) => {
        e.preventDefault();

        // Busca la modal padre del botón y quita la clase para ocultarla
        const modal = closeButton.closest('.modal');
        modal.classList.remove('modal--show');
    });
});

//CARGAR VENTANAS MODALES CON LA INFORMACION DE SU DIV
document.addEventListener('DOMContentLoaded', function () {
    // Obtén todos los productos y modales
    const productos = document.querySelectorAll('.contenedor_producto');
    //const modales = document.querySelectorAll('.modal-item');
    let cantidad = 1;
    var modalactual;
    // Itera sobre cada producto
    productos.forEach(function (producto) {
        // Maneja el clic en el producto
        producto.addEventListener('click', function () {
            // Obtiene el número del producto desde el atributo data
            const numeroProducto = producto.dataset.item;
            //cantidad = 1;
            // Encuentra el modal correspondiente
            const modalCorrespondiente = document.querySelector(`.modal-item[data-item="${numeroProducto}"]`);
            modalactual = modalCorrespondiente;

            // Obtiene la información del producto
            const titulo = producto.querySelector('.producto_nombre').textContent;
            const descripcion = producto.querySelector('.descripcion_producto').textContent;
            const precio = producto.querySelector('.precio_producto').textContent;

            const precioTexto = producto.querySelector('.precio_producto').textContent;
            const precioNumerico = parseFloat(precioTexto.replace('Precio: $', ''));

            // Actualiza el contenido del modal con la información del producto
            modalCorrespondiente.querySelector('.modal__title').textContent = titulo;
            modalCorrespondiente.querySelector('.modal__paragraph').textContent = descripcion;
            // Aquí, ajusta según tu estructura específica del precio
            modalCorrespondiente.querySelector('#total').textContent = precioNumerico.toFixed(2);
            modalCorrespondiente.querySelector('#cantidad').textContent='1';

            reiniciarRadios(modalCorrespondiente);
            actualizarPrecio(modalCorrespondiente);

            // Muestra el modal
            modalCorrespondiente.classList.add('modal--show');
        });
    });

        // Obtén todos los elementos de cantidad y botones menos/más
        const cantidadSpan = modalactual.querySelector('#cantidad');
        const menosButton = modalactual.querySelector('.menos');
        const masButton = modalactual.querySelector('.mas');
    
        // Establece la cantidad inicial
        cantidadSpan.textContent = cantidad;
    
        // Maneja clics en el botón menos
        menosButton.addEventListener('click', function () {
            if (cantidad > 1) {
                cantidad--;
                cantidadSpan.textContent = cantidad;
                actualizarPrecio();
            }
        });
    
        // Maneja clics en el botón más
        masButton.addEventListener('click', function () {
            cantidad++;
            cantidadSpan.textContent = cantidad;
            actualizarPrecio();
        });
});

const radiopapas = document.querySelectorAll('input[name="papas"]');
// Agregar eventos para actualizar el precio al cambiar los radios
radiopapas.forEach(rb=>rb.addEventListener('change',function() {
    actualizarPrecio();
}));

const radiobebidas = document.querySelectorAll('input[name="bebida"]');
// Agregar eventos para actualizar el precio al cambiar los radios
radiobebidas.forEach(rb=>rb.addEventListener('change',function() {
    actualizarPrecio();
}));


function reiniciarRadios(modal) {
    // Encuentra todos los grupos de radio en el modal
    const gruposDeRadio = modal.querySelectorAll('.opciones');

    // Itera sobre cada grupo de radio
    gruposDeRadio.forEach(function (grupo) {
        // Encuentra todos los radio buttons en el grupo
        const radios = grupo.querySelectorAll('input[type="radio"]');

        // Establece el primer radio como seleccionado por defecto
        radios[0].checked = true;
    });
}

function actualizarPrecio(modal) {
    // Obtén los elementos necesarios
    const cantidadElement = modal.querySelector('#cantidad');
    const precioBase = parseFloat(modal.querySelector('.precio_producto').textContent.replace('Precio: $', ''));

    // Obtén el valor del radio seleccionado para papas y bebida
    const radioPapas = modal.querySelector('input[name="papas"]:checked');
    const radioBebida = modal.querySelector('input[name="bebida"]:checked');

    // Calcula el precio total
    let precioPapas = 0;
    let precioBebida = 0;
    const regex= /\(\$(\d+(\.\d+)?)\)/;

    if (radioPapas) {
        const textopapas = radioPapas.parentElement.innerText;
        const matchPapas = regex.exec(textopapas);
        if (matchPapas && matchPapas[1]) {
            precioPapas = parseFloat(matchPapas[1]);
        }
    }

    if (radioBebida) {
        const textBebida = radioBebida.parentElement.innerText;
        const matchBebida = regex.exec(textBebida);
        if (matchBebida  && matchBebida[1]) {
            precioBebida = parseFloat(matchBebida[1]);
        }
    }

    const cantidad = parseInt(cantidadElement.textContent);
    const precioTotal = (precioBase + precioPapas + precioBebida) * cantidad;

    // Actualiza el resultado en el modal
    document.getElementById('total').textContent = precioTotal.toFixed(2);
}