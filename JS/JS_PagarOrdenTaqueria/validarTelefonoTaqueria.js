function ValidarTelefono() {
  var telefono = document.getElementById("telefono").value;
  var numtelefono = parseInt(telefono);
  var message = document.getElementById("message");

  if (!isNaN(numtelefono)) {
    if (validarTel(numtelefono)) {
      message.style.display = "none";
      return true;
    } else {
      message.style.display = "block";
      return false;
    }
  } else if (telefono === "") {
    message.style.display = "none";
    return false;
  } else {
    message.style.display = "block";
    return false;
  }
}

function validarTel(telefono) {
  return /^\d{10}$/.test(telefono);
}
