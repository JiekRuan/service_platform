// Récupérer toutes les miniatures d'images
const thumbnails = document.querySelectorAll('.thumbnail');

// Récupérer l'élément d'affichage de l'image
const displayedImage = document.querySelector('.displayed-image');

// Ajouter un gestionnaire d'événements à chaque miniature
thumbnails.forEach((thumbnail) => {
  thumbnail.addEventListener('click', () => {
    // Réinitialiser la classe "active" de toutes les miniatures
    thumbnails.forEach((thumbnail) => {
      thumbnail.classList.remove('active');
    });

    // Récupérer l'URL de l'image cliquée
    const imageURL = thumbnail.src;

    // Mettre à jour l'URL de l'image affichée
    displayedImage.src = imageURL;

    // Ajouter la classe "active" à la miniature cliquée
    thumbnail.classList.add('active');
  });
});
