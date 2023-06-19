const figures = document.querySelectorAll(".figure-animation");

function isInViewport(element) {
  const rect = element.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= window.innerHeight &&
    rect.right <= window.innerWidth
  );
}

function animateOnScroll() {
  figures.forEach((figure) => {
    if (isInViewport(figure)) {
      figure.classList.add("visible");
    }
  });
}

// Exécute l'animation au chargement initial de la page
animateOnScroll();

// Exécute l'animation lors du défilement de la page
window.addEventListener("scroll", animateOnScroll);
