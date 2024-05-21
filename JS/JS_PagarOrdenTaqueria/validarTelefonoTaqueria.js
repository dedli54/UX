var regexTelefono = /^\d{10}$/;

function ValidarTelefono() {
  var telefono = document.getElementById("telefono");
  var message = document.getElementById("message");

  if (telefono.value.length > 0) {
    if (!regexTelefono.test(telefono.value)) {
      encender(message, telefono);
      return false;
    } else {
      apagar(message, telefono);
      return true;
    }
  } else {
    apagar(message, telefono);
    return false;
  }
}

function encender(p, input) {
  p.style.display = "block";
  input.style.borderColor = 'red';
}

function apagar(p, input) {
  p.style.display = "none";
  input.style.borderColor = null;
}
