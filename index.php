<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descubre tablaturas, acordes y letras de tus canciones favoritas en iCGuitar. Aprende a tocar como una estrella del Rock con nuestra amplia base de datos de música.">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="keywords" content="guitarra, iCGuitar, tablatura, tablaturas, tocar guitarra, acordes, canciones para tocar, letra, letras canciones, guitarra eléctrica, bajo, leyenda, rock, heavy metal, metal, heavy">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="shortcut icon" href="assets/media/favicon.png" type="image/x-png">
    <title>iCGuitar - Inicio</title>
</head>

<body onload="ejecutarCarrusel ()">
    <header>
        <figure>
            <img src="assets/media/favicon.png" alt="iCGuitar Logo">
            <h1>iCGuitar</h1>
        </figure>
        <nav class="header_nav">
            <a href="index.php" active>Inicio</a>
            <a href="contacto.html">Contacto</a>
            <a href="index.php#sobre-nosotros">Sobre nosotros</a>
            <?php
            session_start();
            if (isset($_SESSION["nickname"]) && $_SESSION["nickname"] !== "") {
                echo "<a href='assets/php/perfil-usuario.php'>@" . $_SESSION["nickname"] . "</a>";
                echo "<a href='assets/php/cerrar-sesion.php'>Cerrar sesión</a>";
            } else {
                echo "<a href='cuenta.php'>Iniciar sesión</a>";
            }
            ?>
        </nav>
        <button id="header_desplegable" onclick="openMenu()"><svg class="header_button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10" stroke="#eee" stroke-width=".6" fill="rgba(0,0,0,0)" stroke-linecap="round" style="cursor: pointer">
                <path d="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7">
                    <animate dur="0.2s" attributeName="d" values="M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7;M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7" fill="freeze" begin="start.begin" />
                    <animate dur="0.2s" attributeName="d" values="M3,3L5,5L7,3M5,5L5,5M3,7L5,5L7,7;M2,3L5,3L8,3M2,5L8,5M2,7L5,7L8,7" fill="freeze" begin="reverse.begin" />
                </path>
                <rect width="10" height="10" stroke="none">
                    <animate dur="2s" id="reverse" attributeName="width" begin="click" />
                </rect>
                <rect width="10" height="10" stroke="none">
                    <animate dur="0.001s" id="start" attributeName="width" values="10;0" fill="freeze" begin="click" />
                    <animate dur="0.001s" attributeName="width" values="0;10" fill="freeze" begin="reverse.begin" />
                </rect>
            </svg></button>
    </header>
    <main>
        <article class="index">
            <figure>
                <img src="assets/media/favicon.png" alt="iCGuitar Logo">
                <h1>iCGuitar</h1>
            </figure>
            <article class="index_sobre-nosotros">
                <a name="#sobre-nosotros"></a>
                <h2>Sobre nosotros</h2>
                <section>
                    <h2>¿Qué es iCGuitar?</h2>
                    <p>El nombre iCGuitar (iDoGuitar) surge de un juego de palabras que utiliza el acorde de C (Do), dando lugar al significado "Yo hago la guitarra" en inglés. En nuestro sitio web, encontrarás una amplia gama de información sobre artistas, canciones, géneros musicales, álbumes y mucho más, incluyendo guías sobre cómo tocarlos en la guitarra.</p>
                </section>
            </article>
            <article class="index_carrusel">
                <section class="index_carrusel--galeria">
                    <figure class="index_carrusel--imagen index_carrusel--active" id="carrusel1">
                        <img src="assets/media/background.png" alt="Banner de guitarra">
                        <p>🎸 ¡Eleva tu pasión por la guitarra! Descarga iCGuitar y explora miles de tablaturas. 🚀 ¡Inicia tu viaje musical hoy!</p>
                    </figure>
                    <figure class="index_carrusel--imagen" id="carrusel2">
                        <img src="assets/media/bannerGuitarra.jpg" alt="Banner de guitarra">
                        <p>🌍 Adéntrate en el mundo de la guitarra con iCGuitar. Acceso ilimitado y herramientas interactivas. ¡Toca hoy mismo! 🎶</p>
                    </figure>
                    <figure class="index_carrusel--imagen" id="carrusel3">
                        <img src="assets/media/bannerGuitarra2.jpg" alt="Banner de guitarra">
                        <p>🎸 ¿Listo para rockear? iCGuitar te ofrece lecciones detalladas para todos los niveles. ¡Descarga y empieza a rasguear! 🌟</p>
                    </figure>
                    <figure class="index_carrusel--imagen" id="carrusel4">
                        <img src="assets/media/bannerGuitarra3.jpg" alt="Banner de guitarra">
                        <p>🎵 Aprende a tocar nuevas canciones con facilidad. iCGuitar, tu maestro de guitarra digital. ¡Prueba ahora! 🕺</p>
                    </figure>
                </section>
                <button onclick="let isLogin=false; window.location.href='cuenta.php';">Únete ahora</button>
            </article>
            <h2>Aquí tienes nuestra selección de playlists para animarte a empezar:</h2>
            <article class="index_playlists">
                <section>
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DWX2SDPTiDbwL?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </section>
                <div class="index_vertical--line"></div>
                <section>
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DX1o1CavDfr20?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </section>
                <div class="index_vertical--line"></div>
                <section>
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/album/1nu4TEWyMszgNpMmYNwHpI?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                </section>
            </article>
            <div class="index_horizontal--line"></div>
            <article class="index_guitarra">
                <a name="inicio-guitarra"></a>
                <img src="assets/media/splash.png" alt="Imagen ilustrativa de una guitarra.">
                <h2>Inicio en la Guitarra</h2>
                <section>
                    <h3>Introducción</h3>
                    <p>Bienvenido a tu primer paso hacia el emocionante mundo de la guitarra. Aquí encontrarás todo lo necesario para comenzar tu viaje musical, desde elegir tu primera guitarra hasta tocar tus primeros acordes.Bienvenido a tu primer paso hacia el emocionante mundo de la guitarra. Aquí encontrarás todo lo necesario para comenzar tu viaje musical, desde elegir tu primera guitarra hasta tocar tus primeros acordes.</p>
                </section>
                <section>
                    <h3>Guía paso a paso para principiantes:</h3>
                    <ul>
                        <li><span>Conoce la guitarra:</span> Aprende sobre las diferentes partes de la guitarra y su función.</li>
                        <li><span>Elige tu primera guitarra:</span> Consejos para seleccionar el instrumento adecuado según tus intereses y presupuesto.</li>
                        <li><span>Aprender a tocar:</span> Recursos básicos para empezar a tocar, incluyendo lecciones y ejercicios sencillos.</li>
                    </ul>
                </section>
            </article>
            <div class="index_horizontal--line"></div>
            <article class="index_guitarra">
                <a name="que-guitarra-comprar"></a>
                <img src="assets/media/guitarra.jpg" alt="Imagen ilustrativa de un guitarrista.">
                <h2>¿Qué guitarra comprar?</h2>
                <section>
                    <h3>Introducción:</h3>
                    <p>Elegir tu primera guitarra puede ser emocionante pero también abrumador. Aquí te guiaremos a través del proceso para asegurarte de que tomes la mejor decisión.</p>
                </section>
                <section>
                    <h3>Factores a considerar:</h3>
                    <ul>
                        <li><span>Presupuesto: </span>Determina cuánto estás dispuesto a gastar. Hay opciones para cada rango de precio.</li>
                        <li><span>Edad y tamaño del usuario: </span>Asegúrate de que la guitarra sea adecuada para el tamaño y la fuerza de la persona que la va a usar.</li>
                        <li><span>Género musical: </span>Algunos géneros pueden beneficiarse de un tipo específico de guitarra.</li>
                    </ul>
                </section>
                <section>
                    <h3>Marcas y modelos recomendados:</h3>
                    <ul>
                        <li><span>Para niños: </span>Modelos de tamaño reducido.</li>
                        <li><span>Para principiantes: </span>Guitarras con buena relación calidad-precio.</li>
                        <li><span>Para géneros específicos: </span>Guitarras especializadas según el género musical.</li>
                    </ul>
                </section>
            </article>
            <div class="index_horizontal--line"></div>
            <article class="index_guitarra">
                <a name="tipo-guitarra"></a>
                <img src="assets/media/splash.png" alt="Imagen ilustrativa de una guitarra.">
                <h2>Eléctrica, Acústica o Española</h2>
                <section>
                    <h3>Introducción</h3>
                    <p>Cada tipo de guitarra tiene sus particularidades que la hacen más adecuada para ciertos estilos y técnicas musicales.</p>
                </section>
                <section>
                    <h3>Guía paso a paso para principiantes:</h3>
                    <ul>
                        <li><span>Guitarra eléctrica:</span> Ideal para géneros como rock, blues y metal. Requiere un amplificador.</li>
                        <li><span>Guitarra acústica:</span> Versátil para géneros como folk, country y pop. Excelente para cantautores.</li>
                        <li><span>Guitarra española:</span> Perfecta para flamenco y música clásica. Cuerdas de nylon que son más suaves para los dedos.</li>
                    </ul>
                </section>
            </article>
            <div class="index_horizontal--line"></div>
            <article class="index_guitarra">
                <a name="como-tocar"></a>
                <img src="assets/media/guitarrista.jpg" alt="Imagen ilustrativa de alguien tocando una guitarra.">
                <h2>¿Cómo Tocar?</h2>
                <section>
                    <h3>Introducción</h3>
                    <p>Aprender a tocar la guitarra es un proceso gratificante que requiere paciencia y práctica. Aquí encontrarás las herramientas básicas para comenzar tu viaje musical.</p>
                </section>
                <section>
                    <h3>Fundamentos básicos:</h3>
                    <ul>
                        <li><span>Posición y manejo de la guitarra:</span> Aprende cómo sostener la guitarra correctamente y cómo posicionar tus manos para una mayor comodidad y efectividad al tocar.</li>
                        <li><span>Acordes básicos y progresiones:</span> Dominar unos pocos acordes básicos puede permitirte tocar muchas canciones populares. Te enseñaremos los acordes más comunes y algunas progresiones de acordes esenciales.</li>
                        <li><span>Técnicas de rasgueo y punteo:</span> Introduciremos técnicas básicas de rasgueo y punteo para que puedas empezar a tocar canciones por ti mismo.</li>
                    </ul>
                </section>
                <section>
                    <h3>Recursos de aprendizaje:</h3>
                    <ul>
                        <li><span>Tutoriales en video:</span> Sigue nuestros tutoriales en video para aprender visual y auditivamente. Perfecto para principiantes que prefieren un enfoque guiado.</li>
                        <li><span>Tablaturas y ejercicios:</span> Utiliza nuestras tablaturas y ejercicios diseñados para mejorar tu técnica y velocidad en la guitarra.</li>
                        <li><span>Apps y software recomendados:</span> Descubre las herramientas digitales que pueden hacer tu aprendizaje más efectivo y divertido.</li>
                    </ul>
                </section>
                <h3>Recomendamos los siguientes cursos de guitarra para comenzar</h3>
                <section class="index_guitarra--videos">
                    <iframe width="80%" height="auto" src="https://www.youtube.com/embed/eJGs9_kgRyg?si=o8vONGuURNtcTunz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <iframe width="80%" height="auto" src="https://www.youtube.com/embed/El5S9q84my8?si=V0eHarY5UCwMD4mz" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </section>
            </article>
            <div class="index_horizontal--line"></div>
            <article class="index_guitarra">
                <a name="descargar"></a>
                <img src="assets/media/guitarra-acustica.jpg" alt="Imagen ilustrativa de alguien tocando una guitarra.">
                <h2>¡Descarga ya nuestro cliente de escritorio!</h2>
                <a href="assets/descargable/iCGuitar.zip" download="iCGuitar.zip">
                    <button><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg></button>
                </a>
            </article>
        </article>
    </main>
    <footer>
        <h2>iCGuitar</h2>
        <article class="footer_copyright">
            <section>
                <h3>&copy; Equipo iCGuitar 2024</h3>
                <p>Todos los derechos reservados.</p>
            </section>
        </article>
        <article class="footer_links">
            <section>
                <h2>Guitarra</h2>
                <nav>
                    <a href="index.php#inicio-guitarra">¿Cómo iniciarse con la guitarra?</a>
                    <a href="index.php#que-guitarra-comprar">¿Qué guitarra comprar?</a>
                    <a href="index.php#tipo-guitarra">¿Eléctrica, acústica o española?</a>
                    <a href="index.php#como-tocar">¿Cómo tocar?</a>
                </nav>
            </section>
            <div class="footer_vertical--line"></div>
            <section>
                <h2>Información</h2>
                <nav>
                    <a href="politica-de-cookies.html">Política de Cookies</a>
                    <a href="terminos-y-condiciones.html">Términos y Condiciones del servicio</a>
                    <a href="politica-de-privacidad.html">Política de Privacidad</a>
                    <a href="index.php#descargar">Descargar cliente de escritorio</a>
                </nav>
            </section>
        </article>
    </footer>
    <script src="assets/js/script.js">
    </script>
    <script src="assets/js/index.js">
    </script>
</body>

</html>