let isLoging = true;
let contenedorMensajeError = document.getElementById("cuenta_form--error");
const parrafoError = document.getElementById("cuenta_form--mensaje-error");

loginRegister();

function toogleLogin(Element) {
  if (Element.id == "form_login--buton") {
    isLoging = true;
    loginRegister();
  } else if (Element.id == "form_register--button") {
    isLoging = false;
    loginRegister();
  }
}

function loginRegister() {
  const logingForm = document.getElementById("form--login");
  const registerForm = document.getElementById("form--register");
  let inputs = document.getElementsByTagName("input");

  if (isLoging) {
    registerForm.style.display = "none";
    logingForm.style.display = "block";
    document.title = "iCGuitar - Iniciar sesión";
  } else {
    registerForm.style.display = "block";
    logingForm.style.display = "none";
    document.title = "iCGuitar - Crear una cuenta";
  }
  contenedorMensajeError.style.display = "none";
  parrafoError.innerHTML = "";
  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].type == "text" || inputs[i].type == "password") {
      inputs[i].style.borderColor = "black";
      inputs[i].value = "";
    }
    if (inputs[i].type == "date" || inputs[i].type == "file") {
      inputs[i].value = "";
    }
    if (inputs[i].type == "checkbox") {
      inputs[i].checked = false;
    }
  }
}

function chequearForm(id) {
  const expRegNick = /^[a-zA-Z0-9._]+$/;
  const expRegApellidos = /^[a-zA-Z\s]*$/; 
  const expRegNombre = /^[A-Za-zÀ-ÖØ-öø-ÿ' -]+$/; 
  let campo = document.getElementById(id);
  let contrasennia=document.getElementById("contrasenniaReg").value;
  let contrasenniaConfirmada=document.getElementById("confirmarContrasenniaReg").value;

  if (campo.id == "nickname" || campo.id == "nicknameReg") {
    if (campo.value == "") {
      contenedorMensajeError.style.display = "block";
      parrafoError.innerHTML = "No puede haber campos en blanco.";
      campo.style.borderColor = "red";
      return false;
    } else if (campo.value.length < 5) {
      contenedorMensajeError.style.display = "block";
      parrafoError.innerHTML =
        "El nombre de usuario debe contener al menos cinco caracteres.";
      campo.style.borderColor = "red";
      return false;
    } else if (!expRegNick.test(campo.value)) {
      contenedorMensajeError.style.display = "block";
      campo.style.borderColor = "red";
      parrafoError.innerHTML =
        "El nombre de usuario solo puede contener letras, números, guiones bajos y puntos.";
      return false;
    } else {
      contenedorMensajeError.style.display = "none";
      parrafoError.innerHTML = "";
      campo.style.borderColor = "cadetblue";
      return true;
    }
  }
  if (campo.id == "contrasennia" || campo.id == "contrasenniaReg" || campo.id == "confirmarContrasenniaReg") {
    if (campo.value == "") {
      contenedorMensajeError.style.display = "block";
      parrafoError.innerHTML = "No puede haber campos en blanco.";
      campo.style.borderColor = "red";
      return false;
    } else if (campo.value.length < 10) {
      parrafoError.innerHTML =
        "La contraseña debe contener al menos diez caracteres.";
      contenedorMensajeError.style.display = "block";
      campo.style.borderColor = "red";
      return false;
    } else if (!/[A-Z]/.test(campo.value)) {
      parrafoError.innerHTML =
        "La contraseña debe contener al menos una mayúscula.";
      contenedorMensajeError.style.display = "block";
      campo.style.borderColor = "red";
      return false;
    } else if (!/[a-z]/.test(campo.value)) {
      parrafoError.innerHTML =
        "La contraseña debe contener al menos una minúscula.";
      contenedorMensajeError.style.display = "block";
      campo.style.borderColor = "red";
      return false;
    } else if (!/\d/.test(campo.value)) {
      parrafoError.innerHTML =
        "La contraseña debe contener al menos un número.";
      contenedorMensajeError.style.display = "block";
      campo.style.borderColor = "red";
      return false;
    } else if (!/[^a-zA-Z0-9]/.test(campo.value)) {
      parrafoError.innerHTML =
        "La contraseña debe contener algún carácter especial.";
      contenedorMensajeError.style.display = "block";
      campo.style.borderColor = "red";
      return false;
    } else {
      contenedorMensajeError.style.display = "none";
      parrafoError.innerHTML = "";
      campo.style.borderColor = "cadetblue";
      return true;
    }
  }
  if (campo.id == "confirmarContrasenniaReg") {
    if (contrasennia!==contrasenniaConfirmada) {
      parrafoError.innerHTML =
      "Las contraseñas no coinciden.";
      contenedorMensajeError.style.display = "block";
      campo.style.borderColor = "red";
      console.log(contrasennia);
      console.log(contrasenniaConfirmada)
      return false;
    } else {
      contenedorMensajeError.style.display = "none";
      parrafoError.innerHTML = "";
      campo.style.borderColor = "cadetblue";
      return true;
    }
  }
  if (campo.id == "nombre") {
    if (campo.value == "") {
      contenedorMensajeError.style.display = "block";
      parrafoError.innerHTML = "No puede haber campos en blanco.";
      campo.style.borderColor = "red";
      return false;
    } else if (!expRegNombre.test(campo.value)) {
      contenedorMensajeError.style.display = "block";
      campo.style.borderColor = "red";
      parrafoError.innerHTML =
      "El nombre no puede contener números ni carácteres especiales.";
      return false;
    } else {
      contenedorMensajeError.style.display = "none";
      parrafoError.innerHTML = "";
      campo.style.borderColor = "cadetblue";
      return true;
    }
  }
  if (campo.id == "apellidos") {
    if (campo.value == "") {
      contenedorMensajeError.style.display = "block";
      parrafoError.innerHTML = "No puede haber campos en blanco.";
      campo.style.borderColor = "red";
      return false;
    } else if (!expRegApellidos.test(campo.value)) {
      contenedorMensajeError.style.display = "block";
      campo.style.borderColor = "red";
      parrafoError.innerHTML =
        "Los apellidos no pueden contener números ni carácteres especiales.";
      return false;
    } else {
      contenedorMensajeError.style.display = "none";
      parrafoError.innerHTML = "";
      campo.style.borderColor = "cadetblue";
      return true;
    }
  }
  if (campo.id == "fechaNac") {
    let fechaNacimiento = new Date(campo.value);
    let fechaActual = new Date();
    let fechaPrimaria = new Date(1900, 0, 1);
    if (fechaNacimiento>fechaActual) {
      contenedorMensajeError.style.display = "block";
      parrafoError.innerHTML = "La fecha de nacimiento no es válida.";
      campo.style.borderColor = "red";
      return false;
    } else if (fechaNacimiento<fechaPrimaria) {
      contenedorMensajeError.style.display = "block";
      parrafoError.innerHTML = "La fecha de nacimiento no es válida.";
      campo.style.borderColor = "red";
      return false;
    } else {
      contenedorMensajeError.style.display = "none";
      parrafoError.innerHTML = "";
      campo.style.borderColor = "cadetblue";
      return true;
    }
  }
  if (campo.id == "terminos") {
    if (!campo.checked) {
      campo.style.color="red";
      parrafoError.innerHTML = "Debes aceptar los términos.";
      campo.style.color = "red";
      return false;
    } else {
      contenedorMensajeError.style.display = "none";
      parrafoError.innerHTML = "";
      campo.style.color="black";
      return true;
    }
  }
  if (campo.id == "condiciones") {
    if (!campo.checked) {
      campo.style.color="red";
      parrafoError.innerHTML = "Debes aceptar las y condiciones.";
      campo.style.borderColor = "red";
      return false;
    } else {
      contenedorMensajeError.style.display = "none";
      parrafoError.innerHTML = "";
      campo.style.color="black";
      return true;
    }
  }
}

function sendFormRegister() {
  return chequearForm("nombre") &&
         chequearForm("apellidos") &&
         chequearForm("nicknameReg") &&
         chequearForm("contrasenniaReg") &&
         chequearForm("confirmarContrasenniaReg") &&
         chequearForm("fechaNac") &&
         chequearForm("terminos") &&
         chequearForm("condiciones");
}

function sendFormLogin() {
  return chequearForm("nickname") &&
         chequearForm("contrasennia");
}

function mostrarPassword(id, idP) {
  let contrasennia = document.getElementById(id);
  let showPass = document.getElementById(idP);
  const mostrar = "Mostrar contraseña";
  const ocultar = "Ocultar contraseña";

  if (showPass.innerHTML==mostrar) {
    contrasennia.type = "text";
    passwordMostrar = true;
    showPass.innerHTML = ocultar;
  } else {
    contrasennia.type = "password";
    passwordMostrar = false;
    showPass.innerHTML = mostrar;
  }
}

function loginIn (mess, campoId) {
  let campo = document.getElementById(campoId);
    contenedorMensajeError.style.display = "block";
    parrafoError.innerHTML = mess;
    campo.style.borderColor = "red";
}