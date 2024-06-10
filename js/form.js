function openTab(evt, tabName) {
    var i, tabcontent, tabbuttons;

    // Ocultar todo el contenido de las pestañas
    tabcontent = document.getElementsByClassName("tab-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Quitar la clase 'active' de todos los botones de las pestañas
    tabbuttons = document.getElementsByClassName("tab-button");
    for (i = 0; i < tabbuttons.length; i++) {
        tabbuttons[i].className = tabbuttons[i].className.replace(" active", "");
    }

    // Mostrar el contenido de la pestaña actual y agregar la clase 'active' al botón que abrió la pestaña
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Mostrar la primera pestaña por defecto
document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".tab-button").click();
});
