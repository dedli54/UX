const radioTipoOrden = document.querySelectorAll('input[name="TipoOrden"]');
// Agregar eventos para actualizar el precio al cambiar los radios
radioTipoOrden.forEach((rb) =>
  rb.addEventListener("change", function () {
    actualizarPrecio();
  })
);

// Función para mostrar u ocultar el div según el tipo de orden seleccionado
function toggleDireccionVisibility() {
  var tipoOrden = document.querySelector(
    'input[name="TipoOrden"]:checked'
  ).value;
  var direccionDiv = document.getElementById("direccionDiv");

  // Si el tipo de orden es "recoger", oculta el div, de lo contrario, muéstralo
  direccionDiv.style.display = tipoOrden === "recoger" ? "none" : "block";
}

function actualizarPrecio() {
  // Obtén los elementos necesarios
  const cantidadElement = document.querySelector(".Subtotal span");
  const Subtotal = parseFloat(cantidadElement.textContent);

  // Obtén el valor del radio seleccionado para papas y bebida
  const radio = document.querySelector('input[name="TipoOrden"]:checked');

  // Calcula el precio total
  let precioTipoOrden = 0;

  if (radio.value === "domicilio") {
    precioTipoOrden = 30;
  }

  const precioTotal = Subtotal + precioTipoOrden;

  // Actualiza el resultado en el modal
  document.querySelector(".Total span").textContent = precioTotal.toFixed(2);
}
