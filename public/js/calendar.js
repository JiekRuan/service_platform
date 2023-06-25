// Obtenez une référence vers le calendrier et les boutons de navigation
const calendarGridGrid = document.getElementById('calendar-grid-grid');
const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');
const monthYearText = document.getElementById('monthYear');

let myDateRanges = [];
let otherDateRanges = [{ start: new Date(2023, 6, 10), end: new Date(2023, 6, 15) }]; // déplacez cette ligne vers le haut


// Créez un objet Date pour la date actuelle
let currentDate = new Date();

// Variables pour la plage de dates
let startDate = null;
let endDate = null;
let selectedDateRanges = []; // Ajoutez cette ligne en haut de votre script pour créer le tableau qui stocke les plages de dates


// Ajoutez un gestionnaire d'événement clic au bouton précédent
prevButton.addEventListener('click', function () {
    const currentMonth = currentDate.getMonth();
    currentDate.setMonth(currentMonth - 1);
    updateCalendar();
});

// Ajoutez un gestionnaire d'événement clic au bouton suivant
nextButton.addEventListener('click', function () {
    const currentMonth = currentDate.getMonth();
    currentDate.setMonth(currentMonth + 1);
    updateCalendar();
});


// Met à jour le calendrier avec le mois et l'année actuels
function updateCalendar() {
    // Vide le calendrier
    calendarGrid.innerHTML = '';
    // Met à jour le mois et l'année affichés
    const month = currentDate.toLocaleString('default', { month: 'long' });
    const year = currentDate.getFullYear();
    monthYearText.textContent = `${month} ${year}`;

    // Obtenir le nombre de jours dans le mois actuel
    const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

    // Obtenez le jour de la semaine du premier jour du mois (0 = dimanche, 6 = samedi)
    const firstDayOfWeek = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();

    // Ajoutez les jours de la semaine à l'en-tête du calendrier
    const weekdays = ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'];
    for (let i = 0; i < weekdays.length; i++) {
        const weekdayElement = document.createElement('div');
        weekdayElement.classList.add('day', 'weekday');
        weekdayElement.textContent = weekdays[i];
        calendarGrid.appendChild(weekdayElement);
    }

    // Ajoutez des espaces vides pour les jours avant le premier jour du mois
    for (let i = 0; i < firstDayOfWeek; i++) {
        const emptyDayElement = document.createElement('div');
        emptyDayElement.classList.add('day');
        calendarGrid.appendChild(emptyDayElement);
    }

    // Bouclez sur chaque jour du mois
    for (let day = 1; day <= daysInMonth; day++) {
        // Créez un élément div pour représenter le jour dans le calendrier
        const dayElement = document.createElement('div');
        dayElement.classList.add('day');
        dayElement.innerText = day;
        dayElement.dataset.day = day;

        // Ajoutez un gestionnaire d'événement clic pour sélectionner le jour
        dayElement.addEventListener('click', function () {
            handleDayClick(this);
        });

        // Vérifie si le jour est inclus dans la plage de dates sélectionnée
        if (startDate && endDate && day >= startDate.getDate() && day <= endDate.getDate()) {
            dayElement.classList.add('selected');
        }

        // Ajoutez le jour au calendrier
        calendarGrid.appendChild(dayElement);
    }
}


// Gère le clic sur un jour
function handleDayClick(dayElement) {
    const selectedDay = parseInt(dayElement.dataset.day);

    if (!startDate || (startDate && endDate)) {
        // Début de la plage de dates
        startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);
        endDate = null;
    } else if (selectedDay >= startDate.getDate()) {
        // Fin de la plage de dates
        endDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);
    } else {
        // Si la date sélectionnée est antérieure à la date de début, remplacez la date de début
        startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);
    }


    // Affiche les plages de dates sélectionnées
    for (let i = 0; i < selectedDateRanges.length; i++) {
        const range = selectedDateRanges[i];
        const dates = getSelectedDates(range.start, range.end);
        console.log(`Plage de dates ${i + 1} :`, dates);
    }


    // Obtient les dates sélectionnées dans une plage de dates
    function getSelectedDates(start, end) {
        const dates = [];
        let currentDate = new Date(start);

        while (currentDate <= end) {
            dates.push(new Date(currentDate));
            currentDate.setDate(currentDate.getDate() + 1);
        }

        return dates;
    }
}
