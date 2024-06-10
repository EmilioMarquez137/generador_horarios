<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreGrupo = $_POST['nombre-grupo'];
    $numeroEstudiantes = $_POST['numero-estudiantes'];

    $sql = "INSERT INTO grupo (idgrupo) VALUES ('$nombreGrupo')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo grupo añadido correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

