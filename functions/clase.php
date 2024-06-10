<?php

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreClase = $_POST['nombre-clase'];
    $grupoClase = $_POST['grupo-clase'];
    $diasHoras = $_POST['dias-horas'];
    $sql = "INSERT INTO materia (nombre) VALUES ('$nombreClase')";

    if ($conn->query($sql) === TRUE) {
        $materiaId = $conn->insert_id;
        $sqlGrupoMateria = "INSERT INTO grupo_has_materia (grupo_idgrupo, materia_idmateria) VALUES ('$grupoClase', $materiaId)";
        if ($conn->query($sqlGrupoMateria) === TRUE) {
            foreach ($diasHoras as $diaHora) {
                $dia = $diaHora['dia'];
                $horaInicio = $diaHora['horaInicio'];
                $horaFin = $diaHora['horaFin'];

                $sqlHorario = "INSERT INTO m_horarios (dia, hora, materia_idmateria) VALUES ('$dia', '$horaInicio-$horaFin', $materiaId)";
                if ($conn->query($sqlHorario) !== TRUE) {
                    echo "Error: " . $sqlHorario . "<br>" . $conn->error;
                }
            }
            echo "Nueva clase añadida correctamente";
        } else {
            echo "Error: " . $sqlGrupoMateria . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

