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
    <title>iCGuitar - Iniciar sesión</title>
</head>

<body>
    <header>
        <figure>
            <img src="assets/media/favicon.png" alt="iCGuitar Logo">
            <h1>iCGuitar</h1>
        </figure>
        <nav class="header_nav">
            <a href="index.php">Inicio</a>
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
        <article class="cuenta_form--iniciarSesion">
            <section>
                <section id="form--login">
                    <h2>Iniciar sesión</h2>
                    <form action="assets/php/login.php" method="POST" onsubmit="return sendFormLogin()">
                        <label for="nickname">
                            <p>Apodo:</p>
                            <input type="text" name="nickname" id="nickname" onblur="chequearForm(this.id)">
                        </label>
                        <label for="contrasennia">
                            <p>Contraseña:</p>
                            <input type="password" name="contrasennia" id="contrasennia" onblur="chequearForm(this.id)">
                        </label>
                        <p class="cuenta_form--link" id="showPass" onclick="mostrarPassword('contrasennia', this.id)">Mostrar contraseña</p>
                        <input type="submit" value="Iniciar sesión">
                    </form>
                    <p>¿Aún no tienes una cuenta? Pulsa <span id="form_register--button" class="cuenta_form--link" onclick="toogleLogin(this)">aquí</span> para crear una.</p>
                </section>
                <section id="form--register">
                    <h2>Crear una cuenta</h2>
                    <p>Los campos que contengan '*' son obligatorios.</p>
                    <form action="assets/php/register.php" method="POST" enctype="multipart/form-data" onsubmit="return sendFormRegister()">
                        <label for="nombre">
                            <p>Nombre: *</p>
                            <input type="text" name="nombre" id="nombre" onblur="chequearForm(this.id)">
                        </label>
                        <label for="apellidos">
                            <p>Apellidos: *</p>
                            <input type="text" name="apellidos" id="apellidos" onblur="chequearForm(this.id)">
                        </label>
                        <label for="nicknameReg">
                            <p>Apodo: *</p>
                            <input type="text" name="nicknameReg" id="nicknameReg" onblur="chequearForm(this.id)">
                        </label>
                        <label for="contrasenniaReg">
                            <p>Contraseña: *</p>
                            <input type="password" name="contrasenniaReg" id="contrasenniaReg" onblur="chequearForm(this.id)">
                        </label>
                        <p class="cuenta_form--link" id="showPass1Reg" onclick="mostrarPassword('contrasenniaReg', this.id)">Mostrar contraseña</p>
                        <label for="confirmarContrasenniaReg">
                            <p>Confirmar contraseña: *</p>
                            <input type="password" name="confirmarContrasenniaReg" id="confirmarContrasenniaReg" onblur="chequearForm(this.id)">
                        </label>
                        <p class="cuenta_form--link" id="showPass2Reg" onclick="mostrarPassword('confirmarContrasenniaReg', this.id)">Mostrar contraseña</p>
                        <label for="fechaNac">
                            <p>Fecha de nacimiento: *</p>
                            <input type="date" name="fechaNac" id="fechaNac" onblur="chequearForm(this.id)">
                        </label>
                        <label for="fotoPerfil">
                            <p>Seleccionar avatar:</p>
                            <input type="file" name="fotoPerfil" id="fotoPerfil">
                        </label>
                        <label for="terminos">
                            <input type="checkbox" name="terminos" id="terminos"> Acepto los términos y condiciones del servicio. *
                        </label>
                        <label for="condiciones">
                            <input type="checkbox" name="condiciones" id="condiciones"> Acepto la política de privacidad. *
                        </label>
                        <input type="submit" value="Crear una cuenta">
                    </form>
                    <p>¿Ya tienes una cuenta? Pulsa <span id="form_login--buton" class="cuenta_form--link" onclick="toogleLogin(this)">aquí</span> para iniciar sesión.</p>
                </section>
                <div id="cuenta_form--error">
                    <p id="cuenta_form--mensaje-error">
                        <?php
                        if (isset($_GET['logIn']) && $_GET['logIn'] === "passIn") {
                            $logIn = htmlspecialchars($_GET['logIn'], ENT_QUOTES, 'UTF-8');
                            echo '<script type="text/javascript">document.addEventListener("DOMContentLoaded", function() {
                                    loginIn("La contraseña es incorrecta.", "contrasennia");
                                });
                            </script>';
                        } else if ($_GET['logIn'] === "userIn") {
                            echo '<script type="text/javascript">document.addEventListener("DOMContentLoaded", function() {
                                loginIn("El nombre de usuario no es correcto.", "nickname");
                            });
                        </script>';
                        }
                        else if ($_GET['logIn'] === "userExists") {
                            echo '<script type="text/javascript">document.addEventListener("DOMContentLoaded", function() {
                                loginIn("El usuario ya existe.", "nicknameReg");
                            });
                        </script>';
                        }
                        ?>
                    </p>
                </div>
            </section>
            <div class="cuenta_form--vertical-line"></div>
            <img src="assets/media/splash.png" alt="Imagen decorativa de una guitarra.">
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
    <script src="assets/js/login.js">
    </script>
</body>

</html>