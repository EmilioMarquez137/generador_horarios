function agregarDiaHora() {
    const dia = document.getElementById('dia-clase').value;
    const horaInicio = document.getElementById('hora-inicio-clase').value;
    const horaFin = document.getElementById('hora-fin-clase').value;

    if (dia && horaInicio && horaFin) {
        const diasHorasClaseDiv = document.getElementById('dias-horas-clase');
        const newDiaHoraDiv = document.createElement('div');
        newDiaHoraDiv.textContent = `${dia}: ${horaInicio} - ${horaFin}`;
        newDiaHoraDiv.dataset.dia = dia;
        newDiaHoraDiv.dataset.horaInicio = horaInicio;
        newDiaHoraDiv.dataset.horaFin = horaFin;

        diasHorasClaseDiv.appendChild(newDiaHoraDiv);
    }
}
