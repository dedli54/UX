var regexNombreApellido = /^[a-zA-Z\s]+$/;
var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var regexTelefono = /^\d{10}$/;

function ValidarTelefono() {
  var telefono = document.getElementById("telefono");
  var message = document.getElementById("message-telefono");

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

function checkName() {
  var name = document.getElementById("nombres");
  var message = document.getElementById("message-nombre");

  if (name.value.length > 0) {
    if (!regexNombreApellido.test(name.value)) {
      encender(message, name);
      return false;
    } else {
      apagar(message, name);
      return true;
    }
  } else {
    apagar(message, name);
    return false;
  }
}

function checkCorreo() {
  var correo = document.getElementById("correo");
  var message = document.getElementById("message-correo");

  if (correo.value.length > 0) {
    if (!regexCorreo.test(correo.value)) {
      encender(message, correo);
      return false;
    } else {
      apagar(message, correo);
      return true;
    }
  } else {
    apagar(message, correo);
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
