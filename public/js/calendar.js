// Récupérez toutes les cellules du calendrier
const cells = document.querySelectorAll('td');

// Ajoutez un écouteur d'événement de survol pour chaque cellule
cells.forEach(cell => {
    cell.addEventListener('mouseenter', () => {
        if (!cell.classList.contains('selected')) {
            cell.style.backgroundColor = '#0096ff';
        }
    });

    cell.addEventListener('mouseleave', () => {
        if (!cell.classList.contains('selected')) {
            cell.style.backgroundColor = '';
        }
    });

    // Ajoutez un écouteur d'événement de clic pour chaque cellule
    cell.addEventListener('click', () => {
        // Vérifiez si la cellule est disponible
        if (cell.classList.contains('available')) {
            // Inversez la classe "available"
            cell.classList.remove('available');
            cell.style.backgroundColor = '#005ea6';
        } else {
            cell.classList.add('available');
            cell.style.backgroundColor = '#0070c0';
        }

        // Réinitialisez les styles de toutes les cellules
        cells.forEach(cell => {
            cell.classList.remove('selected');
        });

        // Mettez en surbrillance la cellule sélectionnée
        cell.classList.add('selected');
    });

});