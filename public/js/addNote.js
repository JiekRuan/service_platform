// chatGPT

let checklistAddNoteElements = document.querySelectorAll('.checklistAddNote');

checklistAddNoteElements.forEach((addNoteElement) => {
    addNoteElement.addEventListener('click', function () {
        let noteContainer = this.nextElementSibling;
        let noteInput = noteContainer.querySelector('input[type="text"]');
        let noteText = this.textContent.trim();

        // Vérifier si une note existe déjà
        if (noteText !== 'Ajouter une note') {
            // Pré-remplir l'input avec la note existante
            noteInput.value = noteText;

            // Masquer le bouton de modification
            noteContainer.querySelector('.noteEditButton').classList.add('hidden');

            // Afficher le bouton de suppression
            noteContainer.querySelector('.noteDeleteButton').classList.remove('hidden');
        } else {
            // Réinitialiser l'input
            noteInput.value = '';

            // Masquer le bouton de suppression
            noteContainer.querySelector('.noteDeleteButton').classList.add('hidden');
        }

        // Masquer le texte "Ajouter une note"
        this.classList.add('hidden');

        // Afficher le conteneur de la note
        noteContainer.style.display = 'flex';
    });
});

document.addEventListener('click', function (event) {
    let targetElement = event.target;

    // Vérifier si un bouton de validation est cliqué
    if (targetElement.classList.contains('noteSubmitButton')) {
        let noteContainer = targetElement.parentElement;
        let noteInput = noteContainer.querySelector('input[type="text"]');
        let noteText = noteInput.value.trim();

        if (noteText !== '') {
            // Mettre à jour le texte de la note
            noteContainer.previousElementSibling.textContent = noteText;

            // Afficher le texte "Ajouter une note"
            noteContainer.previousElementSibling.classList.remove('hidden');

            // Masquer le conteneur de la note
            noteContainer.style.display = 'none';
        }
    }

    // Vérifier si un bouton de suppression est cliqué
    if (targetElement.classList.contains('noteDeleteButton')) {
        let noteContainer = targetElement.parentElement;
        let addNoteElement = noteContainer.parentElement.querySelector('.checklistAddNote');

        // Réinitialiser le texte de la note
        addNoteElement.textContent = 'Ajouter une note';
        addNoteElement.classList.remove('hidden');

        // Réinitialiser l'input
        noteContainer.querySelector('input[type="text"]').value = '';

        // Réafficher le texte "Ajouter une note"
        noteContainer.style.display = 'none';
    }

});

// barrer la tâches lorsqu'elle son état est checked
let checkboxes = document.querySelectorAll('input[type="checkbox"]');
let labels = document.querySelectorAll('label p');

checkboxes.forEach((checkbox, index) => {
  checkbox.addEventListener('change', function() {
    if (this.checked) {
      labels[index].classList.add('strikethrough');
    } else {
      labels[index].classList.remove('strikethrough');
    }
  });
});
