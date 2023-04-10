const menuIcon = document.getElementsByClassName(".menu-icon");
const navbar = document.getElementsByClassName(".navbar");
const navLinks = document.getElementsByClassName(".nav-links li");

menuIcon.addEventListener("click", () => {
  navbar.classList.toggle("active");
  
  navLinks.forEach((link, index) => {
    if (link.style.animation) {
      link.style.animation = "";
    } else {
      link.style.animation = `navLinkFade 0.5s ease-in-out forwards ${index / 7 + 0.3}s`;
    }
  });
  
  menuIcon.classList.toggle("toggle");
});
