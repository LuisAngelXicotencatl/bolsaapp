// Seleccionar el botón de menú y los elementos que se ocultarán/mostrarán
const menuToggle = document.querySelector('.menu-toggle');
const navLeft = document.querySelector('.nav-left');
const navRight = document.querySelector('.nav-right');

// Agregar un evento de clic al botón de menú
menuToggle.addEventListener('click', () => {
  // Alternar la clase 'show' en los elementos nav-left y nav-right
  navLeft.classList.toggle('show');
  navRight.classList.toggle('show');
});