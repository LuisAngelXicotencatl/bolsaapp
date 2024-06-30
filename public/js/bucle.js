document.addEventListener("DOMContentLoaded", function() {
    var verMasBtn = document.getElementById("verMasBtn");
    var verMenosBtn = document.getElementById("verMenosBtn");
    var eventos = document.querySelectorAll(".eventos .tarjet-event");

    for (var i = 0; i < eventos.length; i++) {
        if (i < 3) {
            eventos[i].style.display = "block";
        } else {
            eventos[i].style.display = "none";
            eventos[i].style.display = "none";
            verMenosBtn.style.display = "none";
        }
    }

    function mostrarTodosEventos() {
        for (var i = 0; i < eventos.length; i++) {
            eventos[i].style.display = "block";
        }
        verMasBtn.style.display = "none";
        verMenosBtn.style.display = "block";
    }

    function  mostrarMenosEventos() {
        for (var i = 3; i < eventos.length; i++) {
            eventos[i].style.display = "none";
        }
        verMasBtn.style.display = "block";
        verMenosBtn.style.display = "none";
    }
    verMasBtn.addEventListener("click", mostrarTodosEventos);
    verMenosBtn.addEventListener("click", mostrarMenosEventos);
});
