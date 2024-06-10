<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre-profesor'];
    $materias = $_POST['asignatura-profesor'];

    $sql = "INSERT INTO profesor (nombre, materias) VALUES ('$nombre', '$materias')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo profesor añadido correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


