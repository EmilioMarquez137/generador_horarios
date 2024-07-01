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

// 1. Crear un nuevo salón
$grupo_idgrupo = "A"; // Ejemplo de grupo al que pertenece el salón

$sql = "INSERT INTO salon (grupo_idgrupo) VALUES ('" . escape($conn, $grupo_idgrupo) . "')";
if ($conn->query($sql) === TRUE) {
    echo "Nuevo salón creado correctamente.<br>";
} else {
    echo "Error al crear salón: " . $conn->error . "<br>";
}

// 2. Leer todos los salones
$sql = "SELECT * FROM salon";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Salones:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idsalon"] . ", Grupo: " . $row["grupo_idgrupo"] . "<br>";
    }
} else {
    echo "No se encontraron salones.";
}

// 3. Actualizar un salón
$newGrupo_idgrupo = "B"; // Nuevo grupo al que pertenece el salón
$idSalon = 1; // ID del salón a actualizar

$sql = "UPDATE salon SET grupo_idgrupo = '" . escape($conn, $newGrupo_idgrupo) . "' WHERE idsalon = " . escape($conn, $idSalon);
if ($conn->query($sql) === TRUE) {
    echo "Información del salón actualizada correctamente.<br>";
} else {
    echo "Error al actualizar información del salón: " . $conn->error . "<br>";
}

// 4. Eliminar un salón
$idSalonEliminar = 2; // ID del salón a eliminar

$sql = "DELETE FROM salon WHERE idsalon = " . escape($conn, $idSalonEliminar);
if ($conn->query($sql) === TRUE) {
    echo "Salón eliminado correctamente.<br>";
} else {
    echo "Error al eliminar salón: " . $conn->error . "<br>";
}

// Cerrar la conexión
$conn->close();
?>
