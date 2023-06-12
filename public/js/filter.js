function createFilter(filters) {
  let filterContainer = document.createElement('div');
  filterContainer.classList.add('filter');

  filters.forEach((filter, index) => {
    let filterSub = document.createElement('div');
    filterSub.classList.add('filterSub');

    let filterText = document.createElement('p');
    filterText.textContent = filter.text;

    let filterNumber = document.createElement('p');
    filterNumber.classList.add('filterSubNumber');
    filterNumber.textContent = `(${filter.number})`;

    filterSub.appendChild(filterText);
    filterSub.appendChild(filterNumber);
    filterContainer.appendChild(filterSub);

    if (index < filters.length - 1) {
      let separator = document.createElement('p');
      separator.classList.add('separator');
      separator.textContent = '|';
      filterContainer.appendChild(separator);
    }

    filterSub.addEventListener('click', function () {
      // Supprimer la classe 'selected' de tous les éléments du filtre
      filterContainer.querySelectorAll('.filterSub').forEach((element) => {
        element.classList.remove('selected');
      });

      // Ajouter la classe 'selected' à l'élément cliqué
      filterSub.classList.add('selected');
    });
  });

  return filterContainer;
}
