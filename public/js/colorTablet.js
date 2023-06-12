let userElements = document.querySelectorAll('.planningState');

userElements.forEach((userElement) => {
  let stateElement = userElement.querySelector('.state');
  let colorTabletElement = userElement.querySelector('.colorTablet');
  let state = stateElement.textContent;

  colorTabletElement.className = 'colorTablet';

  if (state === 'A nettoyer') {
    colorTabletElement.classList.add('toClean');
  } else if (state === 'En cours') {
    colorTabletElement.classList.add('inProgress');
  } else if (state === 'En attente de départ') {
    colorTabletElement.classList.add('pending');
  } else if (state === 'Prêt à recevoir') {
    colorTabletElement.classList.add('readyToWelcome');
  } else if (state === 'Terminé') {
    colorTabletElement.classList.add('completed');
  }
});
