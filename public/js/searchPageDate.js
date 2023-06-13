let searchFilter = document.getElementById('searchFilter');
let filterBlock = document.getElementById('filterBlock');
toggleMenu(filterBlock, searchFilter);

let filterClose = document.getElementById('filterClose');

filterClose.addEventListener('click', () => {
  searchFilter.style.display = "none";
});

// pour formater les dates
let fromDateInput = document.getElementById('fromDate');
let toDateInput = document.getElementById('toDate');

fromDateInput.addEventListener('input', () => {
  let fromDate = new Date(fromDateInput.value);
  let toDate = new Date(toDateInput.value);

  if (!fromDate) {
    toDateInput.disabled = true; // Désactiver le champ "toDate"
    return;
  }

  toDateInput.disabled = false; // Activer le champ "toDate"
  toDateInput.min = fromDateInput.value;

  if (toDate && toDate < fromDate) {
    toDateInput.value = ''; // Réinitialiser la valeur du champ "toDate"
  }
});

toDateInput.addEventListener('input', () => {
  let fromDate = new Date(fromDateInput.value);
  let toDate = new Date(toDateInput.value);

  if (!fromDate) {
    toDateInput.value = ''; // Réinitialiser la valeur du champ "toDate"
    return;
  }

  if (toDate < fromDate) {
    toDateInput.value = ''; // Réinitialiser la valeur du champ "toDate"
  }
});