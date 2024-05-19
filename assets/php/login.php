<?php
require "config.php";

$nickname = $_POST["nickname"];
$password = $_POST["contrasennia"];
$logIn;

$conn->set_charset("utf8");

$statement = $conn->prepare("SELECT nickname, aes_decrypt(contrasennia, 'passwordKey') AS contrasennia, fechaNacimiento, fechaCreacion, nombre, apellidos, fotoPerfil FROM usuario WHERE nickname=?");

if ($statement) {
    $statement->bind_param("s", $nickname);
    $statement->execute();
    $resultado = $statement->get_result();

    if ($resultado && $resultado->num_rows > 0) {

        $columna = $resultado->fetch_assoc();

        if ($columna["nickname"] == $nickname) {
            if ($columna["contrasennia"] == $password) {
                echo "Si, iniciadwdo";
                session_start();
                $_SESSION["nickname"] = $columna["nickname"];
                $_SESSION["password"] = $columna["contrasennia"];
                $_SESSION["fechaNac"] = $columna["fechaNacimiento"];
                $_SESSION["fechaCreacion"] = $columna["fechaCreacion"];
                $_SESSION["nombre"] = $columna["nombre"];
                $_SESSION["apellidos"] = $columna["apellidos"];
                $_SESSION["fotoPerfil"] = $columna["fotoPerfil"];
                header('Location: ../../index.php');
            } else {
                $logIn = "passIn";
                header('Location: ../../cuenta.php?logIn=' . $logIn);
            }
        } else {
            echo "Usuario incorrecto.";
            $logIn = "userIn";
            header('Location: ../../cuenta.php?logIn=' . $logIn);
        }

        $resultado->free();
        $conn->close();
        exit;
    } else {
        echo "Error al preparar la consulta.";
        echo "Usuario incorrecto.";
        $logIn = "userIn";
        header('Location: ../../cuenta.php?logIn=' . $logIn);
        exit;
    }
}
