<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "mydb";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    echo "<script>console.log('Conexión fallida: " . $conn->connect_error . "');</script>";
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "<script>console.log('Conexión exitosa a la base de datos.');</script>";
}


// Función para escapar valores y evitar inyección SQL
function escape($conn, $value) {
    return $conn->real_escape_string($value);
}

// --- Operaciones CRUD ---

// 1. Crear una nueva materia
$nombre = "Matemáticas"; // Nombre de la materia

$sql = "INSERT INTO materia (nombre) VALUES ('" . escape($conn, $nombre) . "')";
if ($conn->query($sql) === TRUE) {
    echo "Nueva materia creada correctamente.<br>";
} else {
    echo "Error al crear materia: " . $conn->error . "<br>";
}

// 2. Leer todas las materias
$sql = "SELECT * FROM materia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Materias:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idmateria"] . ", Nombre: " . $row["nombre"] . "<br>";
    }
} else {
    echo "No se encontraron materias.";
}

// 3. Actualizar una materia
$newNombre = "Física"; // Nuevo nombre de la materia
$idMateria = 1; // ID de la materia a actualizar

$sql = "UPDATE materia SET nombre = '" . escape($conn, $newNombre) . "' WHERE idmateria = " . escape($conn, $idMateria);
if ($conn->query($sql) === TRUE) {
    echo "Información de la materia actualizada correctamente.<br>";
} else {
    echo "Error al actualizar información de la materia: " . $conn->error . "<br>";
}

// 4. Eliminar una materia
$idMateriaEliminar = 2; // ID de la materia a eliminar

$sql = "DELETE FROM materia WHERE idmateria = " . escape($conn, $idMateriaEliminar);
if ($conn->query($sql) === TRUE) {
    echo "Materia eliminada correctamente.<br>";
} else {
    echo "Error al eliminar materia: " . $conn->error . "<br>";
}

// Cerrar la conexión
$conn->close();
?>
