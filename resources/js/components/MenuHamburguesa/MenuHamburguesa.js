document.addEventListener('DOMContentLoaded', function() {
  // Obtener elementos del DOM
  const menuContainer = document.getElementById('menu-container');
  const button = document.querySelector('.Cabecera-button');
  const nav = document.querySelector('.Cabecera-nav');
  const links = document.querySelectorAll('.Cabecera-li');

  // Establecer estado inicial de menú y botón
  let menuOpen = false;
  let buttonOpen = false;

  // Función para alternar menú y botón
  function toggleMenu() {
    // Cambiar estado de menú y botón
    menuOpen = !menuOpen;
    buttonOpen = !buttonOpen;

    // Agregar o quitar clases según si el menú está abierto o cerrado
    menuContainer.classList.toggle('Active', menuOpen);
    button.classList.toggle('menuAbierto', buttonOpen);
    nav.classList.toggle('isActive', menuOpen);

    // Iterar a través de los enlaces y establecer la clase deseada
    links.forEach((link) => {
      link.firstChild.className = menuOpen ? 'fa fa-times' : 'fa fa-bars';
    });
  }

  // Agregar event listener al botón
  button.addEventListener('click', toggleMenu);
});