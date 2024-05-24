// Selecciona todos los elementos con la clase "producto"
const productos = document.querySelectorAll(".producto");
const carritoLista = document.getElementById("carrito_lista");
const totalCarrito = document.getElementById("totalCarrito");

document.addEventListener("DOMContentLoaded", function () {
  // Maneja clics en los botones "Eliminar"
  carritoLista.addEventListener("click", function (event) {
    if (event.target.classList.contains("botonEliminar")) {
      // Elimina el elemento del carrito
      event.target.parentElement.remove();

      // Actualiza el total del carrito
      actualizarTotalCarrito();
    }
  });

  //MANDAR INFORMACION A LOCALSTORAGE
  // Selecciona el botón "Ir a Pagar"
  const btnPagar = document.querySelector(".btnPagar");

  actualizarTotalCarrito();
  // Agrega un evento de clic al botón
  btnPagar.addEventListener("click", function () {
    // Obtén los elementos del carrito
    const carritoLista = document.getElementById("carrito_lista");

    // Verifica si tiene algún elemento "itemCarrito"
    const itemsCarrito = carritoLista.querySelectorAll(".itemCarrito");

    if (itemsCarrito.length > 0) {
      // Si hay elementos, realiza las acciones necesarias
      const informacionDelCarrito = construirObjetoCarrito(itemsCarrito);

      // Guarda la información en localStorage
      localStorage.setItem("carrito", JSON.stringify(informacionDelCarrito));

      // Redirige a Pagar.php
      window.location.href = "../HTML/PagarOrdenTaqueria.php";
    } else {
      // Si no hay elementos, muestra un mensaje o realiza otra acción
      alert("El carrito está vacío. Agrega productos antes de ir a pagar.");
    }
  });

  //TRAER INFORMACION DE LOCALSTORAGE,SI ES QUE HAY
  if (localStorage.length > 0) {
    const carrito = JSON.parse(localStorage.getItem("carrito")); // || [];

    // Obtener el contenedor de la lista de items
    // Recuperar el contenido del carrito desde el localStorage
    const listaItems = document.querySelector("#carrito_lista");

    // Recorrer cada item en el carrito y construir la interfaz
    carrito.forEach((item, index) => {
      if (carrito.length - 1 != index) {
        // Crear un nuevo div para el item
        const nuevoItem = document.createElement("div");
        nuevoItem.classList.add("itemCarrito");

        let contenidoItem;
        // Construir el contenido del item (puedes ajustar esto según tus necesidades)
        if ("papas" in item) {
          contenidoItem = `<p class="itemNombre">${item.nombre}
                          <span class="itemprecio">${item.precio.toFixed(2)}</span></p>
                          <p class="itempapas">${item.papas}</p>
                          <p class="itembebida">${item.bebida}</p>
                          <p class="itemcantidad">Cantidad: 
                          <span class="itemcannum">${item.cantidad}</span></p>
                          <button type="button" class="botonEliminar">Eliminar</button>`;
        } else {
          contenidoItem = `<p class="itemNombre">${item.nombre}
                           <span class="itemprecio">${item.precio.toFixed(2)}</span></p>
                           <p class="itembebida">${item.bebida}</p>
                           <p class="itemcantidad">Cantidad: 
                           <span class="itemcannum">${item.cantidad}</span></p>
                           <button type="button" class="botonEliminar">Eliminar</button>`;
        }
        // Agregar el contenido al nuevo item
        nuevoItem.innerHTML = contenidoItem;

        // Agregar el nuevo item a la lista de items
        listaItems.appendChild(nuevoItem);
      } else {
        return; // Salir del bucle
      }
    });

    // Obtener el último elemento del carrito (que contiene el subtotal)
    const Total = carrito[carrito.length - 1].CarritoTotal;

    // Actualizar el texto del subtotal en el HTML
    const totalElement = document.querySelector("#totalCarrito span");
    totalElement.textContent = `${Total}`;
  }
  actualizarTotalCarrito();
});

// Función para construir el objeto con la información del carrito
function construirObjetoCarrito(elementosCarrito) {
  // Aquí debes construir un objeto con la información que necesitas
  // Puedes iterar sobre los elementos del carrito y extraer la información necesaria
  // Retorna este objeto para guardarlo en localStorage
  const carrito = [];

  elementosCarrito.forEach((item) => {
    if (item.querySelector(".itempapas")) {
      const nombreElement = item.querySelector(".itemNombre");
      const nombre = nombreElement.childNodes[0].textContent;
      const precio = parseFloat(item.querySelector(".itemprecio").textContent);
      const papas = item.querySelector(".itempapas").textContent;
      const bebida = item.querySelector(".itembebida").textContent;
      const cantidad = parseInt(item.querySelector(".itemcannum").textContent);

      const itemCarrito = {
        nombre,
        precio,
        papas,
        bebida,
        cantidad,
      };
      carrito.push(itemCarrito);

    } else {
      const nombreElement = item.querySelector(".itemNombre");
      const nombre = nombreElement.childNodes[0].textContent;
      const precio = parseFloat(item.querySelector(".itemprecio").textContent);
      const bebida = item.querySelector(".itembebida").textContent;
      const cantidad = parseInt(item.querySelector(".itemcannum").textContent);

      const itemCarrito = {
        nombre,
        precio,
        bebida,
        cantidad,
      };
      carrito.push(itemCarrito);
    }
  });

  const CarritoTotal = document.querySelector("#totalCarrito span").textContent;
  const Subtotal = {
    CarritoTotal,
  };
  carrito.push(Subtotal);

  return carrito;
}

// Agrega un evento de clic a cada elemento de producto
productos.forEach((producto) => {
  producto.addEventListener("click", (e) => {
    e.preventDefault();

    // Obtiene el número del artículo a partir del atributo "data-item"
    const itemNumber = producto.getAttribute("data-item");

    // Encuentra el modal correspondiente
    const modalCorrespondiente = document.querySelector(`.modal-item[data-item="${itemNumber}"]`);
    modalactual = modalCorrespondiente;

    // Verifica si el producto tiene la clase sin_papas
    const sinPapas = producto.classList.contains("entrada");

    // Oculta o muestra la sección de opciones de papas
    const opcionesPapas = modalCorrespondiente.querySelector(".opciones_papas");
    if (sinPapas) {
      opcionesPapas.style.display = "none";
    } else {
      opcionesPapas.style.display = "block";
    }

    // Obtiene la información del producto
    const titulo = producto.querySelector(".producto_nombre").textContent;
    const descripcion = producto.querySelector(".descripcion_producto").textContent;

    const precioTexto = producto.querySelector(".precio_producto").textContent;
    const precioNumerico = parseFloat(precioTexto.replace("Precio: $", ""));

    // Actualiza el contenido del modal con la información del producto
    modalCorrespondiente.querySelector(".modal__title").textContent = titulo;
    modalCorrespondiente.querySelector(".modal__paragraph").textContent = descripcion;
    // Aquí, ajusta según tu estructura específica del precio
    modalCorrespondiente.querySelector("#total").textContent = precioNumerico.toFixed(2);
    modalCorrespondiente.querySelector("#cantidad").textContent = "1";

    // Agrega o quita la clase para mostrar/ocultar la modal
    modalCorrespondiente.classList.toggle("modal--show");

    // Agrega nuevos eventos
    agregarEventos(modalCorrespondiente, producto);
  });
});

function limpiarEventos(modal) {
  // Clona el nodo y reemplaza el original
  const oldNode = modal.cloneNode(true);
  modal.parentNode.replaceChild(oldNode, modal);
}

function agregarEventos(modal, producto) {
  const gruposDeRadio = modal.querySelectorAll(".opciones");

  // Itera sobre cada grupo de radioS
  gruposDeRadio.forEach(function (grupo) {
    // Encuentra todos los radio buttons en el grupo
    const radios = grupo.querySelectorAll('input[type="radio"]');

    // Establece el primer radio como seleccionado por defecto
    radios[0].checked = true;
  });

  const radiopapas = modal.querySelectorAll('input[name="papas"]');
  // Agregar eventos para actualizar el precio al cambiar los radios
  radiopapas.forEach((rb) =>
    rb.addEventListener("change", function () {
      actualizarPrecio(modal, producto);
    })
  );

  const radiobebidas = modal.querySelectorAll('input[name="bebida"]');
  // Agregar eventos para actualizar el precio al cambiar los radios
  radiobebidas.forEach((rb) =>
    rb.addEventListener("change", function () {
      actualizarPrecio(modal, producto);
    })
  );
  // Obtén todos los elementos de cantidad y botones menos/más
  const cantidadSpan = modal.querySelector("#cantidad");
  const menosButton = modal.querySelector(".menos");
  const masButton = modal.querySelector(".mas");
  let cantidad = 1;

  // Establece la cantidad inicial
  cantidadSpan.textContent = cantidad;

  // Maneja clics en el botón menos
  menosButton.addEventListener("click", function () {
    if (cantidad > 1) {
      cantidad--;
      cantidadSpan.textContent = cantidad;
      actualizarPrecio(modal, producto);
    }
  });

  // Maneja clics en el botón más
  masButton.addEventListener("click", function () {
    cantidad++;
    cantidadSpan.textContent = cantidad;
    actualizarPrecio(modal, producto);
  });

  const closeButton = modal.querySelector(".modal__close");
  closeButton.addEventListener("click", (e) => {
    cantidad = 1;
    const boton = closeButton.closest(".modal");
    boton.classList.remove("modal--show");
    // Elimina los eventos existentes
    limpiarEventos(modal);
  });

  const agregarAlCarritoBtn = modal.querySelector("#agregarAlCarrito");
  // Maneja el clic en el botón "Agregar" en la ventana modal
  agregarAlCarritoBtn.addEventListener("click", function () {
    // Obtén la información de la ventana modal
    const nombre = modal.querySelector(".modal__title").textContent;
    const precio = parseFloat(modal.querySelector("#total").textContent);
    const papas = modal.querySelector('input[name="papas"]:checked').parentElement.innerText;
    const bebida = modal.querySelector('input[name="bebida"]:checked').parentElement.innerText;

    // Crea un nuevo elemento para el carrito
    const nuevoItemCarrito = document.createElement("div");
    nuevoItemCarrito.classList.add("itemCarrito");

    const sinPapas = producto.classList.contains("entrada");

    if (sinPapas) {
      nuevoItemCarrito.innerHTML = `<p class="itemNombre">${nombre} $<span class="itemprecio">${precio.toFixed(2)}</span></p>
                                    <p class="itembebida">${bebida}</p>
                                    <p class="itemcantidad">Cantidad: 
                                    <span class="itemcannum">${cantidad}</span></p>
                                    <button type="button" class="botonEliminar">Eliminar</button>`;
    } else {
      nuevoItemCarrito.innerHTML = `<p class="itemNombre">${nombre} $<span class="itemprecio">${precio.toFixed(2)}</span></p>
                                    <p class="itempapas">${papas}</p>
                                    <p class="itembebida">${bebida}</p>
                                    <p class="itemcantidad">Cantidad: 
                                    <span class="itemcannum">${cantidad}</span></p>
                                    <button type="button" class="botonEliminar">Eliminar</button>`;
    }

    // Agrega el nuevo elemento al carrito
    carritoLista.appendChild(nuevoItemCarrito);

    // Actualiza el total del carrito
    actualizarTotalCarrito();
    cantidad = 1;
    const boton = agregarAlCarritoBtn.closest(".modal");
    boton.classList.remove("modal--show");
    limpiarEventos(modal);
  });
}

function actualizarTotalCarrito() {
  const itemsCarrito = carritoLista.getElementsByClassName("itemprecio");
  let total = 0;

  // Suma los precios de todos los items en el carrito
  for (let item of itemsCarrito) {
    total += parseFloat(item.textContent);
  }

  // Actualiza el contenido del total del carrito
  totalCarrito.innerHTML = `Total: $<span>${total.toFixed(2)}</span>`;

  // Muestra el mensaje si el carrito está vacío
  if (itemsCarrito.length === 0) {
    carritoLista.innerHTML = '<div id="cuadro" style="padding: 0px; text-align: center;"><p id="mensajevacio" >Carrito Sin Productos</p></div>';
  } else {
    const mensajeVacio = document.getElementById("cuadro");
    if (mensajeVacio) {
      mensajeVacio.remove();
    }
  }
}

function actualizarPrecio(modal, producto) {
  // Obtén los elementos necesarios
  const cantidadElement = modal.querySelector("#cantidad");
  const precioBase = parseFloat(
    producto.querySelector(".precio_producto").innerText.replace("Precio: $", "")
  );

  // Obtén el valor del radio seleccionado para papas y bebida
  const radioPapas = modal.querySelector('input[name="papas"]:checked');
  const radioBebida = modal.querySelector('input[name="bebida"]:checked');

  // Calcula el precio total
  let precioPapas = 0;
  let precioBebida = 0;
  const regex = /\(\$(\d+(\.\d+)?)\)/;

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
    if (matchBebida && matchBebida[1]) {
      precioBebida = parseFloat(matchBebida[1]);
    }
  }

  const cantidad = parseInt(cantidadElement.textContent);
  const precioTotal = (precioBase + precioPapas + precioBebida) * cantidad;

  // Actualiza el resultado en el modal
  modal.querySelector("#total").textContent = precioTotal.toFixed(2);
}
