<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Horarios Escolares</title>
    <link rel="stylesheet" href="css/styles.css">
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
            <div class="day-time-group">
                <div>
                    <label for="dia-clase">Día:</label>
                    <select id="dia-clase" name="dia-clase" required>
                        <option value="lunes">Lunes</option>
                        <option value="martes">Martes</option>
                        <option value="miércoles">Miércoles</option>
                        <option value="jueves">Jueves</option>
                        <option value="viernes">Viernes</option>
                    </select>
                </div>
                <div>
                    <label for="hora-inicio-clase">Hora de Inicio:</label>
                    <input type="time" id="hora-inicio-clase" name="hora-inicio-clase" required>
                </div>
                <div>
                    <label for="hora-fin-clase">Hora de Fin:</label>
                    <input type="time" id="hora-fin-clase" name="hora-fin-clase" required>
                </div>
            </div>
            <button type="button" onclick="agregarDiaHora()">Añadir Día y Hora</button>
            <div id="dias-horas-clase"></div>
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
<script src="js/functions.js"></script>
</body>
</html>