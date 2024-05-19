let contenedorMensajeError = document.getElementById("cuenta_form--error");
let parrafoError = document.getElementById("cuenta_form--mensaje-error");

function mostrarPassword(id, idP) {
  let contrasennia = document.getElementById(id);
  let showPass = document.getElementById(idP);
  const mostrar = "Mostrar contraseña";
  const ocultar = "Ocultar contraseña";

  if (showPass.innerHTML === mostrar) {
    contrasennia.type = "text";
    showPass.innerHTML = ocultar;
  } else {
    contrasennia.type = "password";
    showPass.innerHTML = mostrar;
  }
}

function completarForm() {
  return chequearForm("nombre") &&
         chequearForm("apellidos") &&
         chequearForm("nickname") &&
         chequearForm("actualPassword") &&
         chequearForm("newPassword") &&
         chequearForm("confirmPassword");
}

function chequearForm(id) {
  const expRegNick = /^[a-zA-Z0-9._]+$/;
  const expRegApellidos = /^[a-zA-Z\s]*$/; 
  const expRegNombre = /^[A-Za-zÀ-ÖØ-öø-ÿ' -]+$/; 
  let campo = document.getElementById(id);
  let contrasennia = document.getElementById("newPassword").value;
  let contrasenniaConfirmada = document.getElementById("confirmPassword").value;

  if (campo.id === "nickname") {
    if (campo.value === "") {
      mostrarError("No puede haber campos en blanco.", campo);
      return false;
    } else if (campo.value.length < 5) {
      mostrarError("El nombre de usuario debe contener al menos cinco caracteres.", campo);
      return false;
    } else if (!expRegNick.test(campo.value)) {
      mostrarError("El nombre de usuario solo puede contener letras, números, guiones bajos y puntos.", campo);
      return false;
    } else {
      limpiarError(campo);
      return true;
    }
  }

  if (campo.id === "nombre") {
    if (campo.value === "") {
      mostrarError("No puede haber campos en blanco.", campo);
      return false;
    } else if (!expRegNombre.test(campo.value)) {
      mostrarError("El nombre no puede contener números ni caracteres especiales.", campo);
      return false;
    } else {
      limpiarError(campo);
      return true;
    }
  }

  if (campo.id === "apellidos") {
    if (campo.value === "") {
      mostrarError("No puede haber campos en blanco.", campo);
      return false;
    } else if (!expRegApellidos.test(campo.value)) {
      mostrarError("Los apellidos no pueden contener números ni caracteres especiales.", campo);
      return false;
    } else {
      limpiarError(campo);
      return true;
    }
  }

  if (campo.id === "actualPassword" || campo.id === "newPassword") {
    if (campo.value === "") {
      mostrarError("No puede haber campos en blanco.", campo);
      return false;
    } else if (campo.value.length < 10) {
      mostrarError("La contraseña debe contener al menos diez caracteres.", campo);
      return false;
    } else if (!/[A-Z]/.test(campo.value)) {
      mostrarError("La contraseña debe contener al menos una mayúscula.", campo);
      return false;
    } else if (!/[a-z]/.test(campo.value)) {
      mostrarError("La contraseña debe contener al menos una minúscula.", campo);
      return false;
    } else if (!/\d/.test(campo.value)) {
      mostrarError("La contraseña debe contener al menos un número.", campo);
      return false;
    } else if (!/[^a-zA-Z0-9]/.test(campo.value)) {
      mostrarError("La contraseña debe contener algún carácter especial.", campo);
      return false;
    } else {
      limpiarError(campo);
      return true;
    }
  }

  if (campo.id === "confirmPassword") {
    if (contrasennia !== contrasenniaConfirmada) {
      mostrarError("Las contraseñas no coinciden.", campo);
      return false;
    } else {
      limpiarError(campo);
      return true;
    }
  }
}

function mostrarError(mensaje, campo) {
  contenedorMensajeError.style.display = "block";
  parrafoError.innerHTML = mensaje;
  campo.style.borderColor = "red";
}

function limpiarError(campo) {
  contenedorMensajeError.style.display = "none";
  parrafoError.innerHTML = "";
  campo.style.borderColor = "cadetblue";
}