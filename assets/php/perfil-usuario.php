<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descubre tablaturas, acordes y letras de tus canciones favoritas en iCGuitar. Aprende a tocar como una estrella del Rock con nuestra amplia base de datos de música.">
    <meta http-equiv="X-UA-Compatible" content="IE=7">
    <meta name="keywords" content="guitarra, iCGuitar, tablatura, tablaturas, tocar guitarra, acordes, canciones para tocar, letra, letras canciones, guitarra eléctrica, bajo, leyenda, rock, heavy metal, metal, heavy">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="shortcut icon" href="../media/favicon.png" type="image/x-png">
    <title>iCGuitar - Mi cuenta</title>
</head>

<body>
    <header>
        <figure>
            <img src="../media/favicon.png" alt="iCGuitar Logo">
            <h1>iCGuitar</h1>
        </figure>
        <nav class="header_nav">
            <a href="../../index.php">Inicio</a>
            <a href="../../contacto.html">Contacto</a>
            <a href="../../index.php#sobre-nosotros">Sobre nosotros</a>
            <?php
            session_start();
            if (isset($_SESSION["nickname"]) && $_SESSION["nickname"] !== "") {
                echo "<a href='perfil-usuario.php' active>@" . $_SESSION["nickname"] . "</a>";
                echo "<a href='cerrar-sesion.php'>Cerrar sesión</a>";
            } else {
                echo "<a href='../../cuenta.php'>Iniciar sesión</a>";
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
        <article class="perfil_usuario--article">
            <h2>Datos del usuario:</h2>
            <section>
                <?php if (isset($_SESSION['fotoPerfil']) && isset($_SESSION['nickname'])) : ?>
                    <figure>
                        <img src="data:image/png;base64,<?= base64_encode($_SESSION['fotoPerfil']) ?>" alt="Foto de perfil de @<?= htmlspecialchars($_SESSION['nickname']) ?>">
                        <figcaption>@<?= $_SESSION['nickname'] ?></figcaption>
                    </figure>
                <?php endif; ?>
            </section>
            <section class="perfil_usuario--section">
                <form action="updateUsuario.php" method="POST" id="updateUser_form" autocomplete="off" onsubmit="return completarForm();">
                    <?php
                    $fechaCreacion = new DateTime($_SESSION['fechaCreacion']);
                    $fechaActual = new DateTime();
                    $diasMiembro = $fechaCreacion->diff($fechaActual);
                    ?>
                    <label for="nickname">
                        <h3>Apodo:</h3>
                        <input type='text' value='<?= $_SESSION['nickname'] ?>' name='nickname' id='nickname' onblur="chequearForm('nickname')">
                    </label>
                    <label for="nombre">
                        <h3>Nombre:</h3>
                        <input type='text' value='<?= $_SESSION['nombre'] ?>' name='nombre' id='nombre' onblur="chequearForm('nombre')">
                    </label>
                    <label for="apellidos">
                        <h3>Apellidos:</h3>
                        <input type='text' value='<?= $_SESSION['apellidos'] ?>' name='apellidos' id='apellidos' onblur="chequearForm('apellidos')">
                    </label>
                    <label for="fechaNac">
                        <h3>Fecha de nacimiento:</h3>
                        <input type='date' value='<?= $_SESSION['fechaNac'] ?>' name='fechaNac' id='fechaNac' readonly>
                    </label>
                    <section>
                        <h3>Miembro desde:</h3>
                        <p>Han pasado <?= $diasMiembro->days ?> días desde que te uniste.</p>
                    </section>
                    <label for="actualPassword">
                        <h3>Contraseña actual:</h3>
                        <input type="password" name="actualPassword" id="actualPassword">
                    </label>
                    <p class="cuenta_form--link" id="showPass1Ed" onclick="mostrarPassword('actualPassword', this.id)">Mostrar contraseña</p>
                    <label for="newPassword">
                        <h3>Nueva contraseña:</h3>
                        <input type="password" name="newPassword" id="newPassword" onblur="chequearForm('newPassword')">
                    </label>
                    <p class="cuenta_form--link" id="showPass2Ed" onclick="mostrarPassword('newPassword', this.id)">Mostrar contraseña</p>
                    <label for="confirmPassword">
                        <h3>Confirmar contraseña:</h3>
                        <input type="password" name="confirmPassword" id="confirmPassword" onblur="chequearForm('confirmPassword')">
                    </label>
                    <p class="cuenta_form--link" id="showPass3Ed" onclick="mostrarPassword('confirmPassword', this.id)">Mostrar contraseña</p>
                    <p>* Por seguridad, al cambiar estos datos, deberás reestablecer tu contraseña.</p>
                    <section class="perfil_usuario--buttons">
                        <input type="submit" value="Actualizar">
                        <input type="reset" value="Por defecto">
                    </section>
                </form>
                <div id="cuenta_form--error">
                    <p id="cuenta_form--mensaje-error"></p>
                </div>
            </section>
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
                    <a href="../../index.php#inicio-guitarra">¿Cómo iniciarse con la guitarra?</a>
                    <a href="../../index.php#que-guitarra-comprar">¿Qué guitarra comprar?</a>
                    <a href="../../index.php#tipo-guitarra">¿Eléctrica, acústica o española?</a>
                    <a href="../../index.php#como-tocar">¿Cómo tocar?</a>
                </nav>
            </section>            
            <div class="footer_vertical--line"></div>
            <section>
                <h2>Información</h2>
                <nav>
                    <a href="../../politica-de-cookies.html">Política de Cookies</a>
                    <a href="../../terminos-y-condiciones.html">Términos y Condiciones del servicio</a>
                    <a href="../../politica-de-privacidad.html">Política de Privacidad</a>
                    <a href="../../index.php#descargar">Descargar cliente de escritorio</a>
                </nav>
            </section>
        </article>
    </footer>
    <script src="../js/script.js">
    </script>
    <script src="../js/datos.js">
        
    </script>
</body>

</html>