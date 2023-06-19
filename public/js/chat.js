let chatReturnLink = document.querySelector('.chat_return');
let chat = document.querySelector('.chat');
let sidebar = document.querySelector('.sidebar');
let listContacts = document.querySelector('.sidebar ul');

// Vérifie si l'écran est en mode responsive
function isResponsive() {
  return window.matchMedia("(max-width: 1023px)").matches;
}

// Fonction d'événement pour afficher le chat et masquer la barre latérale
function showChat() {
  chat.style.display = 'flex';
  sidebar.style.display = 'none';
}

// Fonction d'événement pour masquer le chat et afficher la barre latérale
function hideChat() {
  chat.style.display = 'none';
  sidebar.style.display = 'block';
}

// Ajoute ou supprime les écouteurs d'événements en fonction du mode responsive
function toggleEventListeners() {
  if (isResponsive()) {
    chatReturnLink.removeEventListener('click', showChat);
    listContacts.removeEventListener('click', hideChat);
    
    chat.style.display = 'none';
    sidebar.style.display = 'block';
    
    chatReturnLink.addEventListener('click', hideChat);
    listContacts.addEventListener('click', showChat);
  } else {
    chatReturnLink.removeEventListener('click', hideChat);
    listContacts.removeEventListener('click', showChat);
    
    chat.style.display = 'flex';
    sidebar.style.display = 'block';
  }
}

// Appelle la fonction toggleEventListeners lors du chargement initial de la page
toggleEventListeners();

// Ajoute un écouteur d'événements sur le redimensionnement de la fenêtre pour mettre à jour les écouteurs d'événements en temps réel
window.addEventListener('resize', toggleEventListeners);
