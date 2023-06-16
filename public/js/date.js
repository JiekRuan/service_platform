// pour formater les dates
let fromDateInput = document.getElementById('fromDate');
let toDateInput = document.getElementById('toDate');

fromDateInput.addEventListener('input', () => {
  let fromDate = new Date(fromDateInput.value);
  let toDate = new Date(toDateInput.value);

  if (!fromDate) {
    toDateInput.disabled = true;
    return;
  }

  toDateInput.disabled = false;
  toDateInput.min = fromDateInput.value;

  if (toDate && toDate < fromDate) {
    toDateInput.value = '';
  }
});

toDateInput.addEventListener('input', () => {
  let fromDate = new Date(fromDateInput.value);
  let toDate = new Date(toDateInput.value);

  if (!fromDate) {
    toDateInput.value = '';
    return;
  }

  if (toDate < fromDate) {
    toDateInput.value = '';
  }

});
