let contador = 1;

function ejecutarCarrusel() {
  const totalImagenes = 4;
  const clase = "index_carrusel--active";

  setInterval(function () {
    for (let i = 1; i <=totalImagenes; i++) {
      let imagen = document.getElementById("carrusel" + i);
      imagen.classList.remove(clase);
    }

    let imagenActual = document.getElementById("carrusel" + contador);
    imagenActual.classList.add("index_carrusel--active");

    contador = (contador % totalImagenes) + 1;
  }, 3000);
}
