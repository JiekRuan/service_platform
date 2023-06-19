// Obtenez une référence vers le calendrier et les boutons de navigation
const calendar = document.getElementById('calendar');
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');
const monthYearText = document.getElementById('monthYear');

// Créez un objet Date pour la date actuelle
let currentDate = new Date();

// Mettez à jour le calendrier avec le mois et l'année actuels
updateCalendar();

// Ajoutez un gestionnaire d'événement clic au bouton précédent
prevButton.addEventListener('click', function() {
  currentDate.setMonth(currentDate.getMonth() - 1);
  updateCalendar();
});

// Ajoutez un gestionnaire d'événement clic au bouton suivant
nextButton.addEventListener('click', function() {
  currentDate.setMonth(currentDate.getMonth() + 1);
  updateCalendar();
});

// Met à jour le calendrier avec le mois et l'année actuels
function updateCalendar() {
    // Vide le calendrier
    const calendarGrid = document.getElementById('calendar-grid');
    calendarGrid.innerHTML = '';
  
    // Met à jour le mois et l'année affichés
    const month = currentDate.toLocaleString('default', { month: 'long' });
    const year = currentDate.getFullYear();
    monthYearText.textContent = `${month} ${year}`;
  
    // Obtenir le nombre de jours dans le mois actuel
    const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
  
    // Ajoutez les jours de la semaine à l'en-tête du calendrier
    const weekdays = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
    for (let i = 0; i < weekdays.length; i++) {
      const weekdayElement = document.createElement('div');
      weekdayElement.classList.add('day', 'weekday');
      weekdayElement.textContent = weekdays[i];
      calendarGrid.appendChild(weekdayElement);
    }

  // Bouclez sur chaque jour du mois
  for (let day = 1; day <= daysInMonth; day++) {
    // Créez un élément div pour représenter le jour dans le calendrier
    const dayElement = document.createElement('div');
    dayElement.classList.add('day');
    dayElement.innerText = day;

    // Ajoutez un gestionnaire d'événement clic pour sélectionner le jour
    dayElement.addEventListener('click', function() {
      // Supprimez la classe "selected" de tous les jours
      const selectedDay = document.querySelector('.selected');
      if (selectedDay) {
        selectedDay.classList.remove('selected');
      }

      // Ajoutez la classe "selected" au jour cliqué
      this.classList.add('selected');
    });

    // Ajoutez le jour au calendrier
    calendarGrid.appendChild(dayElement);
  }
}

// Gestionnaire d'événement clic du bouton de réservation
const reservationButton = document.getElementById('reservationButton');
reservationButton.addEventListener('click', function() {
  const selectedDay = document.querySelector('.selected');
  if (selectedDay) {
    const selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), parseInt(selectedDay.innerText));
    alert('Vous avez réservé la date : ' + selectedDate.toDateString());
  } else {
    alert('Veuillez sélectionner une date.');
  }

  // Gère la sélection de plage de dates
let startDate = null;
let endDate = null;
let isSelectingRange = false;

// Ajoute un gestionnaire d'événement clic pour les jours du calendrier
function handleDayClick(dayElement) {
  const selectedDay = dayElement.dataset.day;

  if (!startDate || isSelectingRange) {
    // Début de la plage de dates
    startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);
    endDate = null;
    isSelectingRange = false;
  } else {
    // Fin de la plage de dates
    endDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);
    isSelectingRange = true;
  }

  updateCalendar();

  // Affiche les dates sélectionnées
  if (startDate && endDate) {
    const selectedDates = getSelectedDates(startDate, endDate);
    console.log('Dates sélectionnées:', selectedDates);
  }
}

// Obtient les dates sélectionnées dans une plage de dates
function getSelectedDates(start, end) {
  const dates = [];
  const currentDate = new Date(start);

  while (currentDate <= end) {
    dates.push(new Date(currentDate));
    currentDate.setDate(currentDate.getDate() + 1);
  }

  return dates;
}

// Met à jour le calendrier avec le mois et l'année actuels
function updateCalendar() {
  // ...

  // Bouclez sur chaque jour du mois
  for (let day = 1; day <= daysInMonth; day++) {
    // ...

    // Ajoutez un gestionnaire d'événement clic pour sélectionner le jour
    dayElement.addEventListener('click', function() {
      handleDayClick(this);
    });

    // Ajoutez un gestionnaire d'événement de survol pour la sélection de plage de dates
    dayElement.addEventListener('mouseenter', function() {
      handleDayHover(this);
    });

    // ...

    // Vérifie si le jour est inclus dans la plage de dates sélectionnée
    if (startDate && endDate && day >= startDate.getDate() && day <= endDate.getDate()) {
      dayElement.classList.add('range');
    }

    // ...
  }
}

// Gère le survol des jours pour la sélection de plage de dates
function handleDayHover(dayElement) {
  if (!startDate || endDate) {
    return;
  }

  const selectedDay = dayElement.dataset.day;
  const currentDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);

  if (currentDay > startDate) {
    isSelectingRange = true;
    endDate = new Date(currentDay);
    updateCalendar();
  }
}

// Ajoute un gestionnaire d'événement clic pour les jours du calendrier
function handleDayClick(dayElement) {
  const selectedDay = parseInt(dayElement.innerText);

  if (!startDate) {
    // Début de la plage de dates
    startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);
    endDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);
  } else if (selectedDay >= startDate.getDate()) {
    // Fin de la plage de dates ou sélection d'une nouvelle plage de dates
    endDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);
  } else {
    // Sélection d'une date antérieure à la date de début
    endDate = new Date(startDate);
    startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);
  }

  updateCalendar();

  // Affiche les dates sélectionnées
  if (startDate && endDate) {
    const selectedDates = getSelectedDates(startDate, endDate);
    console.log('Dates sélectionnées:', selectedDates);
  }
}

// Obtient les dates sélectionnées dans une plage de dates
function getSelectedDates(start, end) {
  const dates = [];
  const currentDate = new Date(start);

  while (currentDate <= end) {
    dates.push(new Date(currentDate));
    currentDate.setDate(currentDate.getDate() + 1);
  }

  return dates;
}


});
