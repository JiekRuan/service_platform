// Obtenez une référence vers le calendrier et les boutons de navigation
const calendarGrid = document.getElementById('calendar-grid');
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
        // Créez un nouvel objet Date pour le jour actuel
        const currentDateInLoop = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);

        // Créez un élément div pour représenter le jour dans le calendrier
        const dayElement = document.createElement('div');
        dayElement.classList.add('day');
        dayElement.innerText = day;
        dayElement.dataset.day = day;

        // Ajoutez un gestionnaire d'événement clic pour sélectionner le jour
        dayElement.addEventListener('click', function () {
            handleDayClick(this);
        });

        // Vérifiez si le jour est inclus dans une des plages de dates sélectionnées
        for (let i = 0; i < myDateRanges.length; i++) {
            const range = myDateRanges[i];
            if (currentDateInLoop >= range.start && currentDateInLoop <= range.end
                && range.start.getMonth() === currentDate.getMonth() && range.start.getFullYear() === currentDate.getFullYear()) {
                dayElement.classList.add('my-date'); // ajoutez une classe 'my-date' à vos dates
            }
        }
        for (let i = 0; i < otherDateRanges.length; i++) {
            const range = otherDateRanges[i];
            if (isDateInRange(currentDateInLoop, range)) {
                dayElement.classList.add('other-date');
            }
        }
        
        function isDateInRange(date, range) {
            const dateWithoutTime = new Date(date.getFullYear(), date.getMonth(), date.getDate());
            const rangeStartWithoutTime = new Date(range.start.getFullYear(), range.start.getMonth(), range.start.getDate());
            const rangeEndWithoutTime = range.end ? new Date(range.end.getFullYear(), range.end.getMonth(), range.end.getDate()) : null;
        
            if (rangeEndWithoutTime) {
                return dateWithoutTime >= rangeStartWithoutTime && dateWithoutTime <= rangeEndWithoutTime;
            } else {
                return datesAreEqual(dateWithoutTime, rangeStartWithoutTime);
            }
        }
        

        // Ajoutez le jour au calendrier
        calendarGrid.appendChild(dayElement);
    }
}

// Mettez à jour le calendrier avec le mois et l'année actuels
updateCalendar();
// Gère le clic sur un jour
function handleDayClick(dayElement) {
    const selectedDay = parseInt(dayElement.dataset.day);
    const selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), selectedDay);

    // Si aucune date de début n'est définie ou si une plage de dates est complète, commencez une nouvelle plage de dates
    if (!startDate || (startDate && endDate)) {
        startDate = selectedDate;
        endDate = null;

        // Vous êtes le seul à pouvoir commencer une nouvelle plage de dates
        // Vérifiez si la date de début est déjà dans myDateRanges
        let alreadyExists = myDateRanges.find(range => datesAreEqual(range.start, startDate));

        // Si la date n'existe pas déjà, ajoutez-la à myDateRanges
        if (!alreadyExists) {
            myDateRanges.push({ start: new Date(startDate), end: new Date(endDate) });
        } else {
            // Sinon, supprimez la date de myDateRanges
            myDateRanges = myDateRanges.filter(range => !datesAreEqual(range.start, startDate));
        }
    } else if (selectedDate >= startDate) {
        // Définissez la fin de la plage de dates
        endDate = selectedDate;

        // Seulement vous pouvez terminer une plage de dates, donc mettez à jour la dernière plage de dates que vous avez commencée
        let rangeToUpdate = myDateRanges.find(range => datesAreEqual(range.start, startDate));
        if (rangeToUpdate) rangeToUpdate.end = new Date(endDate);

        // Réinitialisez les dates de début et de fin
        startDate = null;
        endDate = null;
    } else {
        // Si la date sélectionnée est avant la date de début, faites de la date sélectionnée la nouvelle date de début
        startDate = selectedDate;
    }

    updateCalendar();
}

// Fonction pour vérifier si deux dates sont égales
function datesAreEqual(date1, date2) {
    return date1.getFullYear() === date2.getFullYear() &&
        date1.getMonth() === date2.getMonth() &&
        date1.getDate() === date2.getDate();
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
