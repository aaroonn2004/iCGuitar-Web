<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "icguitar";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        printf('Conexión existosa.');
        die("Conexión fallida: " . $conn->connect_error);
    }