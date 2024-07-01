<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "mydb";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para escapar valores y evitar inyección SQL
function escape($conn, $value) {
    return $conn->real_escape_string($value);
}

// --- Operaciones CRUD ---

// 1. Crear un nuevo horario
$hora = "08:00"; // Ejemplo de hora
$dia = "Lunes"; // Ejemplo de día
$materia_idmateria = 1; // Ejemplo de id de materia

$sql = "INSERT INTO m_horarios (hora, dia, materia_idmateria) VALUES ('" . escape($conn, $hora) . "', '" . escape($conn, $dia) . "', " . escape($conn, $materia_idmateria) . ")";
if ($conn->query($sql) === TRUE) {
    echo "Nuevo horario creado correctamente.<br>";
} else {
    echo "Error al crear horario: " . $conn->error . "<br>";
}

// 2. Leer todos los horarios
$sql = "SELECT * FROM m_horarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Horarios:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "Hora: " . $row["hora"] . ", Día: " . $row["dia"] . ", ID Materia: " . $row["materia_idmateria"] . "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// 3. Actualizar un horario
$newHora = "09:00"; // Nueva hora
$newDia = "Martes"; // Nuevo día
$idMateria = 1; // ID de la materia a actualizar

$sql = "UPDATE m_horarios SET hora = '" . escape($conn, $newHora) . "', dia = '" . escape($conn, $newDia) . "' WHERE materia_idmateria = " . escape($conn, $idMateria);
if ($conn->query($sql) === TRUE) {
    echo "Horario actualizado correctamente.<br>";
} else {
    echo "Error al actualizar horario: " . $conn->error . "<br>";
}

// 4. Eliminar un horario
$idMateriaEliminar = 2; // Ejemplo de ID de materia a eliminar

$sql = "DELETE FROM m_horarios WHERE materia_idmateria = " . escape($conn, $idMateriaEliminar);
if ($conn->query($sql) === TRUE) {
    echo "Horario eliminado correctamente.<br>";
} else {
    echo "Error al eliminar horario: " . $conn->error . "<br>";
}

// Cerrar la conexión
$conn->close();
?>
