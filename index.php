<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Horarios Escolares</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
        .container {
            width: 80%;
            margin: 2em auto;
            background: white;
            padding: 2em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 1em;
        }
        input, select {
            padding: 0.5em;
            margin-top: 0.5em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            margin-top: 1em;
            padding: 0.5em 1em;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <h1>Generador de Horarios Escolares</h1>
</header>
<div class="container">
    <section id="profesores">
        <h2>Añadir Profesores</h2>
        <form>
            <label for="nombre-profesor">Nombre del Profesor:</label>
            <input type="text" id="nombre-profesor" name="nombre-profesor" required>
            <label for="asignatura-profesor">Asignatura:</label>
            <input type="text" id="asignatura-profesor" name="asignatura-profesor" required>
            <button type="submit">Añadir Profesor</button>
        </form>
    </section>
    <section id="clases">
        <h2>Añadir Clases</h2>
        <form>
            <label for="nombre-clase">Nombre de la Clase:</label>
            <input type="text" id="nombre-clase" name="nombre-clase" required>
            <label for="grupo-clase">Grupo:</label>
            <input type="text" id="grupo-clase" name="grupo-clase" required>
            <label for="horario-clase">Horario:</label>
            <input type="text" id="horario-clase" name="horario-clase" required>
            <button type="submit">Añadir Clase</button>
        </form>
    </section>
    <section id="grupos">
        <h2>Añadir Grupos</h2>
        <form>
            <label for="nombre-grupo">Nombre del Grupo:</label>
            <input type="text" id="nombre-grupo" name="nombre-grupo" required>
            <label for="numero-estudiantes">Número de Estudiantes:</label>
            <input type="number" id="numero-estudiantes" name="numero-estudiantes" required>
            <button type="submit">Añadir Grupo</button>
        </form>
    </section>
</div>
</body>
</html>
