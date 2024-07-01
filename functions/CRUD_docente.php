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

// 1. Crear un nuevo profesor
$materias = "Matemáticas, Física"; // Ejemplo de materias que enseña el profesor
$nombre = "Juan Pérez"; // Nombre del profesor

$sql = "INSERT INTO profesor (materias, nombre) VALUES ('" . escape($conn, $materias) . "', '" . escape($conn, $nombre) . "')";
if ($conn->query($sql) === TRUE) {
    echo "Nuevo profesor creado correctamente.<br>";
} else {
    echo "Error al crear profesor: " . $conn->error . "<br>";
}

// 2. Leer todos los profesores
$sql = "SELECT * FROM profesor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Lista de Profesores:</h2>";
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["idprofesor"] . ", Nombre: " . $row["nombre"] . ", Materias: " . $row["materias"] . "<br>";
    }
} else {
    echo "No se encontraron profesores.";
}

// 3. Actualizar un profesor
$newMaterias = "Química, Biología"; // Nuevas materias que enseña el profesor
$idProfesor = 1; // ID del profesor a actualizar

$sql = "UPDATE profesor SET materias = '" . escape($conn, $newMaterias) . "' WHERE idprofesor = " . escape($conn, $idProfesor);
if ($conn->query($sql) === TRUE) {
    echo "Información del profesor actualizada correctamente.<br>";
} else {
    echo "Error al actualizar información del profesor: " . $conn->error . "<br>";
}

// 4. Eliminar un profesor
$idProfesorEliminar = 2; // ID del profesor a eliminar

$sql = "DELETE FROM profesor WHERE idprofesor = " . escape($conn, $idProfesorEliminar);
if ($conn->query($sql) === TRUE) {
    echo "Profesor eliminado correctamente.<br>";
} else {
    echo "Error al eliminar profesor: " . $conn->error . "<br>";
}

// Cerrar la conexión
$conn->close();
?>
