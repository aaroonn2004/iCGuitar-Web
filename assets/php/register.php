<?php
require "config.php";

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$nickname = $_POST["nicknameReg"];
$password = $_POST["contrasenniaReg"];
$password2 = $_POST["confirmarContrasenniaReg"];
$fechaNac = $_POST["fechaNac"];
$fotoPerfil = $_FILES["fotoPerfil"]["tmp_name"];
$fotoPerfilName = $_FILES["fotoPerfil"]["name"];

$existeUser = $conn->prepare("SELECT * FROM usuario WHERE nickname = ?");
$existeUser->bind_param("s", $nickname);
$existeUser->execute();
$existeUserResult = $existeUser->get_result();

if ($existeUserResult->num_rows > 0) {
    echo "El usuario ya existe.";
    $logIn = "userExists";
    header('Location: ../../cuenta.php?logIn=' . $logIn);
    exit;
}

$existeUser->close();

if ($fotoPerfil) {
    $fotoPerfilBlob = file_get_contents($fotoPerfil);
} else {
    echo "Error: No se pudo cargar la imagen.";
    exit;
}

$conn->set_charset("utf8");

$statement = $conn->prepare("INSERT INTO usuario (nickname, contrasennia, fechaNacimiento, fechaCreacion, nombre, apellidos, fotoPerfil) VALUES (?, AES_ENCRYPT(?, 'passwordKey'), ?, NOW(), ?, ?, ?)");

if ($statement) {
    $statement->bind_param("sssssb", $nickname, $password, $fechaNac, $nombre, $apellidos, $fotoPerfilBlob);
    $statement->send_long_data(5, $fotoPerfilBlob);
    $statement->execute();
    if ($statement->affected_rows > 0) {
        echo "Registro exitoso.";
        header('Location: ../../cuenta.php');

    } else {
        echo "Error al registrar usuario.";
    }

    $statement->close();
    $conn->close();
} else {
    echo "Error al preparar la consulta.";
}
