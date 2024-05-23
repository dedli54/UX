document.addEventListener("DOMContentLoaded", function () {
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
      if ("papas" in item) {
        contenidoItem = `<p class="itemNombre">${item.nombre}<span class="itemprecio">${item.precio.toFixed(2)}</span></p>
                         <p class="itempapas">${item.papas}</p>
                         <p class="itembebida">${item.bebida}</p>
                         <p class="itemcantidad">Cantidad: <span class="itemcannum">${item.cantidad}</span></p>`;
      } else {
        contenidoItem = `<p class="itemNombre">${item.nombre}<span class="itemprecio">${item.precio.toFixed(2)}</span></p>
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
    } else {
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
  totalElement.textContent = `${total}`;

  actualizarPrecio();
});

function validarFormulario() {
  // Validar el teléfono
  if (!ValidarTelefono()) {
    alert("Por favor, ingresa un número de teléfono válido.");
    return false;
  }
  // Validar la dirección si se selecciona "A domicilio"
  var tipoOrdenDomicilio = document.querySelector('input[name="TipoOrden"][value="domicilio"]');
  var tipoOrdenRecoger = document.querySelector('input[name="TipoOrden"][value="recoger"]');
  var direccion = document.querySelector("#input_Direccion").value;

  if (tipoOrdenDomicilio.checked && !direccion.trim()) {
    alert("Por favor, ingresa la dirección de entrega.");
    return false;
  }

  if (tipoOrdenDomicilio.checked) {
    // Obtén la información necesaria del pedido
    const valuetipoOrden = tipoOrdenDomicilio.value.trim();
    const valuedireccion = direccion.trim();
    const valuemetodo = document.querySelector('input[name="Metodo"]:checked').value.trim();
    const valuesubtotal = parseFloat(document.querySelector(".Subtotal span").textContent);
    const valuetotal = parseFloat(document.querySelector(".Total span").textContent);

    // Crea un objeto con la información del pedido
    const pedido = {
      tipoOrden: valuetipoOrden,
      direccion: valuedireccion,
      metodopago: valuemetodo,
      subtotal: valuesubtotal,
      total: valuetotal,
    };

    // Obtén la información del carrito desde el localStorage
    const cuentaStorage = JSON.parse(localStorage.getItem("carrito")) || [];
    // Filtra el carrito para excluir el último elemento (total)
    const cuenta = cuentaStorage.slice(0, -1);

    // Envia la información del pedido al servidor
    enviarPedidoAlServidor(pedido, cuenta)
    localStorage.clear();
    return true;
  }
}

if (tipoOrdenRecoger.checked) {
  // Obtén la información necesaria del pedido
  const valuetipoOrden = tipoOrdenRecoger.value.trim();
  const valuemetodo = document.querySelector('input[name="Metodo"]:checked').value.trim();
  const valuesubtotal = parseFloat(document.querySelector(".Subtotal span").textContent);
  const valuetotal = parseFloat(document.querySelector(".Total span").textContent);

  // Crea un objeto con la información del pedido
  const pedido = {
    tipoOrden: valuetipoOrden,
    direccion: "Sin Direccion",
    metodopago: valuemetodo,
    subtotal: valuesubtotal,
    total: valuetotal,
  };

  // Obtén la información del carrito desde el localStorage
  const cuentaStorage = JSON.parse(localStorage.getItem("carrito")) || [];
  // Filtra el carrito para excluir el último elemento (total)
  const cuenta = cuentaStorage.slice(0, -1);

  // Envia la información del pedido al servidor
  enviarPedidoAlServidor(pedido, cuenta)
  localStorage.clear();
  return true;
}

function enviarPedidoAlServidor(pedido, cuenta) {
  // Crea un objeto XMLHttpRequest
  var xhr = new XMLHttpRequest();

  // Combina la información del pedido y la cuenta en un solo objeto
  var data = {
    pedido: pedido,
    cuenta: cuenta,
  };

  // Configura la solicitud
  xhr.open("POST", "../PHP/guardar_pedido.php", true);
  xhr.setRequestHeader("Content-Type", "application/json");

  // Configura la función de devolución de llamada cuando la solicitud se complete
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status === 200) {
      alert("Pedido enviado de manera satisfactoria!");
    }
  };
  var jsonData = JSON.stringify(data);

  // Envía la solicitud con los datos JSON combinados
  xhr.send(jsonData);
}
