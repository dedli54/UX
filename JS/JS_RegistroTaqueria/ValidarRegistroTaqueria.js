var regexNombreApellido = /^[a-zA-Z\s]+$/;
var regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var regexTelefono = /^\d{10}$/;

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

function checkLastName() {
  var lastname = document.getElementById("apellidos");
  var message = document.getElementById("message-apellido");

  if (lastname.value.length > 0) {
    if (!regexNombreApellido.test(lastname.value)) {
      encender(message, lastname);
      return false;
    } else {
      apagar(message, lastname);
      return true;
    }
  } else {
    apagar(message, lastname);
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

function checkTel() {
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

function checkDate() {
  var fecha = document.getElementById("fecha-nacimiento");
  var message = document.getElementById("message-fecha");
  var fechaActual = new Date();

  if (fecha.value !== "") {
    var fecha2 = new Date(fecha.value);
    if (fecha2 < fechaActual) {
      encender(message, fecha);
      return false;
    } else {
      apagar(message, fecha);
      return true;
    }
  } else {
    apagar(message, fecha);
    return false;
  }
}

function checkPasswordMatch() {
  var password = document.getElementById("password");
  var confirmPassword = document.getElementById("password2");
  var message = document.getElementById("message-contrasena");

  if (password.value.length > 0 || confirmPassword.value.length > 0) {
    if (password.value !== confirmPassword.value) {
      encender(message, password);
      confirmPassword.style.borderColor = 'red';
      return false;
    } else {
      apagar(message, password);
      confirmPassword.style.borderColor = null;
      return true;
    }
  } else {
    apagar(message, password);
    confirmPassword.style.borderColor = null;
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

function validarFormulario() {

  if (checkName() && checkLastName() && checkCorreo() && checkTel() && checkDate() && checkPasswordMatch()) {
    return true;
  } else {
    alert("Verifique los datos ingresados!");
    return false;
  }

}