function checkPasswordMatch() {
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("password2").value;
  var message = document.getElementById("message");

  if (password.length > 0 || confirmPassword.length > 0) {
    if (password !== confirmPassword) {
      message.style.display = "block";
    } else {
      message.style.display = "none";
    }
  } else {
    message.style.display = "none";
  }
}
