function checkContacto() {
    const nombre = document.getElementById('nombre').value;
    const correo = document.getElementById('correo').value;
    const asunto = document.getElementById('asunto').value;
    const cuerpo = document.getElementById('cuerpo').value;

    if (nombre=="") {
        alert("El nombre no puede estar vacío.");
        return false;
    } else if (correo=="") {
        alert("El correo electrónico de contacto no puede estar vacío.");
        return false;
    } else if (asunto=="") {
        alert("El asunto no puede estar vacío.");
        return false;
    } else {
        const correoE = `mailto:soporte@icguitar.es?subject=${encodeURIComponent(asunto)}&body=${encodeURIComponent('Nombre: ' + nombre + ' Correo electrónico: ' + correo + ' Mensaje: ' + cuerpo)}`;
        window.location.href = correoE;
        return true;
    }   
}