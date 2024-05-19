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
            <?php
            require "config.php";

            $user = $_SESSION['nickname'];
            $nombre = trim($_POST["nombre"]);
            $apellidos = trim($_POST["apellidos"]);
            $nickname = trim($_POST["nickname"]);
            $passwordOriginal = trim($_POST["actualPassword"]);
            $password = trim($_POST["newPassword"]);

            $existeUser = $conn->prepare("SELECT AES_Decrypt(contrasennia, 'passwordKey') as contrasennia FROM usuario WHERE nickname = ?");
            $existeUser->bind_param("s", $user);
            $existeUser->execute();
            $existeUserResult = $existeUser->get_result();

            if ($existeUserResult->num_rows > 0) {
                $columna = $existeUserResult->fetch_assoc();
                if ($passwordOriginal == $columna['contrasennia']) {
                    $conn->set_charset("utf8");

                    $statement = $conn->prepare("UPDATE usuario SET nickname = ?, nombre = ?, apellidos = ?, contrasennia = AES_ENCRYPT(?, 'passwordKey') WHERE usuario.nickname = ?");

                    if ($statement) {
                        $statement->bind_param("sssss", $nickname, $nombre, $apellidos, $password, $user);
                        $statement->execute();
                        if ($statement->affected_rows > 0) {
                            session_regenerate_id(true);
                            $_SESSION['nickname'] = $nickname;
                            header('Location: perfil-usuario.php');
                            exit();
                        } else {
                            echo "<h2>Error al actualizar usuario.</h2>";
                            echo "<a class='link footer_links' href='perfil-usuario.php'>Volver</a>";
                        }

                        $statement->close();
                        $conn->close();
                    } else {
                        echo "<h2>Error al preparar la consulta.</h2>";
                    }
                } else {
                    echo "<h2>Error: La contraseña actual es incorrecta.</h2>";
                    echo "<a class='link footer_links' href='perfil-usuario.php'>Volver</a>";
                }
            } else {
                echo "<h2>Error: Usuario no encontrado.</h2>";
                echo "<a class='link footer_links' href='perfil-usuario.php'>Volver</a>";
            }

            $existeUser->close();
            ?>
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