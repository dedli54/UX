document.addEventListener('DOMContentLoaded', function () {
    // Acceder al formulario
    //var formulario = document.querySelector('.Compra');
    // Agregar un evento de escucha para el envío del formulario

    // formulario.addEventListener('submit', function (event) {
    //     // Validar el teléfono
    //     var telefono = document.querySelector('#input_telefono').value;
    //     if (!validarTelefono(telefono)) {
    //         alert('Por favor, ingresa un número de teléfono válido.');
    //         event.preventDefault(); // Evitar que el formulario se envíe
    //         return;
    //     }
    //     // Validar la dirección si se selecciona "A domicilio"
    //     var tipoOrdenDomicilio = document.querySelector('input[name="TipoOrden"][value="domicilio"]');
    //     var direccion = document.querySelector('#input_Direccion').value;
    //     if (tipoOrdenDomicilio.checked && !direccion.trim()) {
    //         alert('Por favor, ingresa la dirección de entrega.');
    //         event.preventDefault(); // Evitar que el formulario se envíe
    //     }
    // });

    // Agregar evento de cambio para mostrar/ocultar el input de dirección

    // var radiosTipoOrden = document.querySelectorAll('input[name="TipoOrden"]');
    // radiosTipoOrden.forEach(function (radio) {
    //     radio.addEventListener('change', function () {
    //         mostrarOcultarDireccion();
    //     });
    // });

    const radioTipoOrden = document.querySelectorAll('input[name="TipoOrden"]');
    // Agregar eventos para actualizar el precio al cambiar los radios
    radioTipoOrden.forEach(rb => rb.addEventListener('change', function () {
        actualizarPrecio();
    }));


    // Recuperar el contenido del carrito desde el localStorage
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    // Obtener el contenedor de la lista de items
    const listaItems = document.querySelector(".ListaItems");

    // Recorrer cada item en el carrito y construir la interfaz
    carrito.forEach((item, index) => {
        if (carrito.length - 1 != index) {
            // Crear un nuevo div para el item
            const nuevoItem = document.createElement("div");
            nuevoItem.classList.add("itemCarrito");

            let contenidoItem;
            // Construir el contenido del item (puedes ajustar esto según tus necesidades)
            if ('papas' in item) {
                contenidoItem = `
            <p class="itemNombre">${item.nombre}<span class="itemprecio">${item.precio.toFixed(2)}</span></p>
            <p class="itempapas">${item.papas}</p>
            <p class="itembebida">${item.bebida}</p>
            <p class="itemcantidad">Cantidad: <span class="itemcannum">${item.cantidad}</span></p>`;
            }
            else {
                contenidoItem = `
                <p class="itemNombre">${item.nombre}<span class="itemprecio">${item.precio.toFixed(2)}</span></p>
                <p class="itembebida">${item.bebida}</p>
                <p class="itemcantidad">Cantidad: <span class="itemcannum">${item.cantidad}</span></p>`;
            }
            // Agregar el contenido al nuevo item
            nuevoItem.innerHTML = contenidoItem;

            // Agregar el nuevo item a la lista de items
            listaItems.appendChild(nuevoItem);

            // Agregar una línea horizontal después de cada item, excepto el último
            if (carrito.length > 2 && index < carrito.length - 2) {
                const hr = document.createElement("hr");
                hr.classList.add("mb-4");
                listaItems.appendChild(hr);
            }
        }
        else {
            return; // Salir del bucle
        }
    });

    // Obtener el último elemento del carrito (que contiene el subtotal)
    const subtotal = carrito[carrito.length - 1].CarritoTotal;

    // Actualizar el texto del subtotal en el HTML
    const subtotalElement = document.querySelector(".Subtotal span");
    subtotalElement.textContent = `${subtotal}`;

    // Calcular y mostrar el total (puedes ajustar esto según tus necesidades)
    const total = subtotal; // Puedes ajustar esto según tus necesidades
    const totalElement = document.querySelector(".Total span");
    totalElement.textContent = `${total/*.toFixed(2)*/}`;

    actualizarPrecio();
});

function enviarPedidoAlServidor(pedido, cuenta) {
    // Crea un objeto XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configura la solicitud
    xhr.open("POST", "../PHP/guardar_pedido.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    // Combina la información del pedido y la cuenta en un solo objeto
    var data = {
        pedido: pedido,
        cuenta: cuenta
    };

    console.log(data);

    // Convierte el objeto combinado a formato JSON
    var jsonData = JSON.stringify(data);

    console.log(jsonData);

    // Configura la función de devolución de llamada cuando la solicitud se complete
    xhr.onreadystatechange = function () {
        if (/*xhr.readyState == 4 &&*/ xhr.status === 200) {
            //     var r = xhr.responseText;
            //     if (r == 1) {
            //         confirm("Agregado con éxito!!!");
            //     } else {
            //         alert("Fallo al agregar :(");
            //     }
            // }
            // La solicitud fue exitosa
            console.log("Pedido enviado con éxito");
        } else {
            // Hubo un error en la solicitud
            console.error("Error al enviar el pedido");
        }
    };

    // Envía la solicitud con los datos JSON combinados
    xhr.send(jsonData);
}

function validarFormulario() {
    // Validar el teléfono
    //var telefono = document.querySelector('#input_telefono').value;
    if (!validarTelefono(document.querySelector('#telefono').value)) {
        alert('Por favor, ingresa un número de teléfono válido.');
        return false; // Evitar que el formulario se envíe y la página se recargue
    }

    // Validar la dirección si se selecciona "A domicilio"
    var tipoOrden = document.querySelector('input[name="TipoOrden"]:checked');
    var tipoOrdenDomicilio = document.querySelector('input[name="TipoOrden"][value="domicilio"]');
    var direccion = document.querySelector('#input_Direccion').value.trim();

    if (tipoOrden.value.trim() === "domicilio") {
        if (tipoOrdenDomicilio.checked && direccion != "") {
            //window.location.replace = '../PHP/dashboard.php';
            alert('Informacion ingresada,pedido ordenado');

            //guardar pedido en base de datos
            // Obtén la información necesaria del pedido
            const valuetipoOrden = tipoOrden.value.trim();
            const valuedireccion = direccion;
            const valuemetodo = document.querySelector('input[name="Metodo"]:checked').value.trim();
            const valuesubtotal = parseFloat(document.querySelector('.Subtotal span').textContent);
            const valuetotal = parseFloat(document.querySelector('.Total span').textContent);

            // Crea un objeto con la información del pedido
            const pedido = {
                tipoOrden: valuetipoOrden,
                direccion: valuedireccion,
                metodopago: valuemetodo,
                subtotal: valuesubtotal,
                total: valuetotal
            };

            // Obtén la información del carrito desde el localStorage
            const cuentaStorage = JSON.parse(localStorage.getItem("carrito")) || [];
            // Filtra el carrito para excluir el último elemento (total)
            const cuenta = cuentaStorage.slice(0, -1);

            // Envia la información del pedido al servidor
            enviarPedidoAlServidor(pedido, cuenta);
            localStorage.clear();
            return true; // Evitar que el formulario se envíe y la página se recargue
        }
        else {
            alert('Por favor, ingresa la dirección de entrega.');
            return false; // Evitar que el formulario se envíe y la página se recargue
        }
    }
    else {
        //window.location.replace = '../PHP/dashboard.php';
        alert('Informacion ingresada,pedido ordenado');

        //guardar pedido en base de datos
        // Obtén la información necesaria del pedido
        const valuetipoOrden = tipoOrden.value.trim();
        const valuemetodo = document.querySelector('input[name="Metodo"]:checked').value.trim();
        const valuesubtotal = parseFloat(document.querySelector('.Subtotal span').textContent);
        const valuetotal = parseFloat(document.querySelector('.Total span').textContent);

        // Crea un objeto con la información del pedido
        const pedido = {
            tipoOrden: valuetipoOrden,
            direccion: 'Sin Direccion',
            metodopago: valuemetodo,
            subtotal: valuesubtotal,
            total: valuetotal
        };

        // Obtén la información del carrito desde el localStorage
        const cuentaStorage = JSON.parse(localStorage.getItem("carrito")) || [];
        // Filtra el carrito para excluir el último elemento (total)
        const cuenta = cuentaStorage.slice(0, -1);

        // Envia la información del pedido al servidor
        enviarPedidoAlServidor(pedido, cuenta);

        localStorage.clear();
        //guardar pedido en base de datos
        return true;
    }
}

function validarTelefono(telefono) {
    // Añade aquí tu lógica de validación del teléfono (puedes usar expresiones regulares, por ejemplo)
    return /^\d{10}$/.test(telefono);
}

function actualizarPrecio() {
    // Obtén los elementos necesarios
    const cantidadElement = document.querySelector('.Subtotal span');
    const Subtotal = parseFloat(cantidadElement.textContent);

    // Obtén el valor del radio seleccionado para papas y bebida
    const radio = document.querySelector('input[name="TipoOrden"]:checked');

    // Calcula el precio total
    let precioTipoOrden = 0;
    //const regex = /\(\$(\d+(\.\d+)?)\)/;

    if (radio.value === 'domicilio') {
        precioTipoOrden = 30;
    }


    const precioTotal = Subtotal + precioTipoOrden;

    // Actualiza el resultado en el modal
    document.querySelector('.Total span').textContent = precioTotal.toFixed(2);
}