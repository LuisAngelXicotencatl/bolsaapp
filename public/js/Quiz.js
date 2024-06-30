// Obtenemos una referencia al botón y al contenedor que deseamos mostrar/ocultar
const quizButton = document.getElementById("delete");
const cancelButton = document.getElementById("cancel");
const quizContainer = document.getElementById("Quiz-link");

// Agregamos un manejador de eventos clic al botón
quizButton.addEventListener("click", function() {
    // Comprobamos si el contenedor está visible o no
    if (quizContainer.style.display === "none") {
        // Si está oculto, lo mostramos
        quizContainer.style.display = "block";
    } else {
        // Si está visible, lo ocultamos
        quizContainer.style.display = "none";
    }
});

cancelButton.addEventListener("click", function() {
    // Comprobamos si el contenedor está visible o no
    if (quizContainer.style.display === "block") {
        // Si está oculto, lo mostramos
        quizContainer.style.display = "none";
    } else {
        // Si está visible, lo ocultamos
        quizContainer.style.display = "block";
    }
});
